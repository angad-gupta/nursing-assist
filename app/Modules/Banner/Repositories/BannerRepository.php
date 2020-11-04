<?php 
namespace App\Modules\Banner\Repositories;

use App\Modules\Banner\Entities\Banner;

class BannerRepository implements BannerInterface
{
     
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result =Banner::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    } 

    public function findAllActiveBanner($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result =Banner::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->where('status','=','1')->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    }
    
    public function find($id){
        return Banner::find($id);
    }
    
   public function getList(){  
       $banner = Banner::pluck('company_name', 'id');
      
       return $banner;
   }
    
    public function save($data){
        return Banner::create($data);
    }
    
    public function update($id,$data){
        $banner = Banner::find($id);
        return $banner->update($data);
    }
    
    public function delete($id){
        $banner = Banner::find($id);
        return $banner->delete();
    }
    
   public function upload($file){
        
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . Banner::FILE_PATH, $fileName);

        return $fileName;
   }

}