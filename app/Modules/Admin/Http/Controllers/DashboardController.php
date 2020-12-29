<?php

namespace App\Modules\Admin\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\Student\Repositories\StudentInterface;
use App\Modules\Enrolment\Repositories\EnrolmentInterface;
use App\Modules\Team\Repositories\TeamInterface;
use App\Modules\Agent\Repositories\AgentInterface;
use App\Modules\Syllabus\Repositories\SyllabusInterface;
use App\Modules\Resource\Repositories\ResourcesInterface;
use App\Modules\Course\Repositories\CourseInterface;

use App\Modules\Student\Repositories\StudentReadinessInterface;
use App\Modules\Student\Repositories\StudentPracticeInterface;
use App\Modules\Student\Repositories\StudentMockupInterface;

class DashboardController extends Controller
{
	protected $student;
	protected $enrolment;
	protected $team;
	protected $agent;
	protected $syllabus;
	protected $resource;
	protected $course;

    protected $readiness;
    protected $studentPractice;
    protected $studentMockup;
    
    public function __construct(StudentInterface $student,EnrolmentInterface $enrolment,TeamInterface $team,AgentInterface $agent,SyllabusInterface $syllabus,ResourcesInterface $resource,CourseInterface $course, StudentReadinessInterface $readiness, StudentPracticeInterface $studentPractice, StudentMockupInterface $studentMockup)
    {
        $this->student = $student;
        $this->enrolment = $enrolment;
        $this->team = $team;
        $this->agent = $agent;
        $this->syllabus = $syllabus;
        $this->resource = $resource;
        $this->course = $course;

        $this->readiness = $readiness;
        $this->studentPractice = $studentPractice;
        $this->studentMockup = $studentMockup;
    }

    public function index(Request $request)
    {
    	$data['students'] = $this->student->findAll();
    	$data['enrolments'] = $this->enrolment->findAll($limit = 10);
    	$data['teams'] = $this->team->findAll();  
    	$data['agents'] = $this->agent->findAll();  
        $data['syllabus'] = $this->syllabus->findAll();  
        $data['resources'] = $this->resource->findAll();
        $data['course'] = $this->course->findAll();


        //Graphical Representation on Readiness Test

        $last_from_date = date('Y-m-d', strtotime('first day of last month'));
        $data['last_month'] = date('F', strtotime('first day of last month'));
        $last_to_date = date('Y-m-d', strtotime('last day of last month'));

        $from_date = date('Y-m-d',strtotime('first day of this month'));
        $data['this_month'] = date('F');
        $to_date = date('Y-m-d',strtotime('last day of this month'));

        $data['LastReadinessTestData'] = $this->readiness->CountReadinessTest($last_from_date,$last_to_date);
        $data['CurrentReadinessTestData'] = $this->readiness->CountReadinessTest($from_date,$to_date);

        $data['LastPracticeTestData'] = $this->studentPractice->CountPracticeTest($last_from_date,$last_to_date);
        $data['CurrentPracticeTestData'] = $this->studentPractice->CountPracticeTest($from_date,$to_date);

        $data['LastMockupTestData'] = $this->studentMockup->CountMockupTest($last_from_date,$last_to_date);
        $data['CurrentMockupTestData'] = $this->studentMockup->CountMockupTest($from_date,$to_date);



        return view('admin::dashboard.index',$data);
    }

  

}
