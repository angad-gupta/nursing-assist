<?php

namespace App\Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\Page\Repositories\PageInterface;
use App\Modules\Banner\Repositories\BannerInterface;
use App\Modules\Course\Repositories\CourseInterface;
use App\Modules\CourseInfo\Repositories\CourseInfoInterface;
use App\Modules\Team\Repositories\TeamInterface;
use App\Modules\ContactUs\Repositories\ContactUsInterface;
use App\Modules\Enrolment\Repositories\EnrolmentInterface;

class HomeController extends Controller
{

    protected $page;
    protected $banner;
    protected $course;
    protected $courseinfo;
    protected $team;
    protected $contactus;
    protected $enrolment;
    
    public function __construct(
            PageInterface $page,
            BannerInterface $banner,
            CourseInterface $course,
            CourseInfoInterface $courseinfo,
            TeamInterface $team,
            ContactUsInterface $contactus,
            EnrolmentInterface $enrolment
        )

    {
        $this->page = $page;
        $this->banner = $banner;
        $this->course = $course;
        $this->courseinfo = $courseinfo;
        $this->team = $team;
        $this->contactus = $contactus;
        $this->enrolment = $enrolment;
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
     * Show the form for creating a new resource.
     * @return Response
     */
    public function Enrolment(Request $request)
    {
        $input = $request->all(); 
        $data['message'] = ($input) ? $input['message'] : FALSE;
        return view('home::enrolment',$data);
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
        $data['privacy_policy'] =$this->page->getBySlug('privacy_policy');
        $data['terms_of_use'] =$this->page->getBySlug('terms_of_use');
        $data['refund_policy'] =$this->page->getBySlug('refund_policy');
        $data['user_agreement'] =$this->page->getBySlug('user_agreement');

        return view('home::term-condition',$data);
      
    }

    
}
