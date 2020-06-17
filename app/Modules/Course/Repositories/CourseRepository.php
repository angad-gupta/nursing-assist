<?php 
namespace App\Modules\Course\Repositories;

use App\Modules\Course\Entities\Course;
use App\Modules\Course\Entities\CourseEnrollment;

class CourseRepository implements CourseInterface
{
    
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'ASC'], $status = [0, 1])
    {
        $result =Course::when(array_keys($filter, true), function ($query) use ($filter) { 

        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    }
    
    public function find($id){
        return Course::find($id);
    }
    
   public function getList(){  
       $result = Course::pluck('title', 'id');
       return $result;
   }
    
    public function save($data){
        return Course::create($data);
    }
    
    public function saveCourseEnrol($data){
        return CourseEnrollment::create($data);
    }

    public function update($id,$data){
        $result = Course::find($id);
        return $result->update($data);
    }
    
    public function delete($id){
        $result = Course::find($id);
        return $result->delete();
    }
    
    public function deleteCourseEnrol($id){
        CourseEnrollment::where('course_id','=',$id)->delete($id);
    }

   public function upload($file){
        
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . Course::FILE_PATH, $fileName);

        return $fileName;
   }

    public function countTotal(){
        return Course::count();
    }

    public function getCourseEnrollment(){
        return CourseEnrollment::take(3)->get();
    }

}