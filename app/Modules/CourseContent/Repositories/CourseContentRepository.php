<?php

namespace App\Modules\CourseContent\Repositories;

use App\Modules\CourseContent\Entities\CourseContent;


class CourseContentRepository implements CourseContentInterface
{
   

    public function findAll($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'ASC'], $status = [0, 1]){

        $result =CourseContent::when(array_keys($filter, true), function ($query) use ($filter) {         
            

        })
        ->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result; 

    }

    public function find($id){
        return CourseContent::find($id);
    }


    public function getList(){
        $result = CourseContent::pluck('lesson_title', 'id');
        return $result;
    }

    public function save($data){

        return CourseContent::create($data);
    }

    
    public function update($id,$data){
         $result = CourseContent::find($id);  
        return $result->update($data);
    }

    public function delete($id){
        CourseContent::destroy($id);
    }

    public function upload($file){
        
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . CourseContent::FILE_PATH, $fileName);

        return $fileName;
   }


}