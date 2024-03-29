<?php

namespace App\Modules\Message\Repositories;

interface MessageInterface
{
    public function findAll($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);
    
    public function find($id);
    
    public function findMessageInox($id);
    
    public function getList();
    
    public function save($data);
    
    public function saveMessageReply($data);

    public function update($id,$data);

    public function delete($id);

    public function getSendMessageByUser($id,$limit);

    public function getInboxMessage($id,$limit);
    
}