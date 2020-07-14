<?php

namespace App\Modules\Enrolment\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Eway\Rapid\Client;
use App\Modules\Enrolment\Repositories\EnrolmentInterface;
use App\Modules\Enrolment\Repositories\EnrolmentPaymentInterface;
use App\Modules\Student\Repositories\StudentPaymentInterface;
use App\Modules\CourseInfo\Repositories\CourseInfoInterface;
use App\Modules\Course\Repositories\CourseInterface;
use Illuminate\Support\Facades\Redirect;
use Session;

// Mail
use Illuminate\Support\Facades\Mail;
use App\Modules\Home\Emails\SendNetaMail;

class EnrolmentController extends Controller
{

    protected $enrolment;
    protected $courseinfo;
    protected $course;
    protected $enrolpayment;
    protected $studentpayment;

    public function __construct(EnrolmentInterface $enrolment, CourseInfoInterface $courseinfo, CourseInterface $course,EnrolmentPaymentInterface $enrolpayment, StudentPaymentInterface $studentpayment)
    {
        $this->enrolment = $enrolment;
        $this->courseinfo = $courseinfo;
        $this->course = $course;
        $this->enrolpayment = $enrolpayment;
        $this->studentpayment = $studentpayment;

    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $search = $request->all();
        $data['enrolment'] = $this->enrolment->findAll($limit= 50, $search);
        return view('enrolment::enrolment.index',$data);
    }

    public function viewUser(Request $request){
        $data = $request->all(); 
        $id = (array_key_exists('id', $data)) ? $data['id'] : '';
        $enrolment = $this->enrolment->find($id);
        $data = view('enrolment::enrolment.view-detail',compact('enrolment'))->render();
        return response()->json(['options'=>$data]);
    }
    public function store(Request $request)
    {
         $data = $request->all();  

         $submit = $data['sbumit_enrol'];

         if($data['eligible_rd'] == 'is_eligible_mcq_osce')
         {
            $data['is_eligible_mcq_osce'] = 1;
            $data['is_eligible_att'] = 0;
            $data['is_eligible_letter_ahpra'] = 0;
         }
         elseif($data['eligible_rd'] == 'is_eligible_att')
         {
            $data['is_eligible_mcq_osce'] = 0;
            $data['is_eligible_att'] = 1;
            $data['is_eligible_letter_ahpra'] = 0;
         }
         elseif($data['eligible_rd'] == 'is_eligible_letter_ahpra')
         {
            $data['is_eligible_mcq_osce'] = 0;
            $data['is_eligible_att'] = 0;
            $data['is_eligible_letter_ahpra'] = 1;
         }
       

            $data['is_id'] = 1;
     
         $student_detail = auth()->guard('student')->user();
         $data['student_id'] = $student_detail->id;

         $courseinfo_id = $data['courseinfo_id'];
         $courseInfo = $this->courseinfo->find($courseinfo_id);    
         $total_course_fee = $courseInfo->course_fee;
  
         try{

             $enrolmentData = array(
                'student_id'=>$data['student_id'],
                'courseinfo_id'=>$data['courseinfo_id'],
                'is_eligible_mcq_osce'=>$data['is_eligible_mcq_osce'],
                'is_eligible_att'=>$data['is_eligible_att'],
                'is_eligible_letter_ahpra'=>$data['is_eligible_letter_ahpra'],
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
                'payment_status' =>0
            );

            if ($request->hasFile('eligible_document')) {
              $enrolmentData['eligible_document'] = $this->enrolment->upload($data['eligible_document']);
             }

            if ($request->hasFile('identity_document')) {
                 $enrolmentData['identity_document'] = $this->enrolment->upload($data['identity_document']);
          }

            $enrolment = $this->enrolment->save($enrolmentData);


            if($submit === 'pay_later'){ 

                $studentPaymentData = array(
                    'student_id'=>$data['student_id'],
                    'courseinfo_id'=>$data['courseinfo_id'],
                    'enrolment_payment_id'=>null,
                    'status' => 'Pending',
                    'moved_to_student' => 0,
                    'total_course_fee' =>$total_course_fee,
                    'amount_paid' => '0',
                    'amount_left' => $total_course_fee
                );
              
                $studentpayment = $this->studentpayment->save($studentPaymentData);

                /* --------------------------------------------------------------- 
                        Email Send to Student After Registration 
                 --------------------------------------------------------------- */
                 
                 $email =$student_detail->email;
                
                 $subject = 'Enrolment Successfully.'; 

                 $student['name'] = $student_detail->full_name;

                 $content  = view('enrolment::enrolment.enrol-register-content',$student)->render(); 

                 if (filter_var( $email, FILTER_VALIDATE_EMAIL )) {
                     Mail::to($email)->send(new SendNetaMail($content,$subject));
                }

                /* --------------------------------------------------------------- 
                            Email Send to Student After Registration 
                --------------------------------------------------------------- */


                //alertify()->success('You have Successfully enrol Course. We will contact you soon.');
                Flash('You have Successfully enrol Course. We will contact you soon.')->success(); 
                return redirect(route('student-dashboard'));
            }

            $enrolment_id = $enrolment->id;
            $courseinfo_id = $this->courseinfo->where('id', $data['courseinfo_id'])->first();
            $amount = Session::put('amount', $courseinfo_id->course_fee);
            $apiKey = env('APIKEY');
            $apiPassword = env('PASSWORD');
            $apiEndpoint = \Eway\Rapid\Client::MODE_SANDBOX;

            $client = \Eway\Rapid::createClient($apiKey, $apiPassword, $apiEndpoint);
            $transaction = [
                'Customer' => [
                'Title' => $enrolment->title,
                'FirstName' => $enrolment->first_name,
                'LastName' => $enrolment->last_name,
                'Street1'=>$enrolment->street1,
                'Street2' => $enrolment->street2,
                'City' => $enrolment->city,
                'State' => $enrolment->state,
                'PostalCode'=>$enrolment->postalcode,
                'Country' =>$enrolment->country,
                'Email' =>$enrolment->email,
                'Phone' =>$enrolment->phone
                ],
                'RedirectUrl' => route('enrolmentstudent.redirect',$enrolment->id),
                'CancelUrl' => route('enrolmentstudent.cancel'),
                'TransactionType' => \Eway\Rapid\Enum\TransactionType::PURCHASE,
                'Payment' => [
                'TotalAmount' =>$courseinfo_id->course_fee."00",
                ]
                ];

                $response = $client->createTransaction(\Eway\Rapid\Enum\ApiMethod::RESPONSIVE_SHARED, $transaction);
             
                if (!$response->getErrors()) {
                $sharedURL = $response->SharedPaymentUrl;
                $enrolpaymentData = array(
                'enrolment_id'=>$enrolment->id,
                'sucess'=>0);

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

                Flash('You have Successfully enrol Course. We will contact you soon.')->success();  
           // alertify()->success('Course Information Created Successfully');
          // return redirect(route('enrolment.viewUser',['id'=>$enrolment_id]));
          return redirect(route('student-dashboard'));

        }
          catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }

        // return redirect(route('enrolment.viewUser'));
        Flash('You have Successfully enrol Course. We will contact you soon.')->success(); 
        return redirect(route('student-dashboard'));
    }


    public function cancel()
    {
       // return redirect(route('enrolment.viewUser'));
        return redirect(route('student-dashboard'));
    }
    public function redirect($id)
    {
        $id = (int)$id;
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
                'transactionID'=>$transactionResponse->TransactionID,
                'totalAmount'=>$transactionResponse->TotalAmount,
                'customer'=>$customer,
                'shippingAddress'=>$shippingAddress,
                'sucess'=>1,

                 );

           $enrolpayment = $this->enrolpayment->update($enrolpayment_info->id, $enrolpaymentData);

            $enrolmentData = array(
                'payment_status'=>1,);
            $enrolment = $this->enrolment->update($id,$enrolmentData);



           $studentPaymentData = array(
                'student_id'=>$enrolpayment_info->enrolmentinfo->student_id,
                'courseinfo_id'=>$enrolpayment_info->enrolmentinfo->courseinfo_id,
                'enrolment_payment_id'=>$enrolpayment_info->id,
                'status' => 'Paid',
                'total_course_fee' => $totalAmount,
                'amount_paid' => $totalAmount,
                'amount_left' => '0'
                );
           $studentpayment = $this->studentpayment->save($studentPaymentData);


        'Payment successful! ID: ' .$transactionResponse->TransactionID;
        return redirect(route('enrolmentstudent.sucess', $transactionResponse->TransactionID));

        }
        else
         {
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
         return view('enrolment::sucess',$data);

    }


     public function error($transaction_id)
    {
         $data['transaction_id'] = $transaction_id;
         return view('enrolment::error',$data);

    }

}
