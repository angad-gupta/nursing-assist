<?php

namespace App\Modules\Registration\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\Student\Repositories\StudentInterface;
use App\Modules\Agent\Repositories\AgentInterface;
use App\Modules\CourseInfo\Repositories\CourseInfoInterface;
use App\Modules\Enrolment\Repositories\EnrolmentInterface;

class RegistrationController extends Controller
{
    protected $student;
    protected $studentPayment;
    protected $agent;
    protected $courseinfo;
    protected $enrolment;

    public function __construct(StudentInterface $student,AgentInterface $agent,CourseInfoInterface $courseinfo, EnrolmentInterface $enrolment) {

        $this->student = $student;
        $this->agent = $agent;
        $this->courseinfo = $courseinfo;
        $this->enrolment = $enrolment;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $search = $request->all();
        $sort_by = ['by' => 'id', 'sort' => 'DESC'];
        if (isset($search['sort_by']) && !empty($search['sort_by'])) {
            $sort_by = ['by' => 'full_name', 'sort' => $search['sort_by']];
        }
        $data['student'] = $this->student->findAll($limit = null, $search, $sort_by); 

        $data['agents'] = $this->agent->getList();
        $data['courses'] = $this->courseinfo->getList();
        $data['months'] = $this->courseinfo->getMonth(); 


        return view('registration::registration.index',$data);
    }

     public function destroy($id)
    {
        try {
            $this->student->delete($id);
            alertify()->success('Registered Student Deleted Successfully');
        } catch (\Throwable $e) {
            alertify($e->getMessage())->error();
        }
       return redirect()->back();
        
    }

    public function storeEnrollment(Request $request){

        $data = $request->all();
        
        if ($data['eligible_rd'] == 'is_eligible_mcq_osce') {
            $data['is_eligible_mcq_osce'] = 1;
            $data['is_eligible_att'] = 0;
            $data['is_eligible_letter_ahpra'] = 0;
        } elseif ($data['eligible_rd'] == 'is_eligible_att') {
            $data['is_eligible_mcq_osce'] = 0;
            $data['is_eligible_att'] = 1;
            $data['is_eligible_letter_ahpra'] = 0;
        } elseif ($data['eligible_rd'] == 'is_eligible_letter_ahpra') {
            $data['is_eligible_mcq_osce'] = 0;
            $data['is_eligible_att'] = 0;
            $data['is_eligible_letter_ahpra'] = 1;
        }else{
            $data['is_eligible_mcq_osce'] = 0;
            $data['is_eligible_att'] = 0;
            $data['is_eligible_letter_ahpra'] = 0;    
        }

        $data['is_id'] = 1;

        $intake_date = $data['intake_date'];

        $intake_month = $this->enrolment->getMonthById($intake_date);

        try {
            $student_id = $data['reg_student_id'];

            $enrolmentData = array(
                'student_id' => $student_id,
                'courseinfo_id' => $data['course_info_id'],
                'is_eligible_mcq_osce' => $data['is_eligible_mcq_osce'],
                'is_eligible_att' => $data['is_eligible_att'],
                'is_eligible_letter_ahpra' => $data['is_eligible_letter_ahpra'],
                'is_id' => $data['is_id'],
                'title' => $data['title'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'street1' => $data['street1'],
                'street2' => $data['suburb'],
                'city' => $data['city'],
                'state' => $data['state'],
                'postalcode' => $data['postalcode'],
                'agents' => $data['agents'],
                'country' => $data['country'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'intake_date' => $intake_month->name,
                'payment_status' => 0,
                'payment_type' => 0,
                'status' => 'Pending'
            );

            if ($request->hasFile('eligible_document')) {
                $enrolmentData['eligible_document'] = $this->enrolment->upload($data['eligible_document']);
            }

            if ($request->hasFile('identity_document')) {
                $enrolmentData['identity_document'] = $this->enrolment->upload($data['identity_document']);
            }

            $enrolment = $this->enrolment->save($enrolmentData);

            $full_name = $data['first_name'] .' '.$data['last_name'];
           
            $studentData = array(
                    'email' => $data['email'],
                    'full_name' => $full_name,
                    'phone_no' => $data['phone'],
                    'street_name' => $data['street1'],
                    'suburb' => $data['suburb'],
                    'postalcode' => $data['postalcode'],
                    'state' => $data['state']
            );
            $this->student->update($student_id, $studentData);
            
             alertify()->success('Registered Student Moved To Enrolment Successfully');

        } catch (\Throwable $e) {
            alertify($e->getMessage())->error();
            
        }

        return redirect()->back();

    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('registration::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('registration::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

}
