<?php 
namespace App\Modules\Newsletter\Repositories;

use App\Modules\Newsletter\Entities\Template;
use App\Modules\Newsletter\Entities\TemplateTo;

class NewsletterRepository implements NewsletterInterface
{
    
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result =Template::when(array_keys($filter, true), function ($query) use ($filter) {

        })
            
        ->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    }
    
    public function find($id){
        return Template::find($id);
    }
    
   public function getList(){  
       $result = Template::pluck('vendor_name', 'id');
      
       return $result;
   }
    
    public function save($data){
        return Template::create($data);
    }

    public function saveTemplateTo($data){
        return TemplateTo::create($data);
    }
    
    public function update($id,$data){
        $result = Template::find($id);
        return $result->update($data);
    }
    
    public function delete($id){
        $result = Template::find($id);
        return $result->delete();
    }

    public function deleteTempleteTo($id){
        $result = TemplateTo::where('template_id','=',$id)->delete();
    }

    
}