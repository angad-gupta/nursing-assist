<?php

namespace App\Modules\CourseMaterial\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\CourseMaterial\Repositories\CourseMaterialPlanInterface;


class CourseMaterialPlanController extends Controller
{
    protected $materialplan;
    
    public function __construct(CourseMaterialPlanInterface $materialplan)
    {
        $this->materialplan = $materialplan;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $search = $request->all(); 
        $material_detail_id = $search['material_detail_id']; 
        $material_id = $search['material_id']; 
        $data['materialplan'] = $this->materialplan->findAllMaterialPlan($material_detail_id,$limit= 10, $search); 
        $data['search_value']=$search;
        $data['material_id']=$material_id;
        $data['material_detail_id']=$material_detail_id;
        return view('coursematerial::materialplan.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Request $request)
    {
        $data['is_edit'] = false;
        $input = $request->all(); 
        $data['material_id'] = $input['material_id']; 
        $data['material_detail_id'] = $input['material_detail_id']; 
        return view('coursematerial::materialplan.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $material_id = $data['material_id'];
        $course_material_detail_id = $data['course_material_detail_id'];

         try{ 

             $materialPlanData = array(
                'course_material_detail_id' => $data['course_material_detail_id'],
                'plan_title' => $data['plan_title'], 
                'plan_description' => $data['plan_description']
            );

            $materialPlanlDetail = $this->materialplan->saveMaterialPlan($materialPlanData);
            $course_material_plan_id = $materialPlanlDetail->id;

            $sessionTitle = $data['subject_title'];
            $countname = sizeof($sessionTitle);
                for($i = 0; $i < $countname; $i++){
                    
                    if($data['subject_title'][$i]){
                         $planDetailData['daily_material_plan_id'] = $course_material_plan_id;
                         $planDetailData['subject_title'] = $data['subject_title'][$i];
                         $planDetailData['topic_type'] = $data['topic_type'][$i];

                         if($data['topic_type'][$i] == 'video'){
                            $planDetailData['video_id'] = $data['video_id'][$i];
                             $planDetailData['pdf_path'] = NULL;
                         }else{
                            $planDetailData['video_id'] = NULL;
                            
                             if ($request->hasFile('pdf_path')) {
                                $planDetailData['pdf_path'] = $this->materialplan->upload($data['pdf_path'][$i]);
                            }
                         }

                         $this->materialplan->saveMaterialPlanDetail($planDetailData);
                    }
                }   

            alertify()->success('Course Material Plan Created Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        return redirect(route('materialplan.index',['material_id'=>$material_id,'material_detail_id'=>$course_material_detail_id]));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('coursematerial::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit(Request $request)
    {
        $data['is_edit'] = true;
        $input = $request->all(); 
        $data['material_id'] = $input['material_id']; 
        $data['material_plan_id'] = $material_plan_id = $input['material_plan_id']; 
        $data['material_detail_id'] = $input['material_detail_id']; 
        $data['materialplan'] = $this->materialplan->findMaterialPlan($material_plan_id);
        return view('coursematerial::materialplan.edit',$data);
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

        $material_id = $data['material_id'];
        $course_material_detail_id = $data['course_material_detail_id'];

         try{ 

             $materialPlanData = array(
                'course_material_detail_id' => $data['course_material_detail_id'],
                'plan_title' => $data['plan_title'], 
                'plan_description' => $data['plan_description']
            );

            $materialPlanlDetail = $this->materialplan->updateMaterialPlan($id, $materialPlanData);
            $daily_material_plan_id = $id;

            $this->materialplan->deleteMaterialPlanDetail($daily_material_plan_id);

            $sessionTitle = $data['subject_title'];
            $countname = sizeof($sessionTitle);
                for($i = 0; $i < $countname; $i++){
                    
                    if($data['subject_title'][$i]){
                         $planDetailData['daily_material_plan_id'] = $daily_material_plan_id;
                         $planDetailData['subject_title'] = $data['subject_title'][$i];
                         $planDetailData['topic_type'] = $data['topic_type'][$i];

                         if($data['topic_type'][$i] == 'video'){
                            $planDetailData['video_id'] = $data['video_id'][$i];
                             $planDetailData['pdf_path'] = NULL;
                         }else{
                            $planDetailData['video_id'] = NULL;
                            
                             if ($request->hasFile('pdf_path')) {
                                $planDetailData['pdf_path'] = $this->materialplan->upload($data['pdf_path'][$i]);
                            }
                         }

                         $this->materialplan->saveMaterialPlanDetail($planDetailData);
                    }
                }   

            alertify()->success('Course Material Plan Created Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        return redirect(route('materialplan.index',['material_id'=>$material_id,'material_detail_id'=>$course_material_detail_id]));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(Request $request)
    {
         $data = $request->all();
         
        $material_id = $data['material_id'];
        $course_material_detail_id = $data['material_detail_id'];
        $daily_material_plan_id = $data['material_plan_id'];
                    
        try{
            $this->materialplan->deleteMaterialPlanDetail($daily_material_plan_id);
            $this->materialplan->deleteMaterialPlan($daily_material_plan_id);
            alertify()->success('Course Information Deleted Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        return redirect(route('materialplan.index',['material_id'=>$material_id,'material_detail_id'=>$course_material_detail_id]));
    }

    public function appendDaily(Request $request){
         
         $data = view('coursematerial::materialplan.partial.add-more-material-plan')->render();
         return response()->json(['options'=>$data]);
        
    }

    
}
