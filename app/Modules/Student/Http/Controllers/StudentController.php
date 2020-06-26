<?php

namespace App\Modules\Student\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Modules\Student\Repositories\StudentInterface;
use App\Modules\Quiz\Repositories\QuizInterface;
// Mail
use Illuminate\Support\Facades\Mail;
use App\Modules\Home\Emails\SendNetaMail;

class StudentController extends Controller
{
    protected $StudentController;
    protected $quiz;
    
    public function __construct(StudentInterface $student, QuizInterface $quiz)
    {
        $this->student = $student;
        $this->quiz = $quiz;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $search = $request->all();
        $data['student'] = $this->student->findAll($limit= 50,$search);  
        return view('student::student.index',$data);
    }

    public function status(Request $request){
        $input = $request->all();
        $student_id = $input['student_id'];

        try{ 
            $studentData = array(
                'active' => $input['active']
            );

          $this->student->update($student_id, $studentData);
           
            alertify()->success('Student Status Updated Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('student.index'));
    }

    public function studentCourse(Request $request){
        $input = $request->all();
        $student_id = $input['student_id']; 

         $data['student_courses'] = $this->student->getStudentCourse($student_id); 

         return view('student::student.student_course',$data);
    }

    public function studentPurchase(Request $request){
        $input = $request->all();
        $student_id = $input['student_id']; 

         $data['student_purchase'] = $this->student->getStudentPurchase($student_id); 
         $data['student_id'] = $student_id;

         return view('student::student.student_purchase',$data);
    }

    public function studentquizResult(Request $request){
         $input = $request->all();
         $student_id = $input['student_id']; 

         $data['student_quiz'] = $this->student->getStudentQuizResult($student_id);   
         $data['student_id'] = $student_id;

         return view('student::student.student_quiz_result',$data);
    }

    public function purchaseUpdate(Request $request){
        $input = $request->all();

        $student_id = $input['student_id'];
        $payment_id = $input['payment_id'];

        $moved_to_student = $input['moved_to_student'];

        try{ 
            $studentSData = array(
                'moved_to_student' => $moved_to_student
            );

          $this->student->updatePaymentStatus($payment_id, $studentSData);

          if($moved_to_student == '1'){

           $studentPuchaseInfo =  $this->student->findPurchaseCourse($payment_id); 

           $courseData = array(
                'student_id' => $studentPuchaseInfo->student_id,
                'courseinfo_id' =>$studentPuchaseInfo->courseinfo_id
           );

            $this->student->storeStudentCourse($courseData);

            /* --------------------------------------------------------------- 
                        Email Send to Student After Payment success 
             --------------------------------------------------------------- */
             
             $data['studentInfo'] = $studentInfo = $this->student->find($student_id);
             $email = $studentInfo->email;

             $subject = 'Course Payment Successfully.';

             $data['coursinfo'] = $studentPuchaseInfo;  

             $content  = view('student::student.partial.email-content',$data)->render(); 

             if (filter_var( $email, FILTER_VALIDATE_EMAIL )) {
                 Mail::to($email)->send(new SendNetaMail($content,$subject));
            }

            /* --------------------------------------------------------------- 
                        Email Send to Student After Payment success 
             --------------------------------------------------------------- */


          }
           
            alertify()->success('Student Payment Status Updated Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('studentpurchase.index',['student_id'=> $student_id]));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
         try{
            $this->student->delete($id);
             alertify()->success('Student Deleted Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
      return redirect(route('student.index'));
    }

}
