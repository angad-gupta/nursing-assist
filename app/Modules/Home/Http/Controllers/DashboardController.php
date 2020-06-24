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

class DashboardController extends Controller
{
      protected $student;
      protected $announcement;
      protected $message;
      protected $courseinfo;
      protected $coursecontent;
      protected $syllabus;
    
    public function __construct(StudentInterface $student, AnnouncementInterface $announcement , MessageInterface $message,  CourseInfoInterface $courseinfo, CourseContentInterface $coursecontent, SyllabusInterface $syllabus)
    {
        $this->student = $student;
        $this->announcement = $announcement;
        $this->message = $message;
        $this->courseinfo = $courseinfo;
        $this->coursecontent = $coursecontent;
        $this->syllabus = $syllabus;
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
  
  
}
