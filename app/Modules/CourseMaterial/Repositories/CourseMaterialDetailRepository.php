<?php

namespace App\Modules\CourseMaterial\Repositories;

use App\Modules\CourseMaterial\Entities\CourseMaterialDetail;
use App\Modules\CourseMaterial\Entities\CourseMaterialSession;


class CourseMaterialDetailRepository implements CourseMaterialDetailInterface
{
   

    public function findAllMaterialDetail($course_material_id, $limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]){

        $result =CourseMaterialDetail::when(array_keys($filter, true), function ($query) use ($filter) {         
            

        })
            ->where('couse_material_id','=',$course_material_id)->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result; 

    }

    public function findMaterialDetail($id){
            return CourseMaterialDetail::find($id);
    }

    public function getDetailList(){
        $result = CourseMaterialDetail::pluck('title', 'id');
        return $result;
    }

    public function saveMaterialDetail($data){

        return CourseMaterialDetail::create($data);
    }

    public function saveMaterialSession($sessiondata){  
        return CourseMaterialSession::create($sessiondata); 
    }
    
    public function updateMaterialDetail($id,$data){
         $result = CourseMaterialDetail::find($id);  
        return $result->update($data);
    }

    public function deleteMaterialDetail($id){
        CourseMaterialDetail::destroy($id);
    }

    public function deleteMaterialSession($id){
        CourseMaterialSession::where('course_material_detail_id','=',$id)->delete($id);
    }

    public function findByMaterial($detailid){
        return CourseMaterialDetail::where('couse_material_id','=',$detailid)->first();
    }

}