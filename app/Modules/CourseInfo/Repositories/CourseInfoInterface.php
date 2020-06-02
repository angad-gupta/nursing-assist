<?php

namespace App\Modules\CourseInfo\Repositories;

interface CourseInfoInterface
{
    public function findAll($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function find($id);

    public function getList();

    public function save($data);
    
    public function saveCourseFeature($data);

    public function update($id,$data);

    public function delete($id);
    
    public function deleteCourseFeature($id);

    public function countTotal();

    public function upload($file);

}