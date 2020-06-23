<?php 
namespace App\Modules\FAQ\Repositories;

use App\Modules\FAQ\Entities\FAQ;

class FAQRepository implements FAQInterface
{
    
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'ASC'], $status = [0, 1])
    {
        $result =FAQ::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    } 

    public function findAllActiveFAQ($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'ASC'], $status = [0, 1])
    {
        $result =FAQ::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->where('status','=','1')->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    }
    
    public function find($id){
        return FAQ::find($id);
    }
    
   public function getList(){  
       $banner = FAQ::pluck('question', 'id');
      
       return $banner;
   }
    
    public function save($data){
        return FAQ::create($data);
    }
    
    public function update($id,$data){
        $banner = FAQ::find($id);
        return $banner->update($data);
    }
    
    public function delete($id){
        $banner = FAQ::find($id);
        return $banner->delete();
    }


}