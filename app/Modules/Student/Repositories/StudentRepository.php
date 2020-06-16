<?php 
namespace App\Modules\Student\Repositories;

use App\Modules\Student\Entities\Student;

class StudentRepository implements StudentInterface
{
    
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'ASC'], $status = [0, 1])
    { 
         $result =Student::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->orderBy('id', $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        
        return $result; 
        
    }
    
    public function find($id){
        return Student::find($id);
    }
    
   public function getList(){  
       $team = Student::pluck('company_name', 'id');
       return $team;
   }
    
    public function save($data){
        return Student::create($data);
    }
    
    public function update($id,$data){
        $Student = Student::find($id);
        return $Student->update($data);
    }
    
    public function delete($id){
        $Student = Student::find($id);
        return $Student->delete();
    }
    
    public function upload($file){
        
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . Student::FILE_PATH, $fileName);

        return $fileName;
   }

}