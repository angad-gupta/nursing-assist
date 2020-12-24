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
use App\Modules\Blog\Repositories\BlogInterface;
use App\Modules\Gallery\Repositories\GalleryInterface;
use App\Modules\Video\Repositories\VideoInterface;
use App\Modules\EmailLog\Repositories\EmaillogInterface;
use App\Modules\Forum\Repositories\ForumInterface;


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
    protected $forum;
    protected $contactus;
    protected $enrolment;
    protected $student;
    protected $faq;
    protected $agent;
    protected $quiz;
    protected $blog;
    protected $gallery;
    protected $video;
    protected $emailLog;

    public function __construct(
        PageInterface $page,
        BannerInterface $banner,
        CourseInterface $course,
        CourseInfoInterface $courseinfo,
        TeamInterface $team,
        ForumInterface $forum,
        ContactUsInterface $contactus,
        EnrolmentInterface $enrolment,
        StudentInterface $student,
        FAQInterface $faq,
        AgentInterface $agent,
        QuizInterface $quiz,
        BlogInterface $blog,
        GalleryInterface $gallery,
        VideoInterface $video,
        EmaillogInterface $emailLog
    ) {
        $this->page = $page;
        $this->banner = $banner;
        $this->course = $course;
        $this->courseinfo = $courseinfo;
        $this->team = $team;
        $this->forum = $forum;
        $this->contactus = $contactus;
        $this->enrolment = $enrolment;
        $this->student = $student;
        $this->faq = $faq;
        $this->agent = $agent;
        $this->quiz = $quiz;
        $this->blog = $blog;
        $this->gallery = $gallery;
        $this->video = $video;
        $this->emailLog = $emailLog;
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
    public function Team()
    {
        $data['team'] = $this->team->findAll();
        return view('home::teams', $data);
    }

    public function studentForum(Request $request){

        if (Auth::guard('student')->check()) {
            
            $search = $request->all();  
            $data['forum_detail']= $this->forum->findAll($limit= 15,$search);  
            return view('home::forums', $data);

        } else {
            return redirect(route('student-account'));
        }
       
    }

    public function storeForum(Request $request){
        $data = $request->all(); 
        
         try{
            $userInfo = Auth::guard('student')->user();   

            $data['posted_by'] = $userInfo['id'];
            $data['posted_date'] = date('Y-m-d');

            $this->forum->save($data);
            alertify()->success('Forum Topic Created Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('student-forum'));
    }

    public function ForumDetail(Request $request){

        $input = $request->all();

        $forum_id = $input['forum_id'];

        $data['forum_detail'] = $this->forum->find($forum_id);
        $data['forum_comments'] = $this->forum->getCommentById($forum_id,$limit= 15);  
        $data['forum_id'] = $forum_id;

        return view('home::forum-detail', $data);

    }

    public function storeForumComment(Request $request){

        $input = $request->all();
        $comment = $input['comment'];
        $forum_id = $input['forum_id'];

        $userInfo = Auth::guard('student')->user();   

        $data = array(
            'forum_id' => $forum_id,
            'comment' => $comment,
            'commented_by' => $userInfo['id'],
            'commented_date' => date('Y-m-d')
        );
        $this->forum->saveComment($data);

        echo 1;
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function Blog()
    {
        $data['blog_info'] = $this->blog->findAllActiveBlog($limit= 12); 
        return view('home::blog', $data);
    }

    public function BlogDetail(Request $request){
        $input = $request->all();

        $blog_id = $input['blog_id'];

        $data['blog_detail'] = $this->blog->find($blog_id);

        return view('home::blog-detail', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function Gallery()
    {
        $data['album_info'] = $this->gallery->findAllActiveGallery($limit= 12); 
        return view('home::gallery', $data);
    }

    public function AlbumDetail(Request $request){
        $input = $request->all();

        $album_id = $input['album_id'];

        $data['album_detail'] = $this->gallery->find($album_id);
        $data['album_photos'] = $this->gallery->getGalleryImage($album_id);

        return view('home::gallery-detail', $data);
    }

    public function Video()
    {
        $data['video_info'] = $this->video->findAllActiveVideo($limit= 12); 
        return view('home::video', $data);
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
        $data['payment_plan'] = $this->page->getBySlug('fee_and_payment_plan');
        return view('home::payment-plan', $data);

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

            $studentInfo = $this->student->save($studentData);
            $student_id = $studentInfo['id'];
            /* ---------------------------------------------------------------
            Email Send to Student After Registration
            --------------------------------------------------------------- */

            $subject = 'Register Successfully.';

            $content = view('home::email-register-content')->render();

            //if (filter_var( $email, FILTER_VALIDATE_EMAIL )) {
            Mail::to($email)->send(new SendNetaMail($content, $subject));
            //}

             /*     Email Log Maintaining    */
            $emaillog['action'] = 'New Student Registration';
            $emaillog['student_id'] = $student_id;
            $emaillog['date'] = date('Y-m-d');
            $this->emailLog->saveEmaillog($emaillog);
            /*  End of Email Log Maintaining  */

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

    public function studentRegisterForm(Request $request)
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

        return view('home::student-register', $data);
    }

}
