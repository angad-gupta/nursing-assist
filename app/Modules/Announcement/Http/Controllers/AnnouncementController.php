<?php

namespace App\Modules\Announcement\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\Modules\CourseInfo\Repositories\CourseInfoInterface;
use App\Modules\Enrolment\Repositories\EnrolmentInterface;
use App\Modules\Student\Repositories\StudentInterface;
use App\Modules\Home\Emails\SendNetaMail;
use App\Modules\Announcement\Repositories\AnnouncementInterface;

use Illuminate\Support\Facades\Mail;

class AnnouncementController extends Controller
{
     protected $announcement;
     protected $courseinfo;
     protected $enrolment;
     protected $student;
    
    public function __construct(AnnouncementInterface $announcement,CourseInfoInterface $courseinfo,EnrolmentInterface $enrolment,StudentInterface $student)
    {
        $this->announcement = $announcement;
        $this->courseinfo = $courseinfo;
        $this->enrolment = $enrolment;
        $this->student = $student;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    { 
        $search = $request->all();
        $data['announcement'] = $this->announcement->findAll($limit= 50,$search);  
        return view('announcement::announcement.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data['is_edit'] = false;
        $data['month'] = $this->courseinfo->getIntakeMonth();
        return view('announcement::announcement.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $intake_date = $data['intake_date'];
        
         try{

            $this->announcement->save($data);


            $enrollement_info = $this->enrolment->getAllEnrolmentByIntake($intake_date);

            foreach ($enrollement_info as $key => $value) {
                
                   $student_info = $this->student->find($value->student_id);

                   $email = $student_info->email;
                   $subject = 'Announcement Notification';

                /* ---------------------------------------------------------------
                    Email Send to Announcement Nofitication
                --------------------------------------------------------------- */
                   $content = view('announcement::announcement.partial.email-content')->render();

                  Mail::to($email)->send(new SendNetaMail($content, $subject));
                /* ---------------------------------------------------------------
                    Email Send to  Announcement Nofitication
                --------------------------------------------------------------- */

            }

            alertify()->success('Announcement Created Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('announcement.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('announcement::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['is_edit'] = true;
        $data['announcement'] = $this->announcement->find($id);
        return view('announcement::announcement.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
       $data = $request->all();
        
        try{

            $this->announcement->update($id,$data);
             alertify()->success('Announcement Updated Successfully');
        }catch(\Throwable $e){
           alertify($e->getMessage())->error();
        }
        
        return redirect(route('announcement.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        try{
            $this->announcement->delete($id);
             alertify()->success('Announcement Deleted Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
      return redirect(route('announcement.index'));
    }

}
