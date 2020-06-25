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


class DashboardController extends Controller
{
      protected $student;
      protected $announcement;
      protected $message;
      protected $courseinfo;
      protected $coursecontent;
      protected $syllabus;
      protected $quiz;
    
    public function __construct(StudentInterface $student, AnnouncementInterface $announcement , MessageInterface $message,  CourseInfoInterface $courseinfo, CourseContentInterface $coursecontent, SyllabusInterface $syllabus,QuizInterface $quiz)
    {
        $this->student = $student;
        $this->announcement = $announcement;
        $this->message = $message;
        $this->courseinfo = $courseinfo;
        $this->coursecontent = $coursecontent;
        $this->syllabus = $syllabus;
        $this->quiz = $quiz;
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

        $data['lesson_detail'] = $this->coursecontent->find($course_content_id);
        $data['course_info_id'] = $course_info_id;
        $data['syllabus_id'] = $syllabus_id;

        return view('home::student.course-lesson-detail',$data);
    }

    public function studentQuiz(Request $request){
        $input= $request->all();
        
        $student_id = Auth::guard('student')->user()->id; 
        $courseinfoId = $input['course_info_id'];

        $checkQuiz = $this->student->checkQuizForCourseInfo($student_id, $courseinfoId); 
        if ($checkQuiz > 0) {
            
            Flash('Practise Test Already Taken.Please Proceed Next Course.')->success();
            return redirect(route('syllabus-detail',['course_info_id'=>$courseinfoId]));

        }

        $data['general_quiz'] = $this->quiz->getGeneralById($courseinfoId,10);
        $data['courseinfoId'] = $courseinfoId;

       return view('home::student.general-quiz',$data);
    }

    public function studentQuizStore(Request $request){
        $input = $request->all();

        $student_id = Auth::guard('student')->user()->id; 
        $courseinfo_id = $input['courseinfo_id'];

        try{
            $m =1;
            $quiz_id = $input['quiz_id'];
            $countname = sizeof($quiz_id); 
                for($i = 0; $i < $countname; $i++){
                   
                    if($input['quiz_id'][$i]){
                        

                        $quiz_id =$input['quiz_id'][$i];
                        $question_option =$input['question_option_'.$m][0];

                         $quizdata['student_id'] = $student_id;
                         $quizdata['courseinfo_id'] = $courseinfo_id;
                         $quizdata['quiz_id'] = $input['quiz_id'][$i];
                         $quizdata['answer'] = $input['question_option_'.$m][0];  

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

             $quiz_history = $this->student->getquizHistory($student_id,$courseinfo_id);   
             $correct_answer = $this->student->getcorrectAnswer($student_id,$courseinfo_id);   

             $total_question = count($quiz_history);
             $correct_percent = ($correct_answer / $total_question) * 100;

             $data['correct_percent'] = $correct_percent;
             $data['quiz_history'] = $quiz_history;
             $data['correct_answer'] = $correct_answer;
             $data['incorrect_answer'] = $total_question - $correct_answer ;


             $quiz_result = array(
                    'student_id' => $student_id,
                    'courseinfo_id'=> $courseinfo_id,    
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
  
  
}
