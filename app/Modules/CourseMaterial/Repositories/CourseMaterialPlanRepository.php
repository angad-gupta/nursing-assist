<?php

namespace App\Modules\CourseMaterial\Repositories;

use App\Modules\CourseMaterial\Entities\DailyMaterialPlan;
use App\Modules\CourseMaterial\Entities\DailyMaterialPlanDetail;


class CourseMaterialPlanRepository implements CourseMaterialPlanInterface
{
   
    public function findAllMaterialPlan($material_detail_id, $limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]){

        $result =DailyMaterialPlan::when(array_keys($filter, true), function ($query) use ($filter) {         
            

        })
            ->where('course_material_detail_id','=',$material_detail_id)->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result; 

    }

    public function findMaterialPlan($id){
            return DailyMaterialPlan::find($id);
    }

    public function getPlanList(){
        $result = DailyMaterialPlan::pluck('title', 'id');
        return $result;
    }

    public function saveMaterialPlan($data){

        return DailyMaterialPlan::create($data);
    }

    public function saveMaterialPlanDetail($data){

        return DailyMaterialPlanDetail::create($data);
    }
    
    public function updateMaterialPlan($id,$data){
         $result = DailyMaterialPlan::find($id);
        return $result->update($data);
    }

    public function deleteMaterialPlan($id){
        return DailyMaterialPlan::destroy($id);
    }

    public function deleteMaterialPlanDetail($id){
        DailyMaterialPlanDetail::where('daily_material_plan_id','=',$id)->delete($id);
    }

       public function upload($file){
        
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . DailyMaterialPlanDetail::FILE_PATH, $fileName);

        return $fileName;
   }

    public function findMaterialPlanByDetail($detailid){
        return DailyMaterialPlan::where('course_material_detail_id','=',$detailid)->first();
    }

}