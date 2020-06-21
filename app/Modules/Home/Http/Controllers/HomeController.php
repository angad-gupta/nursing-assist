<?php

namespace App\Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

use App\Modules\Page\Repositories\PageInterface;
use App\Modules\Banner\Repositories\BannerInterface;
use App\Modules\Course\Repositories\CourseInterface;
use App\Modules\CourseInfo\Repositories\CourseInfoInterface;
use App\Modules\Team\Repositories\TeamInterface;
use App\Modules\ContactUs\Repositories\ContactUsInterface;
use App\Modules\Enrolment\Repositories\EnrolmentInterface;
use App\Modules\Student\Repositories\StudentInterface;
use App\Modules\FAQ\Repositories\FAQInterface;
use App\Modules\Agent\Repositories\AgentInterface;

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
            AgentInterface $agent
        )

    {
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
        $data['about_neta'] =$this->page->getBySlug('about_us'); 
        $data['course_info'] = $this->courseinfo->findAll();        

        return view('home::index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function AboutUs()
    {
        $data['about_neta'] =$this->page->getBySlug('about_us');
        $data['team'] =$this->team->findAll();
        return view('home::aboutus',$data);
    }


    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function ContactUs(Request $request)
    {
        $input = $request->all(); 
        $data['contact_us'] =$this->page->getBySlug('contact_us');
        $data['message'] = ($input) ? $input['message'] : FALSE;
        return view('home::contactus',$data);
    }

    public function faq()
    {
        $data['faq'] = $this->faq->findAll();
        return view('home::faq',$data);
    }

    public function agent()
    {
        $data['agent'] = $this->agent->findAll();
        return view('home::agent',$data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function storeContact(Request $request)
    {
        $data = $request->all();
        
         try{

            $this->contactus->save($data);

            $contact['message'] = 'You Message Store  Successfully';
        }catch(\Throwable $e){
            $contact['message'] = 'Something Wrong With Message';
        }
        
        return redirect(route('contact-us',$contact));
    }

   

     /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function storeEnrolment(Request $request)
    {
        $data = $request->all();
        
         try{

            $this->enrolment->save($data);

            $contact['message'] = 'You Message Store  Successfully';
        }catch(\Throwable $e){
            $contact['message'] = 'Something Wrong With Message';
        }
        
        return redirect(route('enrolment',$contact));
    }


      /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function Course(Request $request)
    {
        $input = $request->all(); 
        $data['course'] = $this->course->findAll();
        return view('home::course',$data);
    }

    public function courseDetail(Request $request){
        $input = $request->all();

        $course_id = $input['course_id'];

        $data['course_detail'] = $this->course->find($course_id);
        $data['course_info'] = $this->courseinfo->getCourseInfoByCourse($course_id); 

        return view('home::course-detail',$data);
      
    }

    public function courseInfoDetail(Request $request){
        $input = $request->all();

        $courseinfo_id = $input['courseinfo_id'];
        $data['course_info_detail'] = $this->courseinfo->find($courseinfo_id);

        return view('home::course-info-detail',$data);
      
    }

    public function termCondition(Request $request){
        $input = $request->all();
        $data['terms_and_conditions'] =$this->page->getBySlug('terms_and_conditions');
        return view('home::term-condition',$data);
      
    }

    public function privacyPolicy(Request $request){
        $input = $request->all();
        $data['privacy_policy'] =$this->page->getBySlug('privacy_policy');
        return view('home::privacy_policy',$data);
      
    }

    public function userAgreement(Request $request){
        $input = $request->all();
        $data['user_agreement'] =$this->page->getBySlug('user_agreement');
        return view('home::user_agreement',$data);
      
    }

    public function paymentPlan(){
        return view('home::payment-plan');
      
    }

    public function studentAccount(Request $request){
         $input = $request->all(); 

        if (Auth::guard('student')->check()) {
             return redirect()->intended(route('student-dashboard'));
        }

         $data['message'] = ($input) ? $input['message'] : FALSE;

         return view('home::student-login',$data);
    }

    public function studentRegister(Request $request){
        $input = $request->all();

         try{

            $studentData = array(
                'username' => $input['username'],
                'email' => $input['email'],
                'password' => bcrypt($input['password']),
                'user_type' => 'student',
                'active' => 1
            );

            $this->student->save($studentData);

            $registerStudent['message'] = 'You have register Successfully.';
        }catch(\Throwable $e){
            $registerStudent['message'] = 'Something Wrong With Message';
        }

        return redirect(route('student-account',$registerStudent));
    }

    
}
