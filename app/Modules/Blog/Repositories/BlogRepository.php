<?php 
namespace App\Modules\Blog\Repositories;

use App\Modules\Blog\Entities\Blog;

class BlogRepository implements BlogInterface
{
     
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result =Blog::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    } 

    public function findAllActiveBlog($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result =Blog::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->where('status','=','1')->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    }
    
    public function find($id){
        return Blog::find($id);
    }
    
   public function getList(){  
       $result = Blog::pluck('title', 'id');
      
       return $result;
   }
    
    public function save($data){
        return Blog::create($data);
    }
    
    public function update($id,$data){
        $result = Blog::find($id);
        return $result->update($data);
    }
    
    public function delete($id){
        $result = Blog::find($id);
        return $result->delete();
    }
    
   public function upload($file){
        
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . Blog::FILE_PATH, $fileName);

        return $fileName;
   }

}