<?php 
namespace App\Modules\Forum\Repositories;

use App\Modules\Forum\Entities\Forum;
use App\Modules\Forum\Entities\ForumComment;

class ForumRepository implements ForumInterface
{
     
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result =Forum::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    } 

    public function find($id){
        return Forum::find($id);
    }
      
    public function delete($id){
        $result = Forum::find($id);
        return $result->delete();
    }    

    public function getCommentById($id,$limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]){

        $result =ForumComment::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->where('forum_id','=',$id)->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    }

    public function deleteComment($id){
        $result = ForumComment::find($id);
        return $result->delete();
    }

}