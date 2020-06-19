<?php

namespace App\Modules\CourseContent\Repositories;

use App\Modules\CourseContent\Entities\CourseSubTopic;


class CourseSubTopicRepository implements CourseSubTopicInterface
{
   
      public function findAll($course_plan_id,$limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'ASC'], $status = [0, 1]){

        $result =CourseSubTopic::when(array_keys($filter, true), function ($query) use ($filter) {         
            

        })
        ->where('course_plan_id','=',$course_plan_id)->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result; 

    }

    public function find($id){
        return CourseSubTopic::find($id);
    }
    
    public function getList(){
        $result = CourseSubTopic::pluck('lesson_title', 'id');
        return $result;
    }

    public function save($data){

        return CourseSubTopic::create($data);
    }

    
    public function update($id,$data){
         $result = CourseSubTopic::find($id);  
        return $result->update($data);
    }

    public function delete($id){
        CourseSubTopic::destroy($id);
    }

    public function deleteSubTopic($id){
        if($id){
            CourseSubTopic::where('course_plan_id','=',$id)->delete($id);
        }
    }

     public function upload($file){
        
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . CourseSubTopic::FILE_PATH, $fileName);

        return $fileName;
   }

    public function getDataById($id){
        return CourseSubTopic::where('course_plan_id','=',$id)->get();
    }


}