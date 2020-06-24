<?php

namespace App\Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Modules\Home\Http\Requests\StudentLoginFormRequest;
use App\Modules\Student\Repositories\StudentInterface;
use App\Modules\CourseInfo\Repositories\CourseInfoInterface;
use App\Modules\Course\Repositories\CourseInterface;

class StudentController extends Controller
{
    protected $student;
    protected $courseinfo;
    protected $course;
    
    public function __construct(StudentInterface $student,CourseInfoInterface $courseinfo, CourseInterface $course)
    {
        $this->student = $student;
        $this->courseinfo = $courseinfo;
        $this->course = $course;
    }

     public function studentLogin()
    {
        if (Auth::guard('student')->check()) {

            return redirect()->intended(route('home'));
        } else {

            return view('home::student.dashboard');
        }
    } 

    public function studenthub()
    {
        if (Auth::guard('student')->check()) {
            return redirect(route('student-courses'));
        } else {
            $param = 'course';
            return redirect(route('student-account',['source'=>$param]));
        }
    }

    public function Enrolment(Request $request)
    {
        $input = $request->all(); 

        if (Auth::guard('student')->check()) {

            $data['course_info_id'] = $input['course_info_id'];

            $data['courseinfo'] = $this->courseinfo->where('id', $data['course_info_id'])->first();
          
             return view('home::enrolment',$data);
        } else {
            $param = 'enrol';
            $course_info_id = $input['course_info_id'];
            return redirect(route('student-account',['source'=>$param,'course_info_id'=> $course_info_id]));
        }

    }



    public function studentAuthenticate(StudentLoginFormRequest $request)
    {
        $data = $request->all('email', 'password','source','course_info_id');  

       if (Auth::guard('student')->attempt(['email' => $data['email'], 'password' => $data['password'],'active' => 1])) {

            if($data['source'] == 'course'){
                return redirect()->intended(route('student-hub'));
            }else if($data['source'] == 'enrol'){
                return redirect()->intended(route('enrolment',['course_info_id'=>$data['course_info_id']]));
            }else{
                return redirect()->intended(route('student-dashboard'));
            }
        } else {
            Flash('Invalid Access')->warning();
            return redirect(route('student-account'));
        }

    }

    public function updateStudentPassword(Request $request){

        $oldPassword = $request->get('old_password');
        $newPassword = $request->get('password');

        $id = Auth::guard('student')->user()->id;  
        $users = Auth::guard('student')->user()->find($id); 

        if (!(Hash::check($oldPassword, $users->password))) { 
            Flash("Old Password Do Not Match !")->error();  
            return redirect(route('student-dashboard'));
        } else {
            $data['password'] = Hash::make($newPassword);
            $this->student->update($id, $data);
            Flash("Password Successfully Updated. Please Login Again!")->success();

        }
        Auth::guard('student')->logout();
        return redirect(route('student-account'));

    }

     public function studentLogout()
    {
        Auth::guard('student')->logout();

        return redirect(route('home'));
    }

   
}
