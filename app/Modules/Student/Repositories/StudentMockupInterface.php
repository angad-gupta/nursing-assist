<?php

namespace App\Modules\Student\Repositories;

interface StudentMockupInterface
{
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function find($id);

    public function getList();

    public function save($data);

    public function update($id, $data);

    public function delete($id);

    public function saveHistory($mockupdata);

    public function deleteHistory($student_id, $title);

    public function getHistory($student_id, $title);

    public function getCorrectAnswer($result_id);

    public function findAllHistory($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function updateHistory($student_id, $title, $updateData);

    public function checkMockupResult($student_id, $title, $date);
}
