<?php

namespace App\Modules\CourseIntake\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\CourseIntake\Repositories\CourseIntakeInterface;
use App\Modules\CourseInfo\Repositories\CourseInfoInterface;
use App\Modules\Course\Repositories\CourseInterface;

class CourseIntakeController extends Controller
{

    protected $courseintake;
    protected $courseinfo;
    protected $course;
    
    public function __construct(CourseIntakeInterface $courseintake, CourseInfoInterface $courseinfo,CourseInterface $course)
    {
        $this->courseintake = $courseintake;
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
        $data['courseintake'] = $this->courseintake->findAll($limit= 10, $search); 
        $data['search_value']=$search;
        return view('courseintake::courseintake.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {  
        $data['is_edit'] = false;
        $data['course_info']=$this->courseinfo->getList();

        $year = date('Y');
        
        $year_data = array();
        
        for($i = 1; $i <= 5; $i++){

            $new_year = $year + $i; 

            $year_data += array(
                $new_year => $new_year
            );

        }

        $data['year'] = $year_data;

        return view('courseintake::courseintake.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
         $data = $request->all();

         $course_info_id = $data['course_info_id'];

         $courseInfoData = $this->courseinfo->find($course_info_id);
         $course_id =$courseInfoData->course_id;
         $courseData = $this->course->find($course_id);
         $course_id = $courseData->id;
         
         try{ 

             $courseIntakeData = array(
                'course_id' => $course_id,
                'course_info_id' => $data['course_info_id'],
                'year' => $data['year']
            );

            $courseIntake = $this->courseintake->save($courseIntakeData);
            $course_intake_id = $courseIntake->id;

            $month = $data['month'];
            $countname = sizeof($month);
                for($i = 0; $i < $countname; $i++){
                    
                    if($data['month'][$i]){
                         $setupdata['course_intake_id'] = $course_intake_id;
                         $setupdata['month'] = $data['month'][$i];
                         $setupdata['course_intake'] = $data['course_intake'][$i];

                         $this->courseintake->saveCourseIntakeSetup($setupdata);
                    }
                }
           
            alertify()->success('Course Intake Setup Created Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('courseintake.index'));
    }


    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['is_edit'] = true;
        $data['courseintake'] = $this->courseintake->find($id);    
        $data['course_info']=$this->courseinfo->getList();

        $year = date('Y');
        
        $year_data = array();
        
        for($i = 1; $i <= 5; $i++){

            $new_year = $year + $i; 

            $year_data += array(
                $new_year => $new_year
            );

        }

        $data['year'] = $year_data;
        return view('courseintake::courseintake.edit',$data);
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

         $course_info_id = $data['course_info_id'];

         $courseInfoData = $this->courseinfo->find($course_info_id);
         $course_id =$courseInfoData->course_id;
         $courseData = $this->course->find($course_id);
         $course_id = $courseData->id;
         
         try{ 

             $courseIntakeData = array(
                'course_id' => $course_id,
                'course_info_id' => $data['course_info_id'],
                'year' => $data['year']
            );

            $courseIntake = $this->courseintake->update($id,$courseIntakeData);
            $course_intake_id = $id;

             $this->courseintake->deleteCourseIntakeSetup($course_intake_id);

            $month = $data['month'];
            $countname = sizeof($month);
                for($i = 0; $i < $countname; $i++){
                    
                    if($data['month'][$i]){
                         $setupdata['course_intake_id'] = $course_intake_id;
                         $setupdata['month'] = $data['month'][$i];
                         $setupdata['course_intake'] = $data['course_intake'][$i];

                         $this->courseintake->saveCourseIntakeSetup($setupdata);
                    }
                }

            alertify()->success('Course Intake Setup Updated Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('courseintake.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
       try{
            $this->courseintake->deleteCourseIntakeSetup($id);
            $this->courseintake->delete($id);
            alertify()->success('Course Intake Setup Deleted Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        return redirect(route('courseintake.index'));  
    }


    public function appendSetup(Request $request){
         
         $data = view('courseintake::courseintake.partial.add-more-setup')->render();
         return response()->json(['options'=>$data]);
        
        }

}
