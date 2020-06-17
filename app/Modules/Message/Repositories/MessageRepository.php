<?php 
namespace App\Modules\Message\Repositories;

use App\Modules\Message\Entities\Message;

class MessageRepository implements MessageInterface
{
    
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result =Message::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    } 
    
    public function find($id){
        return Message::find($id);
    }
    
   public function getList(){  
       $result = Message::pluck('question', 'id');
      
       return $result;
   }
    
    public function save($data){
        return Message::create($data);
    }
    
    public function update($id,$data){
        $result = Message::find($id);
        return $result->update($data);
    }
    
    public function delete($id){
        $result = Message::find($id);
        return $result->delete();
    }

    public function getSendMessageByUser($id,$limit){
         return  Message::where('sent_by','=',$id)->orderBy('id','DESC')->take(3)->get();
    }


}