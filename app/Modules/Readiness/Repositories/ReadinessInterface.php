<?php

namespace App\Modules\Readiness\Repositories;

interface ReadinessInterface
{
    public function findAll($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function find($id);
    
    public function getList();
    
    public function save($data);

    public function update($id,$data);

    public function delete($id);
    
    public function getQuestionByTitle($readline_title,$limit, $filter = [], $sort = ['by' => 'id', 'sort' => 'ASC'], $status = [0, 1]);
    
    public function checkCorrectAnswer($question_id,$answer);

    public function getTotalQuestionsByTitle($mockup_title, $datetime);

    public function getRandomQuestion($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'ASC'], $status = [0, 1]);

    public function upload($file_name);

}