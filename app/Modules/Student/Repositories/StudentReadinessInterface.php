<?php

namespace App\Modules\Student\Repositories;

interface StudentReadinessInterface
{
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function find($id);

    public function save($data);

    public function update($id, $data);

    public function delete($id);

    public function saveHistory($mockupdata);

    public function deleteHistory($student_id, $title);

    public function getHistory($student_id, $title);

    public function getReadinessHistory($readiness_result_id, $student_id);

    public function getCorrectAnswer($student_id, $title); 


    public function checkReadinessResult($student_id, $title, $date);
    
    public function getWhereQuestionHistory($whereArray);

    public function updateHistory($id, $data);

    public function getCorrectAnswerByResult($readiness_result_id);

    public function findAllHistory($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'ASC']);



    //New Features Readliness Resume
    public function getCurrentReadlinessResult($student_id,$title);
    public function getAttemptedQuestion($id);

}
