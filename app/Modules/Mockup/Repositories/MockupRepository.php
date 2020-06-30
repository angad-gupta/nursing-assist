<?php 
namespace App\Modules\Mockup\Repositories;

use App\Modules\Mockup\Entities\Mockup;

class MockupRepository implements MockupInterface
{
    
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'ASC'], $status = [0, 1])
    { 
         $result =Mockup::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->orderBy('id', $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        
        return $result; 
        
    }
    
    public function find($id){
        return Mockup::find($id);
    }
    
   public function getList(){  
       $team = Mockup::pluck('company_name', 'id');
       return $team;
   }
    
    public function save($data){
        return Mockup::create($data);
    }
    
    public function update($id,$data){
        $team = Mockup::find($id);
        return $team->update($data);
    }
    
    public function delete($id){
        $team = Mockup::find($id);
        return $team->delete();
    }

}