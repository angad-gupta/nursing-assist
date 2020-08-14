<?php

namespace App\Modules\Enrolment\Http\Controllers;

use App\Modules\Agent\Repositories\AgentInterface;
use App\libraries\Commonwealth\lib\Simplify;
use App\Modules\CourseInfo\Repositories\CourseInfoInterface;
use App\Modules\Course\Repositories\CourseInterface;
use App\Modules\Enrolment\Repositories\EnrolmentInterface;
use App\Modules\Enrolment\Repositories\EnrolmentPaymentInterface;
use App\Modules\Home\Emails\SendNetaMail;
use App\Modules\Student\Repositories\StudentPaymentInstallmentInterface;
use App\Modules\Student\Repositories\StudentPaymentInterface;
use App\Modules\Student\Repositories\StudentInterface;
use App\Notifications\EnrolmentPayment;
use Eway\Rapid\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

// Mail
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Session;

class EnrolmentController extends Controller
{

    protected $enrolment;
    protected $courseinfo;
    protected $course;
    protected $enrolpayment;
    protected $studentpayment;
    /**
     * @var StudentPaymentInstallmentInterface
     */
    protected $studentPaymentInstallment;
    /**
     * @var StudentInterface
     */
    protected $student;
       /**
     * @var AgentInterface
     */
    protected $agent;

    public function __construct(
        EnrolmentInterface $enrolment,
        CourseInfoInterface $courseinfo,
        CourseInterface $course,
        EnrolmentPaymentInterface $enrolpayment,
        StudentPaymentInterface $studentpayment,
        StudentPaymentInstallmentInterface $studentPaymentInstallment,
        StudentInterface $student,
        AgentInterface $agent) {
        $this->enrolment = $enrolment;
        $this->courseinfo = $courseinfo;
        $this->course = $course;
        $this->enrolpayment = $enrolpayment;
        $this->studentpayment = $studentpayment;
        $this->studentPaymentInstallment = $studentPaymentInstallment;
        $this->student = $student;
        $this->agent = $agent;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $search = $request->all();
        $search['active'] = 1;
        $data['enrolment'] = $this->enrolment->findAll($limit = 50, $search);
        $data['agents'] = $this->agent->getList();
        return view('enrolment::enrolment.index', $data);
    }

    public function indexArchive(Request $request)
    {
        $search = $request->all();
        //$search['status'] = 'Disapproved';
        $search['active'] = 0;
        $sort_by = ['by' => 'id', 'sort' => 'DESC'];

        $data['enrolment'] = $this->enrolment->findAll($limit = 50, $search);
        $data['agents'] = $this->agent->getList();

        return view('enrolment::enrolment.index-archive', $data);
    }


    public function viewUser(Request $request)
    {
        $data = $request->all();
        $id = (array_key_exists('id', $data)) ? $data['id'] : '';
        $enrolment = $this->enrolment->find($id);
        $data = view('enrolment::enrolment.view-detail', compact('enrolment'))->render();
        return response()->json(['options' => $data]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $submit = $data['submit_enrol'];

        if ($data['eligible_rd'] == 'is_eligible_mcq_osce') {
            $data['is_eligible_mcq_osce'] = 1;
            $data['is_eligible_att'] = 0;
            $data['is_eligible_letter_ahpra'] = 0;
        } elseif ($data['eligible_rd'] == 'is_eligible_att') {
            $data['is_eligible_mcq_osce'] = 0;
            $data['is_eligible_att'] = 1;
            $data['is_eligible_letter_ahpra'] = 0;
        } elseif ($data['eligible_rd'] == 'is_eligible_letter_ahpra') {
            $data['is_eligible_mcq_osce'] = 0;
            $data['is_eligible_att'] = 0;
            $data['is_eligible_letter_ahpra'] = 1;
        }

        $data['is_id'] = 1;

        $student_detail = auth()->guard('student')->user();
        $data['student_id'] = $student_detail->id;

        $courseinfo_id = $data['courseinfo_id'];
        $courseInfo = $this->courseinfo->find($courseinfo_id);
        $data['total_course_fee'] = $total_course_fee = $courseInfo->course_fee;
        $data['course_program_title'] = $courseInfo->course_program_title;
        try {

            $enrolmentData = array(
                'student_id' => $data['student_id'],
                'courseinfo_id' => $data['courseinfo_id'],
                'is_eligible_mcq_osce' => $data['is_eligible_mcq_osce'],
                'is_eligible_att' => $data['is_eligible_att'],
                'is_eligible_letter_ahpra' => $data['is_eligible_letter_ahpra'],
                'is_id' => $data['is_id'],
                'title' => $data['title'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'street1' => $data['street1'],
                'street2' => $data['Suburb'],
                'city' => $data['city'],
                'state' => $data['state'],
                'postalcode' => $data['Post_Code'],
                'agents' => $data['agents'],
                'country' => $data['country'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'intake_date' => $data['intake_date'],
                'payment_status' => 0,
                'payment_type' => $data['payment_type'],
            );

            if ($request->hasFile('eligible_document')) {
                $enrolmentData['eligible_document'] = $this->enrolment->upload($data['eligible_document']);
            }

            if ($request->hasFile('identity_document')) {
                $enrolmentData['identity_document'] = $this->enrolment->upload($data['identity_document']);
            }

            $enrolment = $this->enrolment->save($enrolmentData);
            $enrolment_id = $enrolment->id;

            if ($submit === 'pay_later') {

                $this->enrolment->update($enrolment_id, ['payment_type' => 0]);

                $studentPaymentData = array(
                    'student_id' => $data['student_id'],
                    'courseinfo_id' => $data['courseinfo_id'],
                    'enrolment_id' => $enrolment_id,
                    'enrolment_payment_id' => null,
                    'status' => 'Pending',
                    'moved_to_student' => 0,
                    'total_course_fee' => $total_course_fee,
                    'amount_paid' => '0',
                    'amount_left' => $total_course_fee,
                );

                $studentpayment = $this->studentpayment->save($studentPaymentData);

                Flash('You have successfully enrolled the course. We will contact you soon.')->success();

            } else {

                //$amount = Session::put('amount', $courseInfo->course_fee);

                //common wealth function
                Simplify::$publicKey = env('SANDBOX_PUBLIC_KEY');
                Simplify::$privateKey = env('SANDBOX_PRIVATE_KEY');

                if ($courseInfo->payment_mode != 'one off payment' && $data['payment_type'] == 1) {
                    $fee_in_cwbank = str_replace(',', '', $total_course_fee) * 0.025 + 1500;
                    $total_course_fee = str_replace(',', '', $total_course_fee) * 0.025 + 5500;
                    $description = 'First Installment of ' . $data['course_program_title'] . ' Course Enrolment';
                } else {
                    $fee_in_cwbank = str_replace(',', '', $total_course_fee);
                    $description = 'Full Payment of ' . $data['course_program_title'] . ' Course Enrolment';
                }

                if (isset($data['simplifyToken']) && $data['simplifyToken'] != '') {

                    $payment = \Simplify_Payment::createPayment(array(
                        'reference' => 'enrol_' . $enrolment_id, //optional Custom reference field to be used with outside systems.
                        'amount' => ($fee_in_cwbank * 100),
                        'description' => $description,
                        'currency' => 'AUD',
                        'token' => $data['simplifyToken'],
                        'order' => ['customerName' => $data['first_name'] . ' ' . $data['last_name'], 'customerEmail' => $data['email']],
                    ));

                    if ($payment->paymentStatus == 'APPROVED') {

                        $enrolpaymentData = array(
                            'enrolment_id' => $enrolment_id,
                            'transactionID' => $payment->id,
                            'authCode' => $payment->authCode,
                            'currency' => $payment->transactionData->currency,
                            'totalAmount' => $payment->transactionData->amount / 100,
                            'sucess' => 1);

                        $enrolpayment = $this->enrolpayment->save($enrolpaymentData);

                        if ($data['payment_type'] == 1) {
                            $studentPaymentData = array(
                                'student_id' => $data['student_id'],
                                'courseinfo_id' => $data['courseinfo_id'],
                                'enrolment_id' => $enrolment_id,
                                'enrolment_payment_id' => $enrolpayment->id ?? 0,
                                'status' => 'First Installment Paid',
                                'moved_to_student' => 0,
                                'total_course_fee' => $total_course_fee,
                                'amount_paid' => $fee_in_cwbank,
                                'amount_left' => ($total_course_fee - $fee_in_cwbank),
                            );
                            $studentpayment = $this->studentpayment->save($studentPaymentData);

                            //Installment Payment Storage
                            $studentPaymentInstallmentData = array(
                                'student_payment_id' => $studentpayment->id ?? 0,
                                'enrolment_payment_id' => $enrolpayment->id ?? 0,
                                'status' => 1,
                                'installment_amt' => $fee_in_cwbank,
                            );
                            $this->studentPaymentInstallment->save($studentPaymentInstallmentData);

                            $this->enrolment->update($enrolment_id, ['payment_status' => 2]);

                            $data['subject'] = 'First Installment Payment Successful';
                            $data['mail_desc'] = 'You have successfully paid first installment of $' . $fee_in_cwbank . ' with admission fee of 2.5% for ' . $data['course_program_title'] . ' enrolment.';

                        } else {
                            $studentPaymentData = array(
                                'student_id' => $data['student_id'],
                                'courseinfo_id' => $data['courseinfo_id'],
                                'enrolment_id' => $enrolment_id,
                                'enrolment_payment_id' => $enrolpayment->id ?? 0,
                                'status' => 'Paid',
                                'moved_to_student' => 0,
                                'total_course_fee' => $total_course_fee,
                                'amount_paid' => $total_course_fee,
                                'amount_left' => 0,
                            );
                            $studentpayment = $this->studentpayment->save($studentPaymentData);

                            $this->enrolment->update($enrolment_id, ['payment_status' => 1]);

                            $data['subject'] = 'Full Payment Successful';
                            $data['mail_desc'] = 'You have successfully paid $' . $fee_in_cwbank . ' for ' . $data['course_program_title'] . ' enrolment.';

                        }

                        $data['full_name'] = $student_detail->full_name;
                        $data['fee_in_cwbank'] = $fee_in_cwbank;
                        $student_detail->notify(new EnrolmentPayment($data));

                        Flash('You have successfully enrolled the course. We will contact you soon.')->success();
                    } else {
                        Flash('Payment Error!')->error();
                    }
                }

                /* ---------------------------------------------------------------
                Email Send to Student After Registration
                --------------------------------------------------------------- */

               /*  $email = $student_detail->email;
                $subject = 'Enrolment Successful';
                $student['name'] = $student_detail->full_name;
                $content = view('enrolment::enrolment.enrol-register-content', $student)->render();

                Mail::to($email)->send(new SendNetaMail($content, $subject)); */

                /* ---------------------------------------------------------------
                Email Send to Student After Registration
                --------------------------------------------------------------- */

                /*        $apiKey = env('APIKEY');
                $apiPassword = env('PASSWORD');
                $apiEndpoint = \Eway\Rapid\Client::MODE_SANDBOX;

                $client = \Eway\Rapid::createClient($apiKey, $apiPassword, $apiEndpoint);
                $transaction = [
                'Customer' => [
                'Title' => $enrolment->title,
                'FirstName' => $enrolment->first_name,
                'LastName' => $enrolment->last_name,
                'Street1' => $enrolment->street1,
                'Street2' => $enrolment->street2,
                'City' => $enrolment->city,
                'State' => $enrolment->state,
                'PostalCode' => $enrolment->postalcode,
                'Country' => $enrolment->country,
                'Email' => $enrolment->email,
                'Phone' => $enrolment->phone,
                ],
                'RedirectUrl' => route('enrolmentstudent.redirect', $enrolment->id),
                'CancelUrl' => route('enrolmentstudent.cancel'),
                'TransactionType' => \Eway\Rapid\Enum\TransactionType::PURCHASE,
                'Payment' => [
                'TotalAmount' => $courseinfo_id->course_fee . "00",
                ],
                ];

                $response = $client->createTransaction(\Eway\Rapid\Enum\ApiMethod::RESPONSIVE_SHARED, $transaction);

                if (!$response->getErrors()) {
                $sharedURL = $response->SharedPaymentUrl;
                $enrolpaymentData = array(
                'enrolment_id' => $enrolment->id,
                'sucess' => 0);

                $enrolpayment = $this->enrolpayment->save($enrolpaymentData);
                return Redirect::to($sharedURL);
                } else {
                foreach ($response->getErrors() as $error) {
                // return redirect(route('enrolment.viewUser',['id'=>$enrolment_id]));
                return redirect(route('student-dashboard'));
                // echo "Error: ".\Eway\Rapid::getMessage($error)."";
                }
                die();
                }
                 */
                // return redirect(route('enrolment.viewUser',['id'=>$enrolment_id]));
            }

        } catch (\Throwable $e) {
            Flash($e->getMessage())->success();
        }

        return redirect(route('student-dashboard'));
    }

    public function cancel()
    {
        return redirect(route('student-dashboard'));
    }

    public function redirect($id)
    {
        $id = (int) $id;
        $enrolpayment_info = $this->enrolpayment->with('enrolmentinfo')->where('enrolment_id', $id)->first();
        $apiKey = env('APIKEY');
        $apiPassword = env('PASSWORD');
        $apiEndpoint = \Eway\Rapid\Client::MODE_SANDBOX;
        $client = \Eway\Rapid::createClient($apiKey, $apiPassword, $apiEndpoint);
        $response = $client->queryTransaction($_GET['AccessCode']);
        $transactionResponse = $response->Transactions[0];
        if ($transactionResponse->TransactionStatus) {
            $customer = json_decode($transactionResponse->Customer);
            $customer = json_encode($customer);

            $shippingAddress = json_decode($transactionResponse->ShippingAddress);
            $shippingAddress = json_encode($shippingAddress);
            $totalAmount = Session::get('amount');

            $enrolpaymentData = array(
                'transactionID' => $transactionResponse->TransactionID,
                'totalAmount' => $transactionResponse->TotalAmount,
                'customer' => $customer,
                'shippingAddress' => $shippingAddress,
                'sucess' => 1,

            );

            $enrolpayment = $this->enrolpayment->update($enrolpayment_info->id, $enrolpaymentData);

            $enrolmentData = array(
                'payment_status' => 1);
            $enrolment = $this->enrolment->update($id, $enrolmentData);

            $studentPaymentData = array(
                'student_id' => $enrolpayment_info->enrolmentinfo->student_id,
                'courseinfo_id' => $enrolpayment_info->enrolmentinfo->courseinfo_id,
                'enrolment_payment_id' => $enrolpayment_info->id,
                'status' => 'Paid',
                'total_course_fee' => $totalAmount,
                'amount_paid' => $totalAmount,
                'amount_left' => '0',
            );
            $studentpayment = $this->studentpayment->save($studentPaymentData);

            'Payment successful! ID: ' . $transactionResponse->TransactionID;
            return redirect(route('enrolmentstudent.sucess', $transactionResponse->TransactionID));

        } else {
            $errors = split(', ', $transactionResponse->ResponseMessage);
            foreach ($errors as $error) {
                // return redirect(route('enrolment.viewUser'));
                return redirect(route('student-dashboard'));
            }
        }
    }

    public function sucess($transaction_id)
    {
        $data['transaction_id'] = $transaction_id;
        return view('enrolment::sucess', $data);

    }

    public function error($transaction_id)
    {
        $data['transaction_id'] = $transaction_id;
        return view('enrolment::error', $data);

    }

    public function updateStatus(Request $request)
    {
        $data = $request->all();
        try {
            $this->enrolment->update($data['enrolment_id'], $data);
            alertify('Status Updated Succesfully!')->success();
        } catch (\Throwable $e) {
            alertify($e->getMessage())->error();
        }
        return redirect()->route('enrolment.index');
    }

    public function installmentPayment(Request $request)
    {
        $data = $request->all();
        //dd($data);
        try {
            $student_payment = $this->studentpayment->find($data['student_payment_id']);
            if (!empty($student_payment)) { 

                $studentInfo = optional($student_payment->studentInfo);
                $student_id = $student_payment->student_id;
                $full_name = $studentInfo->full_name;
                $email = $studentInfo->email;
                $enrolment_id = $student_payment->enrolment_id;
                $course_program_title = optional($student_payment->courseInfo)->course_program_title;
                $course_info_id = $student_payment->courseinfo_id;

                if ($data['ins'] == 2) {
                    $installment_amt = 2500;
                    $description = 'Second Installment of ' . $course_program_title . ' Course Enrolment';
                } elseif ($data['ins'] == 3) {
                    $installment_amt = $student_payment->status == 'First Installment Paid' ? 4000 : 1500;
                    $description = 'Final Installment of ' . $course_program_title . ' Course Enrolment';
                }
                //common wealth function
                Simplify::$publicKey = env('SANDBOX_PUBLIC_KEY');
                Simplify::$privateKey = env('SANDBOX_PRIVATE_KEY');

                if (isset($data['simplifyToken']) && $data['simplifyToken'] != '') {

                    $payment = \Simplify_Payment::createPayment(array(
                        'reference' => 'enrol_' . $enrolment_id, //optional Custom reference field to be used with outside systems.
                        'amount' => ($installment_amt * 100),
                        'description' => $description,
                        'currency' => 'AUD',
                        'token' => $data['simplifyToken'],
                        'order' => ['customerName' => $full_name, 'customerEmail' => $email],
                    ));

                    if ($payment->paymentStatus == 'APPROVED') {

                        $enrolpaymentData = array(
                            'enrolment_id' => $enrolment_id,
                            'transactionID' => $payment->id,
                            'authCode' => $payment->authCode,
                            'currency' => $payment->transactionData->currency,
                            'totalAmount' => $payment->transactionData->amount / 100,
                            'sucess' => 1);

                        $enrolpayment = $this->enrolpayment->save($enrolpaymentData);

                        if ($data['ins'] == 2) {
                            $this->enrolment->update($enrolment_id, ['payment_status' => 2]);
                            $payment_status = 'Second Installment Paid';

                            $data['subject'] = 'Second Installment Payment Successful';
                            $data['mail_desc'] = 'You have successfully paid second installment of $' . $installment_amt . ' for ' . $course_program_title . ' enrolment.';

                        } elseif ($data['ins'] == 3) {
                            $this->enrolment->update($enrolment_id, ['payment_status' => 1]);
                            $payment_status = 'Final Installment Paid';

                            $data['subject'] = 'Final Installment Payment Successful';
                            $data['mail_desc'] = 'You have successfully paid final installment of $' . $installment_amt . ' for ' . $course_program_title . ' enrolment.';

                        }

                        $total_course_fee = $student_payment->total_course_fee;
                        $amount_left = $student_payment->amount_left - $installment_amt;
                        $amount_paid = $student_payment->amount_paid + $installment_amt;

                        $updateStudentPaymentData = array(
                            'enrolment_payment_id' => $enrolpayment->id ?? 0,
                            'status' => $payment_status,
                            'moved_to_student' => 1,
                            'amount_paid' => $amount_paid,
                            'amount_left' => $amount_left,
                        );
                        $studentpayment = $this->studentpayment->update($data['student_payment_id'], $updateStudentPaymentData);

                        //Installment Payment Storage
                        $studentPaymentInstallmentData = array(
                            'student_payment_id' => $data['student_payment_id'],
                            'enrolment_payment_id' => $enrolpayment->id ?? 0,
                            'status' => 1,
                            'installment_amt' => $installment_amt,
                        );
                        $this->studentPaymentInstallment->save($studentPaymentInstallmentData);

                        //update status of course for providing installments payments
                        $courseInfo = $this->courseinfo->find($course_info_id); 
                        $is_package = $courseInfo->is_course_package;

                        if ($is_package == 1) {
                            $course_id = $courseInfo->course_id;
                            $course_package = $this->courseinfo->getCoursePackage($course_id, $course_info_id);
                            
                            foreach ($course_package as $key => $pack_val) {

                                $wherecondition = array(
                                    'student_id' => $student_id,
                                    'courseinfo_id' => $pack_val->id,
                                );

                                $this->student->updateStudentCourseStatus(['status' => 1], $wherecondition);
                            }

                        } else {

                            $wherecondition = array(
                                'student_id' => $student_id,
                                'courseinfo_id' => $course_info_id,
                            );

                            $this->student->updateStudentCourseStatus(['status' => 1], $wherecondition);

                        }

                        $data['full_name'] = $full_name;
                        $studentInfo->notify(new EnrolmentPayment($data));

                        Flash('You have successfully paid the installment.')->success();
                    } else {
                        Flash('Payment Error!')->error();
                    }
                } else {
                    Flash('Payment Error!')->error();
                }

            } else {
                Flash("Data doesn't exist!")->error();
            }

        } catch (\Throwable $e) {
            Flash($e->getMessage())->error();
        }
        return redirect()->route('student-dashboard');
    }

    public function viewInstallmentForm(Request $request)
    {
        $data = $request->all();
        try {
            $data['student_payment'] = $student_payment = $this->studentpayment->find($data['id']);
            if (!empty($student_payment)) {
                $data['courseinfo'] = optional($student_payment->courseInfo);
            }
            return view('home::installment_form', $data);
        } catch (\Throwable $e) { 
            alertify($e->getMessage())->error();
            return redirect()->route('student-hub');
        }

    }

}
