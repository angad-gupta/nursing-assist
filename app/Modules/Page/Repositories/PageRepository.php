<?php 
namespace App\Modules\Page\Repositories;

use App\Modules\Page\Entities\Page;

class PageRepository implements PageInterface
{
    
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result =Page::when(array_keys($filter, true), function ($query) use ($filter) {
           
            if (isset($filter['lang_flag'])) { 
                $query->where('lang_flag', '=' ,$filter['lang_flag']);
            } 
            
        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    }
    
    public function find($id){
        return Page::find($id);
    }
    
   public function getList(){  
       $testimonial = Page::pluck('company_name', 'id');
       return $testimonial;
   }
    
    public function save($data){
        return Page::create($data);
    }
    
    public function update($id,$data){
        $testimonial = Page::find($id);
        return $testimonial->update($data);
    }
    
    public function delete($id){
        $testimonial = Page::find($id);
        return $testimonial->delete();
    }
    
   public function upload($file){
        
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . Page::FILE_PATH, $fileName);

        return $fileName;
   }

    public function checkPageInfo($slug){
        return Page::where('slug','=',$slug)->count();
    }

}