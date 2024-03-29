<?php

namespace App\Modules\CourseContent\Repositories;

interface CourseContentInterface
{

    public function findAll($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function find($id);

    public function getList();

    public function save($data);

    public function update($id,$data);

    public function delete($id);

    public function upload($file);

    public function getAllCourses($id);

    public function getAllLesson($courseinfoid, $syllabiid);
    
    public function checkOrderByField($order,$course_info_id,$syllabus_id);
    
    public function getPreviousData($course_info_id,$syllabus_id,$previous_order);
    
    public function findNextLesson($course_info_id, $syllabus_id, $next_lesson_sort);
}