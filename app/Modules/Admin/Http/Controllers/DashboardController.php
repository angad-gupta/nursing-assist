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

class DashboardController extends Controller
{
	protected $student;
	protected $enrolment;
	protected $team;
	protected $agent;
	protected $syllabus;
	protected $resource;
	protected $course;
    
    public function __construct(StudentInterface $student,EnrolmentInterface $enrolment,TeamInterface $team,AgentInterface $agent,SyllabusInterface $syllabus,ResourcesInterface $resource,CourseInterface $course)
    {
        $this->student = $student;
        $this->enrolment = $enrolment;
        $this->team = $team;
        $this->agent = $agent;
        $this->syllabus = $syllabus;
        $this->resource = $resource;
        $this->course = $course;
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

        return view('admin::dashboard.index',$data);
    }

  

}
