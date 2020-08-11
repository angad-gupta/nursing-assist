<?php

namespace App\Modules\Home\Http\Controllers;

use App\Modules\Agent\Repositories\AgentInterface;
use App\Modules\Banner\Repositories\BannerInterface;
use App\Modules\ContactUs\Repositories\ContactUsInterface;
use App\Modules\CourseInfo\Repositories\CourseInfoInterface;
use App\Modules\Course\Repositories\CourseInterface;
use App\Modules\Enrolment\Repositories\EnrolmentInterface;
use App\Modules\FAQ\Repositories\FAQInterface;
use App\Modules\Home\Emails\SendNetaMail;
use App\Modules\Home\Http\Requests\StudentLoginFormRequest;
use App\Modules\Page\Repositories\PageInterface;
use App\Modules\Quiz\Repositories\QuizInterface;
use App\Modules\Student\Repositories\StudentInterface;
use App\Modules\Team\Repositories\TeamInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

// Mail
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{

    protected $page;
    protected $banner;
    protected $course;
    protected $courseinfo;
    protected $team;
    protected $contactus;
    protected $enrolment;
    protected $student;
    protected $faq;
    protected $agent;
    protected $quiz;

    public function __construct(
        PageInterface $page,
        BannerInterface $banner,
        CourseInterface $course,
        CourseInfoInterface $courseinfo,
        TeamInterface $team,
        ContactUsInterface $contactus,
        EnrolmentInterface $enrolment,
        StudentInterface $student,
        FAQInterface $faq,
        AgentInterface $agent,
        QuizInterface $quiz
    ) {
        $this->page = $page;
        $this->banner = $banner;
        $this->course = $course;
        $this->courseinfo = $courseinfo;
        $this->team = $team;
        $this->contactus = $contactus;
        $this->enrolment = $enrolment;
        $this->student = $student;
        $this->faq = $faq;
        $this->agent = $agent;
        $this->quiz = $quiz;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data['banner'] = $this->banner->findAll();
        $data['we_offer'] = $this->page->getBySlug('we_offer');
        $data['course'] = $this->course->findAll();
        $data['about_neta'] = $this->page->getBySlug('about_us');
        $data['course_info'] = $this->courseinfo->findAll();

        return view('home::index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function AboutUs()
    {
        $data['about_neta'] = $this->page->getBySlug('about_us');
        $data['team'] = $this->team->findAll();
        return view('home::aboutus', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function ContactUs(Request $request)
    {
        $input = $request->all();
        $data['contact_us'] = $this->page->getBySlug('contact_us');
        $data['message'] = ($input) ? $input['message'] : false;
        return view('home::contactus', $data);
    }

    public function faq()
    {
        $data['faq'] = $this->faq->findAll();
        return view('home::faq', $data);
    }

    public function agent()
    {
        $data['agent'] = $this->agent->findAll();
        return view('home::agent', $data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function storeContact(Request $request)
    {
        $data = $request->all();

        try {

            $this->contactus->save($data);

            $contact['message'] = 'Your Message Sent Successfully.';
        } catch (\Throwable $e) {
            $contact['message'] = 'Something Wrong With Message';
        }

        return redirect(route('contact-us', $contact));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function storeEnrolment(Request $request)
    {
        $data = $request->all();

        try {

            $this->enrolment->save($data);

            $contact['message'] = 'You Message Store  Successfully';
        } catch (\Throwable $e) {
            $contact['message'] = 'Something Wrong With Message';
        }

        return redirect(route('enrolment', $contact));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function Course(Request $request)
    {
        $input = $request->all();
        $data['course'] = $this->course->findAll();
        return view('home::course', $data);
    }

    public function courseDetail(Request $request)
    {
        $input = $request->all();

        $course_id = $input['course_id'];

        $data['course_detail'] = $this->course->find($course_id);
        $data['course_info'] = $this->courseinfo->getCourseInfoByCourse($course_id);

        return view('home::course-detail', $data);

    }

    public function courseInfoDetail(Request $request)
    {
        $input = $request->all();

        $courseinfo_id = $input['courseinfo_id'];
        $data['course_info_detail'] = $this->courseinfo->find($courseinfo_id);

        return view('home::course-info-detail', $data);

    }

    public function termCondition(Request $request)
    {
        $input = $request->all();
        $data['terms_and_conditions'] = $this->page->getBySlug('terms_and_conditions');
        return view('home::term-condition', $data);

    }

    public function privacyPolicy(Request $request)
    {
        $input = $request->all();
        $data['privacy_policy'] = $this->page->getBySlug('privacy_policy');
        return view('home::privacy_policy', $data);

    }

    public function userAgreement(Request $request)
    {
        $input = $request->all();
        $data['user_agreement'] = $this->page->getBySlug('user_agreement');
        return view('home::user_agreement', $data);

    }

    public function paymentPlan()
    {
        return view('home::payment-plan');

    }

    public function demoQuiz()
    {
        $data['demo_quiz'] = $this->quiz->getDemoQuiz(5);

        return view('home::demo-quiz', $data);

    }

    public function studentAccount(Request $request)
    {
        $input = $request->all();

        $course_info_id = (array_key_exists('course_info_id', $input)) ? $input['course_info_id'] : '';

        if (Auth::guard('student')->check()) {
            return redirect(route('student-dashboard'));
        }

        $data['message'] = (array_key_exists('message', $input)) ? $input['message'] : false;

        $data['course_info_id'] = $course_info_id;

        if ((array_key_exists('source', $input) and $input['source'] == 'course')) {
            $data['source'] = 'course';
        } else if ((array_key_exists('source', $input) and $input['source'] == 'enrol')) {
            $data['source'] = 'enrol';
        } else if ((array_key_exists('source', $input) and $input['source'] == 'resources')) {
            $data['source'] = 'resources';
        } else {
            $data['source'] = '';
        }

        return view('home::student-login', $data);
    }

    public function studentRegister(StudentLoginFormRequest $request)
    {
        $input = $request->all();
        $email = $input['email'];

        try {

            $studentData = array(
                'username' => $input['username'],
                'full_name' => $input['full_name'],
                'email' => $input['email'],
                'password' => bcrypt($input['password']),
                'user_type' => 'student',
                'active' => 1,
            );

            $this->student->save($studentData);

            /* ---------------------------------------------------------------
            Email Send to Student After Registration
            --------------------------------------------------------------- */

            $subject = 'Register Successfully.';

            $content = view('home::email-register-content')->render();

            //if (filter_var( $email, FILTER_VALIDATE_EMAIL )) {
            //Mail::to($email)->send(new SendNetaMail($content, $subject));
            //}

            /* ---------------------------------------------------------------
            Email Send to Student After Registration
            --------------------------------------------------------------- */

            $registerStudent['message'] = 'You have registered Successfully.';
        } catch (\Throwable $e) {
            $registerStudent['message'] = 'Something Wrong With Message';
        }

        return redirect(route('student-account', $registerStudent));
    }

    public function resources()
    {
        if (Auth::guard('student')->check()) {
            return redirect(route('student-resources'));
        } else {
            $param = 'resources';
            return redirect(route('student-account', ['source' => $param]));
        }
    }

}
