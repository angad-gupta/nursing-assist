<?php

namespace App\Modules\CourseInfo\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\CourseInfo\Repositories\CourseInfoInterface;
use App\Modules\Course\Repositories\CourseInterface;


class CourseInfoController extends Controller
{

    protected $courseinfo;
    protected $course;
    
    public function __construct(CourseInfoInterface $courseinfo, CourseInterface $course)
    {
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
        $data['courseinfo'] = $this->courseinfo->findAll($limit= 50, $search); 
        $data['search_value']=$search;
        return view('courseinfo::courseinfo.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {  
        $data['is_edit'] = false;
        $data['course']=$this->course->getList();
        $data['month']=$this->courseinfo->getMonth();
        return view('courseinfo::courseinfo.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
         $data = $request->all();

         try{ 

             $courseInfoData = array(
                'course_id' => $data['course_id'],
                'course_program_title' => $data['course_program_title'], 
                'course_program_sub_title' => $data['course_program_sub_title'],
                'course_duration_period' => $data['course_duration_period'],
                'is_course_package' => $data['is_course_package'],
                'course_intake_title' => $data['course_intake_title'],
                'short_content' => $data['short_content'],
                'description' => $data['description'],
                'type' => $data['type'],
                'youtube_id' => $data['youtube_id'],
                'enrol_title' => $data['enrol_title'],
                'course_fee' => $data['course_fee'],
                'payment_mode' => $data['payment_mode'],
                'students_per_intake' => $data['students_per_intake'],
                'status' => $data['status']
            );

            if ($request->hasFile('image_path')) {
                 $courseInfoData['image_path'] = $this->courseinfo->upload($data['image_path']);
             }

            $courseInfo = $this->courseinfo->save($courseInfoData);
            $course_info_id = $courseInfo->id;

            $delivery_title = $data['delivery_title'];
            $countname = sizeof($delivery_title);
                for($i = 0; $i < $countname; $i++){
                    
                    if($data['delivery_title'][$i]){
                         $courseDeliverydata['course_info_id'] = $course_info_id;
                         $courseDeliverydata['delivery_title'] = $data['delivery_title'][$i];

                         $this->courseinfo->saveCourseDeliery($courseDeliverydata);
                    }
                }

            $structure_title = $data['structure_title'];
            $countname = sizeof($structure_title);
                for($i = 0; $i < $countname; $i++){
                    
                    if($data['structure_title'][$i]){
                         $structuredata['course_info_id'] = $course_info_id;
                         $structuredata['structure_title'] = $data['structure_title'][$i];

                         $this->courseinfo->saveCourseStructure($structuredata);
                    }
                }   

             $month_id = $data['month_id'];
             $countname = sizeof($month_id);
                for($i = 0; $i < $countname; $i++){
                    
                    if($data['month_id'][$i]){
                         $intakedata['course_info_id'] = $course_info_id;
                         $intakedata['month_id'] = $data['month_id'][$i];
                         $intakedata['intake_date'] = $data['intake_date'][$i];

                         $this->courseinfo->saveCourseIntake($intakedata);
                    }
                }       
           
            alertify()->success('Course Information Created Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('courseinfo.index'));
    }


    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['is_edit'] = true;
        $data['courseinfo'] = $this->courseinfo->find($id);    
        $data['course']=$this->course->getList();
         $data['month']=$this->courseinfo->getMonth();
        return view('courseinfo::courseinfo.edit',$data);
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

             $courseInfoData = array(
                'course_id' => $data['course_id'],
                'course_program_title' => $data['course_program_title'], 
                'course_program_sub_title' => $data['course_program_sub_title'],
                'course_duration_period' => $data['course_duration_period'],
                'is_course_package' => $data['is_course_package'],
                'course_intake_title' => $data['course_intake_title'],
                'short_content' => $data['short_content'],
                'description' => $data['description'],
                'type' => $data['type'],
                'youtube_id' => $data['youtube_id'],
                'enrol_title' => $data['enrol_title'],
                'course_fee' => $data['course_fee'],
                'payment_mode' => $data['payment_mode'],
                'students_per_intake' => $data['students_per_intake'],
                'status' => $data['status']
            );

            if ($request->hasFile('image_path')) {
                 $courseInfoData['image_path'] = $this->courseinfo->upload($data['image_path']);
             }

            $courseInfo = $this->courseinfo->update($id, $courseInfoData);
            $course_info_id = $id;
            
            $this->courseinfo->deleteCourseDelivery($course_info_id);
            $this->courseinfo->deleteCourseStrucuture($course_info_id);
            $this->courseinfo->deleteCourseIntake($course_info_id);

            $delivery_title = $data['delivery_title'];
            $countname = sizeof($delivery_title);
                for($i = 0; $i < $countname; $i++){
                    
                    if($data['delivery_title'][$i]){
                         $courseDeliverydata['course_info_id'] = $course_info_id;
                         $courseDeliverydata['delivery_title'] = $data['delivery_title'][$i];

                         $this->courseinfo->saveCourseDeliery($courseDeliverydata);
                    }
                }

            $structure_title = $data['structure_title'];
            $countname = sizeof($structure_title);
                for($i = 0; $i < $countname; $i++){
                    
                    if($data['structure_title'][$i]){
                         $structuredata['course_info_id'] = $course_info_id;
                         $structuredata['structure_title'] = $data['structure_title'][$i];

                         $this->courseinfo->saveCourseStructure($structuredata);
                    }
                }   

             $month_id = $data['month_id'];
             $countname = sizeof($month_id);
                for($i = 0; $i < $countname; $i++){
                    
                    if($data['month_id'][$i]){
                         $intakedata['course_info_id'] = $course_info_id;
                         $intakedata['month_id'] = $data['month_id'][$i];
                         $intakedata['intake_date'] = $data['intake_date'][$i];

                         $this->courseinfo->saveCourseIntake($intakedata);
                    }
                }     
            
            alertify()->success('Course Information Updated Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('courseinfo.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
       try{
            $this->courseinfo->deleteCourseDelivery($id);
            $this->courseinfo->deleteCourseStrucuture($id);
            $this->courseinfo->deleteCourseIntake($id);
            $this->courseinfo->delete($id);
            alertify()->success('Course Information Deleted Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        return redirect(route('courseinfo.index'));  
    }


    public function appendDelivery(Request $request){
         
         $data = view('courseinfo::courseinfo.partial.add-more-delivery')->render();
         return response()->json(['options'=>$data]);
        
    } 

    public function appendStructure(Request $request){
         
         $data = view('courseinfo::courseinfo.partial.add-more-structure')->render();
         return response()->json(['options'=>$data]);
        
    }

    public function appendCourseIntake(Request $request){
         
         $month=$this->courseinfo->getMonth();
         $data = view('courseinfo::courseinfo.partial.add-more-intake')->with(compact('month'))->render();
         return response()->json(['options'=>$data]);
        
    }

}
