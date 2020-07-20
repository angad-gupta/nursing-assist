<?php 
namespace App\Modules\Team\Repositories;

use App\Modules\Team\Entities\Team;

class TeamRepository implements TeamInterface
{
    
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    { 
         $result =Team::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->orderBy('id', $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        
        return $result; 
        
    }
    
    public function find($id){
        return Team::find($id);
    }
    
   public function getList(){  
       $team = Team::pluck('company_name', 'id');
       return $team;
   }
    
    public function save($data){
        return Team::create($data);
    }
    
    public function update($id,$data){
        $team = Team::find($id);
        return $team->update($data);
    }
    
    public function delete($id){
        $team = Team::find($id);
        return $team->delete();
    }
    
    public function upload($file){
        
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . Team::FILE_PATH, $fileName);

        return $fileName;
   }

}