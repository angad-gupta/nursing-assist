<?php 
namespace App\Modules\Announcement\Repositories;

use App\Modules\Announcement\Entities\Announcement;

class AnnouncementRepository implements AnnouncementInterface
{
    
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'ASC'], $status = [0, 1])
    {
        $result =Announcement::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    } 
    
    public function find($id){
        return Announcement::find($id);
    }
    
   public function getList(){  
       $result = Announcement::pluck('title', 'id');
      
       return $result;
   }
    
    public function save($data){
        return Announcement::create($data);
    }
    
    public function update($id,$data){
        $result = Announcement::find($id);
        return $result->update($data);
    }
    
    public function delete($id){
        $result = Announcement::find($id);
        return $result->delete();
    }


}