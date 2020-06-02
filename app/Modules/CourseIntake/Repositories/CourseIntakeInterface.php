<?php

namespace App\Modules\CourseIntake\Repositories;

interface CourseIntakeInterface
{
    public function findAll($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function find($id);

    public function getList();

    public function save($data);
    
    public function saveCourseIntakeSetup($data);

    public function update($id,$data);

    public function delete($id);
    
    public function deleteCourseIntakeSetup($id);

    public function countTotal();
    
}