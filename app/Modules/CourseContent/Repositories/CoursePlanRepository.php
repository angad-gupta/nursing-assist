<?php

namespace App\Modules\CourseContent\Repositories;

use App\Modules\CourseContent\Entities\CoursePlan;

class CoursePlanRepository implements CoursePlanInterface
{
      public function findAll($course_content_id,$limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'ASC'], $status = [0, 1]){

        $result =CoursePlan::when(array_keys($filter, true), function ($query) use ($filter) {         
            

        })
        ->where('course_content_id','=',$course_content_id)->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result; 

    }

    public function find($id){
        return CoursePlan::find($id);
    }

    public function getList(){
        $result = CoursePlan::pluck('lesson_title', 'id');
        return $result;
    }

    public function save($data){

        return CoursePlan::create($data);
    }

    
    public function update($id,$data){
         $result = CoursePlan::find($id);  
        return $result->update($data);
    }

    public function delete($id){
        CoursePlan::destroy($id);
    }

    public function deletePlan($id){
        if($id){
            CoursePlan::where('course_content_id','=',$id)->delete($id);
        }
    }

    public function upload($file){
        
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . CoursePlan::FILE_PATH, $fileName);

        return $fileName;
   }

    public function getDataById($id){
        return CoursePlan::where('course_content_id','=',$id)->get();
    }


}