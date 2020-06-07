<?php

namespace App\Modules\CourseInfo\Repositories;

interface CourseInfoInterface
{
    public function findAll($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function find($id);

    public function getList();

    public function save($data);
    
    public function saveCourseProgramme($data);

    public function saveCourseStructure($data);

    public function update($id,$data);

    public function delete($id);
    
    public function deleteCourseProgramme($id);
    
    public function deleteCourseStrucuture($id);

    public function countTotal();

    public function upload($file);

}