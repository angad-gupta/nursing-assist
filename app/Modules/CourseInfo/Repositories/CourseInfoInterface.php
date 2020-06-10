<?php

namespace App\Modules\CourseInfo\Repositories;

interface CourseInfoInterface
{
    public function findAll($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function find($id);

    public function getList();

    public function save($data);
    
    public function saveCourseDeliery($data);

    public function saveCourseStructure($data);

    public function saveCourseIntake($data);

    public function update($id,$data);

    public function delete($id);
    
    public function deleteCourseDelivery($id);
    
    public function deleteCourseStrucuture($id);
    
    public function deleteCourseIntake($id);

    public function countTotal();

    public function upload($file);
    
    public function getMonth();

    public function getCourseInfoByCourse($id);

}