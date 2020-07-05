<?php

namespace App\Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Modules\Student\Repositories\StudentInterface;
use Illuminate\Support\Facades\Auth;
use App\Modules\Announcement\Repositories\AnnouncementInterface;
use App\Modules\Message\Repositories\MessageInterface;
use App\Modules\CourseInfo\Repositories\CourseInfoInterface;
use App\Modules\CourseContent\Repositories\CourseContentInterface;
use App\Modules\Syllabus\Repositories\SyllabusInterface;
use App\Modules\Quiz\Repositories\QuizInterface;
use App\Modules\Mockup\Repositories\MockupInterface;


class DashboardController extends Controller
{
      protected $student;
      protected $announcement;
      protected $message;
      protected $courseinfo;
      protected $coursecontent;
      protected $syllabus;
      protected $quiz;
      protected $mockup;
    
    public function __construct(StudentInterface $student, AnnouncementInterface $announcement , MessageInterface $message,  CourseInfoInterface $courseinfo, CourseContentInterface $coursecontent, SyllabusInterface $syllabus,QuizInterface $quiz, MockupInterface $mockup)
    {
        $this->student = $student;
        $this->announcement = $announcement;
        $this->message = $message;
        $this->courseinfo = $courseinfo;
        $this->coursecontent = $coursecontent;
        $this->syllabus = $syllabus;
        $this->quiz = $quiz;
        $this->mockup = $mockup;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $id = Auth::guard('student')->user()->id;
        $data['student_profile'] = Auth::guard('student')->user()->find($id);
        $data['announcement'] = $this->announcement->findAll($limit=5);  
        $data['message'] = $this->message->getSendMessageByUser($id, $limit=5);  
        $data['student_course'] = $this->student->getStudentCourse($id);
        $data['student_course_purchase'] = $this->student->getStudentPurchase($id);  

        return view('home::student.dashboard',$data);
    }

    public function studentProfileUpdate(Request $request,$id){
        $data = $request->all();

        try{

            if ($request->hasFile('profile_pic')) {
                $data['profile_pic'] = $this->student->upload($data['profile_pic']);
            }

            $this->student->update($id,$data);
            Flash('Student Profile Updated Successfully')->success(); 
            return redirect(route('student-dashboard'));
        }catch(\Throwable $e){
           Flash($e->getMessage())->error(); 
        }
        
        return redirect(route('student-dashboard'));

    }

    public function sendMessage(Request $request){
        $data = $request->all();
        $message = $data['message'];

        if($message == null){
            Flash('Message not Enter.')->error();
            return redirect(route('student-dashboard'));
        }
        
        $data['sent_by'] = Auth::guard('student')->user()->id;
        $name = Auth::guard('student')->user()->full_name;
        $data['title']= 'A Message from '. $name;

        try{

            $this->message->save($data);
            Flash('Message Sent To Admin Successfully')->success();
        }catch(\Throwable $e){
           alertify($e->getMessage())->error();
        }

        return redirect(route('student-dashboard'));

    }

    public function studentCourse(){
        $id = Auth::guard('student')->user()->id;
        $data['student_course'] = $this->student->getStudentCourse($id); 

        $data['other_course'] = $this->courseinfo->findAll();  
        return view('home::student.courses',$data);
    }

    public function syllabusDetail(Request $request){
        $input = $request->all();

        $course_info_id = $input['course_info_id'];

        $data['syllabus_info'] = $this->coursecontent->getAllCourses($course_info_id); 
        $data['course_info_id'] = $course_info_id;

        return view('home::student.course-syllabus',$data);

    }

    public function lessonsDetail(Request $request){

        $input = $request->all();

        $course_info_id = $input['course_info_id'];
        $syllabus_id = $input['syllabus_id'];

        $data['lesson_info'] = $this->coursecontent->getAllLesson($course_info_id,$syllabus_id);

        $data['course_info_id'] = $course_info_id;
        $data['syllabus_id'] = $syllabus_id;

        $data['syllabus'] = $this->syllabus->find($syllabus_id);  

        return view('home::student.course-lesson',$data);

    }

    public function lessonPlanDetail(Request $request){
        $input = $request->all();

        $course_content_id = $input['course_content_id'];
        $course_info_id = $input['course_info_id'];
        $syllabus_id = $input['syllabus_id'];

        $data['lesson_detail'] = $lesson_detail = $this->coursecontent->find($course_content_id);

        $next_lesson_sort = ($lesson_detail->sort_order)+1;

        $next_lesson = $this->coursecontent->findNextLesson($course_info_id, $syllabus_id, $next_lesson_sort);

        if($next_lesson){
            $data['next_course_content_id'] = $next_lesson['id'];
        }else{
            $data['next_course_content_id'] = '';
        }

        $data['course_info_id'] = $course_info_id;
        $data['syllabus_id'] = $syllabus_id;

        return view('home::student.course-lesson-detail',$data);
    }

    public function studentQuiz(Request $request){
        $input= $request->all();
        
        $student_id = Auth::guard('student')->user()->id; 
        $courseContentId = $input['course_content_id'];
        $syllabus_id = $input['syllabus_id'];
        $course_info_id = $input['course_info_id'];

        $lessonInfo = $this->coursecontent->find($courseContentId);

        $checkQuiz = $this->student->checkQuizForCourseInfo($student_id, $courseContentId); 
        if ($checkQuiz > 0) {

            Flash('Practise Test Already Taken.Please Proceed Next Course.')->success();
            return redirect(route('syllabus-detail',['course_info_id'=>$lessonInfo->course_info_id]));

        }

        $sort_order = $lessonInfo->sort_order;
        $previous_order = ($lessonInfo->sort_order > 1) ? $sort_order -1 : $sort_order ; 
        $previousCourseontentInfo = $this->coursecontent->getPreviousData($course_info_id,$syllabus_id,$previous_order);

        $previous_course_content_id = $previousCourseontentInfo->id;


        if($previousCourseontentInfo->is_related_to_quiz == '1'){
            $previous_quiz_result = $this->student->previousQuizData($student_id, $previous_course_content_id);
        
        
            if($previous_course_content_id != $courseContentId){
                  
                if(!is_null($previous_quiz_result)){
                   $pervious_quiz_percent = $previous_quiz_result->percent;
                   $previous_quiz_id = $previous_quiz_result->id;
                   if($pervious_quiz_percent < 80){
                      
                      $this->student->deletePreviousQuizResult($previous_quiz_id);
                      $this->student->deletePreviousQuizHistory($student_id, $course_info_id, $previous_course_content_id);

                      Flash('You have to score atleast 80% from previous Quiz.Pleast Retake Practice Test Again')->success();
                      return redirect(route('syllabus-detail',['course_info_id'=>$lessonInfo->course_info_id]));

                   }

                }else{
                     Flash('You haven\'t taken previous Lesson Practice Test.')->success();
                    return redirect(route('syllabus-detail',['course_info_id'=>$lessonInfo->course_info_id]));
                }
            }

      }

        $data['general_quiz'] = $this->quiz->getGeneralById($courseContentId,10);
        $data['courseinfoId'] = $lessonInfo->course_info_id;
        $data['course_content_id'] = $courseContentId;

       return view('home::student.general-quiz',$data);
    }

    public function studentQuizStore(Request $request){
        $input = $request->all();  

        $student_id = Auth::guard('student')->user()->id; 
        $courseinfo_id = $input['courseinfo_id'];
        $course_content_id = $input['course_content_id'];

        $checkQuiz = $this->student->checkQuizForCourseInfo($student_id, $course_content_id); 
        if ($checkQuiz > 0) {
            Flash('Practise Test Already Taken.Please Proceed Next Course.')->success();
            return redirect(route('syllabus-detail',['course_info_id'=>$courseinfo_id]));
        }

        if(!array_key_exists('question_option_1', $input)){
            Flash('Are you Serious with your Test ? Please Choose your Answer.')->error();
            return redirect(route('student-courses'));
        }

        try{
            $m =1;
            $quiz_id = $input['quiz_id'];
            $countname = sizeof($quiz_id); 
                for($i = 0; $i < $countname; $i++){
                   
                    if($input['quiz_id'][$i]){
                        

                        $quiz_id =$input['quiz_id'][$i];
                        $question_option = json_encode($input['question_option_'.$m]);

                         $quizdata['student_id'] = $student_id;
                         $quizdata['courseinfo_id'] = $courseinfo_id;
                         $quizdata['course_content_id'] = $course_content_id;
                         $quizdata['quiz_id'] = $input['quiz_id'][$i];
                         $quizdata['answer'] = json_encode($input['question_option_'.$m]);

                         $checkAnswer = $this->quiz->checkCorrectAnswer($quiz_id,$question_option);

                         if($checkAnswer > 0){
                            $quizdata['is_correct_answer'] = 1;
                         }else{
                            $quizdata['is_correct_answer'] = 0;
                         }
                      
                            $this->student->saveQuizHistory($quizdata);
                        $m++;
                    }
                }

             $quiz_history = $this->student->getquizHistory($student_id,$course_content_id);   
             $correct_answer = $this->student->getcorrectAnswer($student_id,$course_content_id);   

             $total_question = count($quiz_history); 
             $correctPercent = ($correct_answer / $total_question) * 100;

             $data['correct_percent'] = $correct_percent = number_format($correctPercent,2);
             $data['quiz_history'] = $quiz_history;
             $data['correct_answer'] = $correct_answer;
             $data['incorrect_answer'] = $total_question - $correct_answer ;

             $quiz_result = array(
                    'student_id' => $student_id,
                    'courseinfo_id'=> $courseinfo_id,  
                    'course_content_id' =>$course_content_id,   
                    'date'=> date('Y-m-d'),
                    'total_question'=> $total_question,
                    'score'=> $correct_answer,
                    'percent'=> $correct_percent
             );

             $this->student->saveQuizResult($quiz_result);

             return view('home::student.general-quiz-report',$data);

        }catch(\Throwable $e){
           alertify($e->getMessage())->error();
        }
    }


    public function mockupQuestion(Request $request){

      $input = $request->all(); 

      $mockup_title = $input['mockup_title'];

      $mockupInfo = $this->mockup->getQuestionByTitle($mockup_title);

      if(sizeof($mockupInfo) > 0){
      
       $data['mockupInfo'] = $mockupInfo;
       $data['mockup_title'] = $mockup_title;
       return view('home::student.mockup-test',$data);
      
      }else{
           Flash('No Mockup Question Set. Please Check Later.')->error();
            return redirect(route('student-courses'));
      }

    }

    public function studentmockupStore(Request $request){
      $input = $request->all();  

      $mockup_title = $input['mockup_title'];
      $student_id = Auth::guard('student')->user()->id; 

      $this->student->deleteMockuphistory($student_id,$mockup_title);

      if(!array_key_exists('question_option_1', $input)){
            Flash('Are you Serious with your Test ? Please Choose your Answer.')->error();
            return redirect(route('student-courses'));
      }
        
      try{
         $m =1;
            $question_id = $input['question_id'];
            $countname = sizeof($question_id); 
                for($i = 0; $i < $countname; $i++){
                   
                    if(array_key_exists('question_option_'.$m, $input)){
                        
                        $question_id =$input['question_id'][$i];
                        $question_option = json_encode($input['question_option_'.$m]);

                         $mockupdata['student_id'] = $student_id;
                         $mockupdata['mockup_title'] = $mockup_title;
                         $mockupdata['question_id'] = $input['question_id'][$i];
                         $mockupdata['answer'] = json_encode($input['question_option_'.$m]);

                         $checkAnswer = $this->mockup->checkCorrectAnswer($question_id,$question_option);

                         if($checkAnswer > 0){
                            $mockupdata['is_correct_answer'] = 1;
                         }else{
                            $mockupdata['is_correct_answer'] = 0;
                         }
                      
                            $this->student->savemockupHistory($mockupdata);

                            //sleep for 3 seconds
                            usleep(3000000);

                        $m++;
                    }
                }

             $mockup_history = $this->student->getmockupHistory($student_id,$mockup_title);   
             $correct_answer = $this->student->getmockupcorrectAnswer($student_id,$mockup_title);   

             $total_question = count($mockup_history); 
             $correctPercent = ($correct_answer / $total_question) * 100;

             $data['correct_percent'] = $correct_percent = number_format($correctPercent,2);
             $data['mockup_history'] = $mockup_history;
             $data['correct_answer'] = $correct_answer;
             $data['incorrect_answer'] = $total_question - $correct_answer ;

             $mockup_result = array(
                    'student_id' => $student_id,
                    'mockup_title'=> $mockup_title,   
                    'date'=> date('Y-m-d'),
                    'total_question'=> $total_question,
                    'correct_answer'=> $correct_answer,
                    'percent'=> $correct_percent
             );
            
             $this->student->saveMockupResult($mockup_result);

             return view('home::student.mockup-report',$data);



      }catch(\Throwable $e){
           alertify($e->getMessage())->error();
        }

    }


    public function studentCourseInvoice(Request $request){

      $input = $request->all();

      $student_purchase_id = $input['student_purchase_id'];
      $data['status'] = $input['status'];

      $data['student_puchase_info'] = $this->student->findPurchaseCourse($student_purchase_id);

      return view('home::student.course-invoice',$data);

    }
  
  
}
