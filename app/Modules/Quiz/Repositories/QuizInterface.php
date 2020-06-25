<?php

namespace App\Modules\Quiz\Repositories;

interface QuizInterface
{
    public function findAll($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function find($id);

    public function getList();

    public function save($data);
    
    public function saveQuizOption($data);

    public function update($id,$data);

    public function delete($id);
    
    public function deleteQuizOpton($id);

    public function countTotal();

    public function getDemoQuiz($limit, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function getGeneralById($couseinfoId,$limit, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function checkCorrectAnswer($quiz_id,$answer);
}