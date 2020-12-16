<?php

namespace App\Modules\Forum\Repositories;

interface ForumInterface
{
    public function findAll($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);
    
    public function find($id);

    public function delete($id);

    public function getCommentById($id,$limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function deleteComment($id);
    
 
}