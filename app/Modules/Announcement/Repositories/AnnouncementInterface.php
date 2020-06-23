<?php

namespace App\Modules\Announcement\Repositories;

interface AnnouncementInterface
{
    public function findAll($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'ASC'], $status = [0, 1]);
    
    public function find($id);
    
    public function getList();
    
    public function save($data);

    public function update($id,$data);

    public function delete($id);
    
}