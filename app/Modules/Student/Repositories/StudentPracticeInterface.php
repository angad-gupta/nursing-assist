<?php

namespace App\Modules\Student\Repositories;

interface StudentPracticeInterface
{
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function find($id);

    public function save($data);

    public function update($id, $data);

    public function delete($id);

    public function saveHistory($mockupdata);

    public function deleteHistory($student_id, $title);

    public function getHistory($student_id, $title);

    public function getCorrectAnswer($student_id, $title);

    public function checkPracticeResult($student_id, $title, $date);

    public function getQuestionHistory($whereArray);

    public function updateHistory($id, $data);
}
