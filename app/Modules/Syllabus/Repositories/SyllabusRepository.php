<?php 
namespace App\Modules\Syllabus\Repositories;

use App\Modules\Syllabus\Entities\Syllabus;

class SyllabusRepository implements SyllabusInterface
{
    
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'ASC'], $status = [0, 1])
    { 
         $result =Syllabus::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->orderBy('id', $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        
        return $result; 
        
    }
    
    public function find($id){
        return Syllabus::find($id);
    }
    
   public function getList(){  
       $team = Syllabus::pluck('syllabus_title', 'id');
       return $team;
   }
    
    public function save($data){
        return Syllabus::create($data);
    }
    
    public function update($id,$data){
        $team = Syllabus::find($id);
        return $team->update($data);
    }
    
    public function delete($id){
        $team = Syllabus::find($id);
        return $team->delete();
    }

}