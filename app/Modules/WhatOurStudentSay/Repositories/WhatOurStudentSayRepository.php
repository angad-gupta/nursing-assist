<?php 
namespace App\Modules\WhatOurStudentSay\Repositories;

use App\Modules\WhatOurStudentSay\Entities\WhatOurStudentSay;

class WhatOurStudentSayRepository implements WhatOurStudentSayInterface
{
    
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    { 
         $result =WhatOurStudentSay::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->orderBy('id', $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        
        return $result; 
        
    }
    
    public function find($id){
        return WhatOurStudentSay::find($id);
    }
    
   public function getList(){  
       $team = WhatOurStudentSay::pluck('company_name', 'id');
       return $team;
   }
    
    public function save($data){
        return WhatOurStudentSay::create($data);
    }
    
    public function update($id,$data){
        $team = WhatOurStudentSay::find($id);
        return $team->update($data);
    }
    
    public function delete($id){
        $team = WhatOurStudentSay::find($id);
        return $team->delete();
    }
    
    public function upload($file){
        
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . WhatOurStudentSay::FILE_PATH, $fileName);

        return $fileName;
   }

}