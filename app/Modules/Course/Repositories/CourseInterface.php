<?php

namespace App\Modules\Course\Repositories;

interface CourseInterface
{
    public function findAll($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function find($id);
    
    public function getList();
    
    public function save($data);
    
    public function saveCourseEnrol($data);

    public function update($id,$data);

    public function delete($id);

    public function deleteCourseEnrol($id);
    
    public function upload($filename);

    public function countTotal();

}