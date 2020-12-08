<?php 
namespace App\Modules\Gallery\Repositories;

use Carbon\Carbon; 
use App\Modules\Gallery\Entities\Album;
use App\Modules\Gallery\Entities\AlbumPhoto;

class GalleryRepository implements GalleryInterface
{
    
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
            $result = Album::when(array_keys($filter, true), function ($query) use ($filter) {
           
            if (isset($filter['vehicle_name']) && !is_null($filter['vehicle_name'])) {
                $query->whereIn('vehicle_id', $filter['vehicle_name']);
            }

            if (isset($filter['servicing_date'])) {
                $query->where('servicing_date', '=', $filter['servicing_date']);
            }
        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result;

    }
    
    public function findAllActiveGallery($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result =Album::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->where('status','=','1')->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 

    }
    
    public function find($id){
        return Album::find($id);
    }
    
    
    public function save($data){
        return Album::create($data);
    }
    
    public function update($id,$data){
        $result = Album::find($id);
        return $result->update($data);
    }
    
    public function delete($id){
        return Album::destroy($id);
    }

    public function deleteGalleryImages($id){
         return AlbumPhoto::destroy($id);
    }


    public function deleteById($id){
        return Album::delete($id);
    }

    public function countTotal()
    {
        return Album::count();
    }

    public function upload($file){
        $imageName = $file->getClientOriginalName();
        $fileName = 'Al-'.date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . Album::FILE_PATH, $fileName);

        return $fileName;
    }

    public function uploadMultiImages($files, $key_name){

         $filePath = [];

        foreach ($files as $file) {

            if (isset($key_name)) {

                $imageName = $file->getClientOriginalName();

                $fileName = 'AP-'.date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);
                $file->move(public_path() . AlbumPhoto::FILE_PATH, $fileName);


                $filePath[] = $fileName;
            }
        }

        return $filePath;

    }

    public function getGalleryImage($id){
        return AlbumPhoto::where('album_id','=',$id)->get();
    }

    public function saveGalleryImage($data){
        return AlbumPhoto::create($data);
    }


}