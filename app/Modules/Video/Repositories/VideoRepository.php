<?php 
namespace App\Modules\Video\Repositories;

use App\Modules\Video\Entities\Video;

class VideoRepository implements VideoInterface
{
     
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result =Video::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    }   

    public function findAllActiveVideo($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result =Video::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->where('status','=','1')->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    } 
    
    public function find($id){
        return Video::find($id);
    }
    
   public function getList(){  
       $result = Video::pluck('company_name', 'id');
      
       return $result;
   }
    
    public function save($data){
        return Video::create($data);
    }
    
    public function update($id,$data){
        $result = Video::find($id);
        return $result->update($data);
    }
    
    public function delete($id){
        $result = Video::find($id);
        return $result->delete();
    }
    
    public function uploadImage($file){

        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . Video::FILE_PATH, $fileName);

        return $fileName;   
    }

   public function upload($file){
        
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . Video::VIDEO_PATH, $fileName);

        return $fileName;
   }

}