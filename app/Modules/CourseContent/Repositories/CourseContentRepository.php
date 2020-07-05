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

    public function getAllCourses($id){ 
         return CourseContent::select('syllabus_id')->where('course_info_id','=',$id)->groupBy('syllabus_id')->get();
    }

    public function getAllLesson($courseinfoid, $syllabiid){
        return CourseContent::where('course_info_id','=',$courseinfoid)->where('syllabus_id','=',$syllabiid)->orderBy('id','ASC')->get();
    }

    public function checkOrderByField($order,$course_info_id,$syllabus_id){
        return CourseContent::where('sort_order','=',$order)->where('course_info_id','=',$course_info_id)->where('syllabus_id','=',$syllabus_id)->count();
    }

    public function getPreviousData($course_info_id,$syllabus_id,$previous_order){
         return CourseContent::where('course_info_id','=',$course_info_id)->where('syllabus_id','=',$syllabus_id)->where('sort_order','=',$previous_order)->get()->first();
    }

    public function findNextLesson($course_info_id, $syllabus_id, $next_lesson_sort){
        return CourseContent::where('course_info_id','=',$course_info_id)->where('syllabus_id','=',$syllabus_id)->where('sort_order','=',$next_lesson_sort)->get()->first();
    }


}