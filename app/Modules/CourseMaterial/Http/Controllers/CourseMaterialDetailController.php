<?php

namespace App\Modules\CourseMaterial\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\CourseMaterial\Repositories\CourseMaterialDetailInterface;
use App\Modules\CourseMaterial\Repositories\CourseMaterialPlanInterface;


class CourseMaterialDetailController extends Controller
{
    protected $coursematerial;
    protected $materialplan;
    
    public function __construct(CourseMaterialDetailInterface $coursematerial,CourseMaterialPlanInterface $materialplan)
    {
        $this->coursematerial = $coursematerial;
        $this->materialplan = $materialplan;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $search = $request->all(); 
        $course_material_id = $search['material_id']; 
        $data['coursematerialdetail'] = $this->coursematerial->findAllMaterialDetail($course_material_id,$limit= 10, $search); 
        $data['search_value']=$search;
        $data['material_id']=$course_material_id;
        return view('coursematerial::coursematerialdetail.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Request $request)
    {
        $data['is_edit'] = false;
        $search = $request->all(); 
        $data['material_id'] = $search['material_id']; 
        return view('coursematerial::coursematerialdetail.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
         $data = $request->all(); 

         $couse_material_id = $data['couse_material_id'];

         try{ 

             $materialDetailData = array(
                'couse_material_id' => $data['couse_material_id'],
                'material_topic' => $data['material_topic'], 
                'course_schedule' => $data['course_schedule'],
                'topic_summary' => $data['topic_summary']
            );

            $courseMaterialDetail = $this->coursematerial->saveMaterialDetail($materialDetailData);
            $couse_material_detail_id = $courseMaterialDetail->id;

            $sessionTitle = $data['session_title'];
            $countname = sizeof($sessionTitle);
                for($i = 0; $i < $countname; $i++){
                    
                    if($data['session_title'][$i]){
                         $sessionData['course_material_detail_id'] = $couse_material_detail_id;
                         $sessionData['session_title'] = $data['session_title'][$i];
                         $sessionData['session_content'] = $data['session_content'][$i];

                         $this->coursematerial->saveMaterialSession($sessionData);
                    }
                }   

            alertify()->success('Course Material Detail Created Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        return redirect(route('coursematerialdetail.index',['material_id'=>$couse_material_id]));
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
        $material_detail_id = $input['material_detail_id']; 
        $data['coursematerialdetail'] = $this->coursematerial->findMaterialDetail($material_detail_id);   
        $data['material_id'] = $input['material_id']; 

        return view('coursematerial::coursematerialdetail.edit',$data);
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

        $couse_material_id = $data['couse_material_id'];

         try{ 

             $materialDetailData = array(
                'couse_material_id' => $data['couse_material_id'],
                'material_topic' => $data['material_topic'], 
                'course_schedule' => $data['course_schedule'],
                'topic_summary' => $data['topic_summary']
            );

            $courseMaterialDetail = $this->coursematerial->updateMaterialDetail($id,$materialDetailData);
            $couse_material_detail_id = $id;

            $this->coursematerial->deleteMaterialSession($couse_material_detail_id);

            $sessionTitle = $data['session_title'];
            $countname = sizeof($sessionTitle);
                for($i = 0; $i < $countname; $i++){
                    
                    if($data['session_title'][$i]){
                         $sessionData['course_material_detail_id'] = $couse_material_detail_id;
                         $sessionData['session_title'] = $data['session_title'][$i];
                         $sessionData['session_content'] = $data['session_content'][$i];

                         $this->coursematerial->saveMaterialSession($sessionData);
                    }
                }   

            alertify()->success('Course Material Detail Created Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        return redirect(route('coursematerialdetail.index',['material_id'=>$couse_material_id]));

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
          $material_detail_id = $data['material_detail_id'];

          $materialplan = $this->materialplan->findMaterialPlanByDetail($material_detail_id);
          $material_plan_id = ($materialplan) ? $materialplan->id : '';
 
         try{
            $this->materialplan->deleteMaterialPlanDetail($material_plan_id);
            $this->materialplan->deleteMaterialPlan($material_plan_id);

            $this->coursematerial->deleteMaterialSession($material_detail_id);
            $this->coursematerial->deleteMaterialDetail($material_detail_id);
            alertify()->success('Course Material Deleted Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
         return redirect(route('coursematerialdetail.index',['material_id'=>$material_id]));
    }

    public function appendSession(Request $request){
         
         $data = view('coursematerial::coursematerialdetail.partial.add-more-session')->render();
         return response()->json(['options'=>$data]);
        
    }
    
}
