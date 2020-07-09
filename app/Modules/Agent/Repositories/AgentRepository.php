<?php 
namespace App\Modules\Agent\Repositories;

use App\Modules\Agent\Entities\Agent;
use App\Modules\Employment\Entities\Country;

class AgentRepository implements AgentInterface
{
    
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'ASC'], $status = [0, 1])
    { 
         $result =Agent::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->orderBy('id', $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        
        return $result; 
        
    }
    
    public function find($id){
        return Agent::find($id);
    }
    
   public function getList(){  
       $team = Agent::pluck('agent_name', 'id'); 
       return $team;
   }
    
    public function save($data){
        return Agent::create($data);
    }
    
    public function update($id,$data){
        $team = Agent::find($id);
        return $team->update($data);
    }
    
    public function delete($id){
        $team = Agent::find($id);
        return $team->delete();
    }
    
    public function upload($file){
        
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . Agent::FILE_PATH, $fileName);

        return $fileName;
   }

   public function getCountries(){
     $Country = Country::pluck('name', 'id');
       return $Country;
   }

}