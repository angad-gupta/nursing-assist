<?php

namespace App\Modules\Enrolment\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Auth;
use App\Modules\Enrolment\Repositories\EnrolmentInterface;
use App\Modules\CourseInfo\Repositories\CourseInfoInterface;
use App\Modules\Course\Repositories\CourseInterface;


class EnrolmentController extends Controller
{
   
    protected $enrolment;
    protected $courseinfo;
    protected $course;
    
    public function __construct(EnrolmentInterface $enrolment, CourseInfoInterface $courseinfo, CourseInterface $course)
    {
        $this->enrolment = $enrolment;
         $this->courseinfo = $courseinfo;
        $this->course = $course;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $search = $request->all();  
        $data['enrolment'] = $this->enrolment->findAll($limit= 10, $search); 
        return view('enrolment::enrolment.index',$data);
    }

    public function viewUser(Request $request){
        $data = $request->all();
        $id = $data['id'];
        $enrolment = $this->enrolment->find($id);    
        $data = view('enrolment::enrolment.view-detail',compact('enrolment'))->render();
        return response()->json(['options'=>$data]);
    }
    public function store(Request $request)
    {
         $data = $request->all();
         
     
         if($data['eligible_rd'] == 'is_eligible_mcq_osce')
         {
            $data['is_eligible_mcq_osce'] = 1;
            $data['is_eligible_att'] = 0;
            $data['is_eligible_letter_ahpra'] = 0;
         }
         elseif($data['eligible_rd'] == 'is_eligible_att')
         {
            $data['is_eligible_mcq_osce'] = 0;
            $data['is_eligible_att'] = 1;
            $data['is_eligible_letter_ahpra'] = 0;
         }
         elseif($data['eligible_rd'] == 'is_eligible_letter_ahpra')
         {
            $data['is_eligible_mcq_osce'] = 0;
            $data['is_eligible_att'] = 0;
            $data['is_eligible_letter_ahpra'] = 1;
         }
       
         if(isset($request->rd))
         {
            $data['is_id'] = 1;
         }
         else
         {
          $data['is_id'] = 0;  
         }
         
         $data['student_id'] = auth()->guard('student')->user()->id;
       


         try{ 

             $enrolmentData = array(
                'student_id'=>$data['student_id'],
                'courseinfo_id'=>$data['courseinfo_id'],
                'is_eligible_mcq_osce'=>$data['is_eligible_mcq_osce'],
                'is_eligible_att'=>$data['is_eligible_att'],
                'is_eligible_letter_ahpra'=>$data['is_eligible_letter_ahpra'],
                'is_id' => $data['is_id'], 
                'company_name' => $data['company_name'],
                'email' => $data['email_address'],
                'contact_number' => $data['contact_number'],
                'country' => $data['country'],
                'message' => $data['message']
                // 'card_holder_name' => $data['type'],
                // 'card_number' => $data['youtube_id'],
                // 'ccv' => $data['enrol_title'],
                // 'card_email' => $data['course_fee'],
                // 'card_expiry_data' => $data['payment_mode']

            );
             
            if ($request->hasFile('eligible_document')) {

                 $enrolmentData['eligible_document'] = $this->enrolment->upload($data['eligible_document']);
             }

            if ($request->hasFile('identity_document')) {
                 $enrolmentData['identity_document'] = $this->enrolment->upload($data['identity_document']);
             }
          
             $enrolment = $this->enrolment->save($enrolmentData);

             $courseinfo_id = $this->courseinfo->where('id', $data['courseinfo_id'])->first();
             dd($courseinfo_id);

           
           alertify()->success('Course Information Created Successfully');
          return redirect(route('enrolment.viewUser'));
        }
          catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('enrolment.viewUser'));
    }

}
