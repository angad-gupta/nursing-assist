<?php

namespace App\Modules\CourseContent\Repositories;

interface CoursePlanInterface
{
    public function findAll($course_content_id, $limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function find($id);

    public function getList();

    public function save($data);

    public function update($id,$data);

    public function delete($id);

    public function deletePlan($id);
    
    public function upload($file);

    public function getDataById($id);
    
}