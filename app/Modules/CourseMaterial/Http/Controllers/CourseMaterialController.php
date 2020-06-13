<?php

namespace App\Modules\CourseMaterial\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\CourseMaterial\Repositories\CourseMaterialInterface;
use App\Modules\CourseInfo\Repositories\CourseInfoInterface;

use App\Modules\CourseMaterial\Repositories\CourseMaterialDetailInterface;
use App\Modules\CourseMaterial\Repositories\CourseMaterialPlanInterface;

class CourseMaterialController extends Controller
{
    protected $coursematerial;
    protected $courseinfo;
    
    protected $coursematerialdetail;
    protected $materialplan;

    public function __construct(CourseMaterialInterface $coursematerial, CourseInfoInterface $courseinfo,CourseMaterialDetailInterface $coursematerialdetail,CourseMaterialPlanInterface $materialplan)
    {
        $this->coursematerial = $coursematerial;
        $this->courseinfo = $courseinfo;
        $this->coursematerialdetail = $coursematerialdetail;
        $this->materialplan = $materialplan;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $search = $request->all();
        $data['coursematerial'] = $this->coursematerial->findAll($limit= 10, $search); 
        $data['search_value']=$search;
        return view('coursematerial::coursematerial.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {  
        $data['is_edit'] = false;
        $data['course_info']=$this->courseinfo->getList();
        return view('coursematerial::coursematerial.create',$data);
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

          $this->coursematerial->save($data);
           
           
            alertify()->success('Course Material Created Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('coursematerial.index'));
    }


    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data['is_edit'] = true;
        $data['coursematerial'] = $this->coursematerial->find($id);    
        $data['course_info']=$this->courseinfo->getList();
        return view('coursematerial::coursematerial.edit',$data);
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

            $this->coursematerial->update($id, $data);
            
            alertify()->success('Course Material Updated Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        
        return redirect(route('coursematerial.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $materialDetail = $this->coursematerialdetail->findByMaterial($id);
        $material_detail_id = ($materialDetail) ? $materialDetail->id : ''; 

        $materialplan = $this->materialplan->findMaterialPlanByDetail($material_detail_id);
        $material_plan_id = ($materialplan) ? $materialplan->id : '';

       try{
           $this->materialplan->deleteMaterialPlanDetail($material_plan_id);
            $this->materialplan->deleteMaterialPlan($material_plan_id);

            $this->coursematerialdetail->deleteMaterialSession($material_detail_id);
            $this->coursematerialdetail->deleteMaterialDetail($material_detail_id);


            $this->coursematerial->delete($id);
            alertify()->success('Course Material Deleted Successfully');
        }catch(\Throwable $e){
            alertify($e->getMessage())->error();
        }
        return redirect(route('coursematerial.index'));  
    }

}
