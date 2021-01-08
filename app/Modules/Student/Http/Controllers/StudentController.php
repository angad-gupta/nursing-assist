<?php

namespace App\Modules\Student\Http\Controllers;

use App\Modules\Agent\Repositories\AgentInterface;
use App\Modules\CourseInfo\Repositories\CourseInfoInterface;
use App\Modules\Quiz\Repositories\QuizInterface;
use App\Modules\Student\Repositories\StudentInterface;
use App\Modules\Student\Repositories\StudentPaymentInterface;
use App\Modules\Student\Repositories\StudentPracticeInterface;
use App\Modules\Student\Repositories\StudentReadinessInterface;
use App\Modules\Enrolment\Repositories\EnrolmentInterface;
use App\Modules\EmailLog\Repositories\EmaillogInterface;
use App\Notifications\EnrolmentInstallmentPayment;


use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Mail
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Mail;
use App\Modules\Home\Emails\SendNetaMail;

class StudentController extends Controller
{
    protected $enrolment;
    protected $student;
    protected $quiz;
    protected $courseinfo;
    /**
     * @var AgentInterface
     */
    protected $agent;
    /**
     * @var StudentPaymentInterface
     */
    protected $studentPayment;
    /**
     * @var StudentPracticeInterface
     */
    protected $studentPractice;
    protected $studentReadiness;
    protected $emailLog;

    public function __construct(
        StudentInterface $student,
        EnrolmentInterface $enrolment,
        QuizInterface $quiz,
        CourseInfoInterface $courseinfo,
        AgentInterface $agent,
        StudentPaymentInterface $studentPayment,
        StudentPracticeInterface $studentPractice,
        EmaillogInterface $emailLog,
        StudentReadinessInterface $studentReadiness) {
        $this->enrolment = $enrolment;
        $this->student = $student;
        $this->quiz = $quiz;
        $this->courseinfo = $courseinfo;
        $this->agent = $agent;
        $this->studentPayment = $studentPayment;
        $this->studentPractice = $studentPractice;
        $this->studentReadiness = $studentReadiness;
        $this->emailLog = $emailLog;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $search = $request->all();
        $sort_by = ['by' => 'id', 'sort' => 'DESC'];
        if (isset($search['sort_by']) && !empty($search['sort_by'])) {
            $sort_by = ['by' => 'full_name', 'sort' => $search['sort_by']];
        }

        $data['student'] = $this->student->findAll($limit = 50, $search, $sort_by);
        $data['months'] = $this->courseinfo->getMonths();
        $data['agents'] = $this->agent->getList();

        return view('student::student.index', $data);
    }

    public function indexArchive(Request $request)
    {
        $search = $request->all();
        $search['active'] = 0;
        $sort_by = ['by' => 'id', 'sort' => 'DESC'];
        if (isset($search['sort_by']) && !empty($search['sort_by'])) {
            $sort_by = ['by' => 'full_name', 'sort' => $search['sort_by']];
        }

        $data['student'] = $this->student->findAllArchives($limit = 50, $search, $sort_by);
        return view('student::student.index-archive', $data);
    }

    public function status(Request $request)
    {
        $input = $request->all();
        $student_id = $input['student_id'];

        try {
            $studentData = array(
                'active' => $input['active'],
            );

            if(isset($input['archive']) && $input['archive'] == 1 && $input['active'] == 1) {
                $studentData['deleted_at'] = null;
            } elseif($input['active'] == 0) {
                $studentData['deleted_at'] = date('Y-m-d H:i:s');
            }

            $this->student->update($student_id, $studentData);

            alertify()->success('Student Status Updated Successfully');
        } catch (\Throwable $e) {
            alertify($e->getMessage())->error();
        }

        return redirect()->back();
    }

    public function studentCourse(Request $request)
    {
        $input = $request->all();
        $student_id = $input['student_id'];

        $data['student_courses'] = $this->student->getStudentCourse($student_id);

        return view('student::student.student_course', $data);
    }

    public function studentPurchase(Request $request)
    {
        $input = $request->all();
        $student_id = $input['student_id'];

        $data['student_purchase'] = $this->student->getStudentPurchase($student_id);
        $data['student_id'] = $student_id;

        return view('student::student.student_purchase', $data);
    }

    public function studentquizResult(Request $request)
    {
        $input = $request->all();
        $student_id = $input['student_id'];

        $data['student_quiz'] = $this->student->getStudentQuizResult($student_id);
        $data['student_id'] = $student_id;

        return view('student::student.student_quiz_result', $data);
    }

    public function studentmockupResult(Request $request)
    {
        $input = $request->all();
        $student_id = $input['student_id'];

        $data['student_mockup'] = $this->student->getStudentMockupResult($student_id);
        $data['student_id'] = $student_id;

        return view('student::student.student_mockup_result', $data);
    }

    public function purchaseUpdate(Request $request)
    {
        $input = $request->all();

        $student_id = $input['student_id'];
        $payment_id = $input['payment_id'];

        $moved_to_student = $input['moved_to_student'];

        try {
            $studentSData = array(
                'moved_to_student' => $moved_to_student,
                'moved_date' => date('Y-m-d'),
            );

            $this->student->updatePaymentStatus($payment_id, $studentSData);

            $studentPuchaseInfo = $this->student->findPurchaseCourse($payment_id);

            $course_info_id = $studentPuchaseInfo->courseinfo_id;
            $courseInfo = $this->courseinfo->find($course_info_id);
            $is_package = $courseInfo->is_course_package;

            if ($is_package == 1) {
                $course_id = $courseInfo->course_id;
                $course_package = $this->courseinfo->getCoursePackage($course_id, $course_info_id);

                foreach ($course_package as $key => $pack_val) {

                    $courseData = array(
                        'student_id' => $student_id,
                        'courseinfo_id' => $pack_val->id,
                    );

                    $check_stu_course = $this->student->getStudentCourseInfo($courseData);
                    if(!empty($check_stu_course)) {
                        if (($moved_to_student == '1' && $pack_val->course_program_title == 'NCLEX') || ($moved_to_student == '1' && $pack_val->course_program_title == 'OSCE' 
                        && ($studentPuchaseInfo->status == 'Third Installment Paid' || $studentPuchaseInfo->status == 'Paid')) ) {
                            $this->student->updateStudentCourseStatus(['status' => 1], $courseData);
                        } else {
                            $this->student->updateStudentCourseStatus(['status' => 0], $courseData);
                        }
                    } else {
                        $this->student->storeStudentCourse($courseData);
                    }

                   
                }

            } else {

                $courseData = array(
                    'student_id' => $studentPuchaseInfo->student_id,
                    'courseinfo_id' => $studentPuchaseInfo->courseinfo_id,
                );

                $check_stu_course = $this->student->getStudentCourseInfo($courseData);
                if(!empty($check_stu_course)) {
                    if ($moved_to_student == '1') {
                        $this->student->updateStudentCourseStatus(['status' => 1], $courseData);
                    } else {
                        $this->student->updateStudentCourseStatus(['status' => 0], $courseData);
                    }
                } else {
                    $this->student->storeStudentCourse($courseData);
                }

            }

            $data['studentInfo'] = $studentInfo = $this->student->find($student_id);
            $email = $studentInfo->email;

            if ($moved_to_student == '1') {

                /* ---------------------------------------------------------------
                Email Send to Student After Payment success
                --------------------------------------------------------------- */

                $subject = 'Course Approval Successfully.';

                $data['coursinfo'] = $studentPuchaseInfo;

                $content = view('student::student.partial.email-content')->render();

                //  if (filter_var( $email, FILTER_VALIDATE_EMAIL )) {
                Mail::to($email)->send(new SendNetaMail($content, $subject));
                // }

                 /*     Email Log Maintaining    */
                $emaillog['action'] = 'Student Course Approval';
                $emaillog['student_id'] = $student_id;
                $emaillog['date'] = date('Y-m-d');
                $this->emailLog->saveEmaillog($emaillog);
                /*  End of Email Log Maintaining  */


                /* ---------------------------------------------------------------
            Email Send to Student After Payment success
            --------------------------------------------------------------- */

            } else {

                if($studentPuchaseInfo->status=='First Installment Paid') {
                    $ins = 2;
                } elseif($studentPuchaseInfo->status == 'Second Installment Paid') {
                    $ins = 3;
                } else {
                    $ins = 3;
                }

                $data['full_name'] = $studentInfo->full_name;
                $data['subject'] = 'Grace Period Expired Notification for ' . $courseInfo->course_program_title . ' Course Enrolment';
                $data['mail_desc'] = 'Your grace period for course has expired. Please make payment for ' . $courseInfo->course_program_title . ' course enrolment continuation.';
                $data['pay_url'] = route('enrolment.installment.pay', ['id' => $payment_id, 'ins' => $ins]);

                $studentInfo->notify(new EnrolmentInstallmentPayment($data));

                /*     Email Log Maintaining    */
                $emaillog['action'] = 'Pending Payment';
                $emaillog['student_id'] = $student_id;
                $emaillog['date'] = date('Y-m-d');
                $this->emailLog->saveEmaillog($emaillog);
                /*  End of Email Log Maintaining  */
            }

            alertify()->success('Student Payment Status Updated Successfully');
        } catch (\Throwable $e) {
            alertify($e->getMessage())->error();
        }

        return redirect()->back();
        // return redirect(route('studentpurchase.index', ['student_id' => $student_id]));
    }

    public function courseInstallment(Request $request)
    {
        $input = $request->all(); 

        $amount_paid = $input['amount_paid']; 

        $student_id = $input['student_id'];
        $payment_id = $input['payment_id'];

        try {

            $studentPuchaseInfo = $this->student->findPurchaseCourse($payment_id); 
            $total_course_fee = str_replace(',', '', $studentPuchaseInfo->total_course_fee);  
            $amount_left = str_replace(',', '', $studentPuchaseInfo->amount_left);

            $amountPaid =  (float)$studentPuchaseInfo->amount_paid +  (float)$amount_paid;

            $amt_remaining =  (float)$amount_left -  $amount_paid; 

            $status = ($amt_remaining == 0) ? 'Paid' : 'Partially Paid';

            /*Student Payment History*/
                $history = array(
                    'student_payment_id' => $payment_id,
                    'amount_paid' => $amount_paid,
                    'date' => date('Y-m-d')
                );

                $this->student->storePaymentHistory($history);
            /*End of Student Payment History*/


            $payment_data = array(

                'amount_paid' => $amountPaid,
                'amount_left' => $amt_remaining, 
                'status' => $status,
            );

            $this->student->updatePaymentStatus($payment_id, $payment_data);


            $student_info = $this->student->find($student_id);

            $email = $student_info->email;
            $subject = 'Course Installment Payment';

            $emailContent['student_info'] = $student_info;
            $emailContent['total_course_fee'] = $total_course_fee;
            $emailContent['amount_paid'] = $amount_paid;
            $emailContent['amount_left'] = $amt_remaining;


        /* ---------------------------------------------------------------
            Email Send to Installment Nofitication
        --------------------------------------------------------------- */
           $content = view('student::student.partial.email-installment-content',$emailContent)->render();

          Mail::to($email)->send(new SendNetaMail($content, $subject));

                /*     Email Log Maintaining    */
                $emaillog['action'] = 'Course Installment Payment';
                $emaillog['student_id'] = $student_id;
                $emaillog['date'] = date('Y-m-d');
                $this->emailLog->saveEmaillog($emaillog);
                /*  End of Email Log Maintaining  */

        /* ---------------------------------------------------------------
            Email Send to  Installment Nofitication
        --------------------------------------------------------------- */


            alertify()->success('Student Payment Updated Successfully');
        } catch (\Throwable $e) {
            alertify($e->getMessage())->error();
        }
        return redirect()->back();
        // return redirect(route('studentpurchase.index', ['student_id' => $student_id]));

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $this->student->update($id, ['active' => 0]);
            $this->student->delete($id);
            alertify()->success('Student Deleted Successfully');
        } catch (\Throwable $e) {
            alertify($e->getMessage())->error();
        }
       return redirect()->back();
        
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroyStudentPurchase(Request $request)
    {
        $input = $request->all();
        try {
            $this->studentPayment->delete($input['id']);
            alertify()->success('Student Purchase History Deleted Successfully');
        } catch (\Throwable $e) {
            alertify($e->getMessage())->error();
        }
        return redirect(route('studentpurchase.index', ['student_id' => $input['student_id']]));
    }

    public function studentPracticeResult(Request $request)
    {
        $data = $request->all();
        $student_id = $data['student_id'];

        $data['practice_results'] = $this->studentPractice->findAll(50, ['student_id' => $student_id]);

        return view('student::student.student_practice_result', $data);
    }

     public function profile(Request $request){
        $input = $request->all();
        $data['student_id'] = $student_id = $input['student_id'];


        $data['student_courses'] = $student_courses = $this->student->getStudentCourse($student_id);
        $data['studentInfo'] =  $this->student->find($student_id);
        $data['enrol_info'] = $this->enrolment->getLatestByStudent($student_id); 
        $data['quiz_info'] = $this->student->getLatestQuizByStudent($student_id);

        
        $data['student_purchase'] = $this->student->getStudentPurchase($student_id);
        $data['student_quiz'] = $this->student->getStudentQuizResult($student_id);
        $data['student_mockup'] = $this->student->getStudentMockupResult($student_id);
        $data['student_readiness'] = $this->studentReadiness->getStudentReadinessResult($student_id);
        $data['practice_results'] = $this->studentPractice->findAll(50, ['student_id' => $student_id]);
        
        return view('student::student.profile',$data);

    }

    public function viewPaymentHistory(Request $request){

        $data = $request->all();
        $id = $data['student_payment_id'];
        $paymentInfo  = $this->student->findStudentPayment($id); 
        $historyDetail = $this->student->findPaymentHistory($id);
        $data = view('student::student.view-payment-history-detail', compact('historyDetail','paymentInfo'))->render();
        return response()->json(['options' => $data]);

    }

    public function saveCourseDate(Request $request)
    {
        $all = $request->all();
        try {
            $this->studentPayment->update($all['payment_id'], ['course_start_date' => $all['course_start_date']]);
            alertify()->success('Course Start Date Added Successfully!');
        } catch(\Throwable $t) {
            alertify()->error($t->getMessage());
        }
        return redirect()->back();
    }

    public function saveThirdInstallmentDate(Request $request)
    {
        $all = $request->all();
        try {
            $this->studentPayment->update($all['payment_id'], ['final_installment_date' => $all['final_installment_date']]);
            alertify()->success('Third Installment Date Added Successfully!');
        } catch(\Throwable $t) {
            alertify()->error($t->getMessage());
        }
        return redirect()->back();
    }

}
