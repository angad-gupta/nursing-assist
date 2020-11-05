<?php

namespace App\Modules\Home\Http\Controllers;

use App\Modules\Agent\Repositories\AgentInterface;
use App\Modules\CourseInfo\Repositories\CourseInfoInterface;
use App\Modules\Course\Repositories\CourseInterface;
use App\Modules\Student\Repositories\StudentInterface;
use App\Modules\Enrolment\Repositories\EnrolmentInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    protected $student;
    protected $courseinfo;
    protected $course;
    protected $agent;
    /**
     * @var EnrolmentInterface
     */
    protected $enrolment;

    public function __construct(StudentInterface $student, CourseInfoInterface $courseinfo, CourseInterface $course, AgentInterface $agent, EnrolmentInterface $enrolment)
    {
        $this->student = $student;
        $this->courseinfo = $courseinfo;
        $this->course = $course;
        $this->agent = $agent;
        $this->enrolment = $enrolment;
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
            return redirect(route('student-account', ['source' => $param]));
        }
    }

    public function Enrolment(Request $request)
    {
        $input = $request->all();  

        if (Auth::guard('student')->check()) {

            $data['users'] = $userInfo = Auth::guard('student')->user();  
            $studentName = explode(" ",$userInfo['full_name']);
            $data['first_name'] = ($studentName[0]) ? $studentName[0] : '';
            $data['last_name'] = (array_key_exists(1, $studentName)) ? $studentName[1] : '';

            $data['agents'] = $this->agent->getList();

            $data['course_info_id'] = $input['course_info_id'];

            $data['courseinfo'] = $this->courseinfo->where('id', $data['course_info_id'])->first();
            
            $data['course_intakes'] = $this->courseinfo->getCourseIntakeList($data['course_info_id']);

            return view('home::enrolment', $data);
        } else {
            $param = 'enrol';
            $course_info_id = $input['course_info_id'];
            return redirect(route('student-account', ['source' => $param, 'course_info_id' => $course_info_id]));
        }

    }

    public function studentAuthenticate(Request $request)
    {
        $data = $request->all('email', 'password', 'source', 'course_info_id');

        if (Auth::guard('student')->attempt(['email' => $data['email'], 'password' => $data['password'], 'active' => 1])) {

            if ($data['source'] == 'course') {
                return redirect()->intended(route('student-hub'));
            } else if ($data['source'] == 'enrol') {
                return redirect()->intended(route('enrolment', ['course_info_id' => $data['course_info_id']]));
            } else if ($data['source'] == 'resources') {
                return redirect()->intended(route('student-resources'));
            } else {
                return redirect()->intended(route('student-dashboard'));
            }
        } else {
            Flash('Invalid Credentials')->warning();
            return redirect(route('student-account'));
        }

    }

    public function updateStudentPassword(Request $request)
    {

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
            $data['message'] = "Password Successfully Updated. Please Login Again!";
        }
        Auth::guard('student')->logout();
        return redirect(route('student-account',$data));

    }

    public function studentLogout()
    {
        Auth::guard('student')->logout();

        return redirect(route('home'));
    }

    public function checkIntakeAvailability(Request $request)
    {
        $input = $request->all();
        return $this->enrolment->checkCourseIntakeAvailability($input['courseinfo_id'], $input['intake_month'], $input['students_per_intake']);
    }

}
