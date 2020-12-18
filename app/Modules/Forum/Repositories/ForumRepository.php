<?php 
namespace App\Modules\Forum\Repositories;

use App\Modules\Forum\Entities\Forum;
use App\Modules\Forum\Entities\ForumComment;

class ForumRepository implements ForumInterface
{
     
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result =Forum::when(array_keys($filter, true), function ($query) use ($filter) {

            if (isset($filter['is_top_topic']) && !empty($filter['is_top_topic'])) {
                $query->where('is_top_topic', $filter['is_top_topic']);
            }

            if (isset($filter['is_featured_topic']) && !empty($filter['is_featured_topic'])) {
                $query->where('is_featured_topic', $filter['is_featured_topic']);
            }
           
        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    } 

    public function find($id){
        return Forum::find($id);
    }

    public function save($data){
        return Forum::create($data);
    }
    
    public function saveComment($data){
        return ForumComment::create($data);
    }

    public function update($id,$data){
        $result = Forum::find($id);
        return $result->update($data);
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