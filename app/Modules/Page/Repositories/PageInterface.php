<?php

namespace App\Modules\Page\Repositories;

interface PageInterface
{
    public function findAll($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function find($id);
    
    public function getList();
    
    public function save($data);

    public function update($id,$data);

    public function delete($id);
    
    public function upload($filename);

    public function checkPageInfo($slug);

}