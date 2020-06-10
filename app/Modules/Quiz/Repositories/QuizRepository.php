<?php

namespace App\Modules\Quiz\Repositories;

use App\Modules\Quiz\Entities\Quiz;
use App\Modules\Quiz\Entities\QuizOption;

class QuizRepository implements QuizInterface
{
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {

         $result =Quiz::when(array_keys($filter, true), function ($query) use ($filter) {         
            

        })
            ->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result; 

    }

    public function find($id)
    {
        return Quiz::find($id); 
    }

    public function getList()
    {
        $result = Quiz::pluck('question', 'id');
        return $result;
    }

    public function save($data)
    {
        return Quiz::create($data);
    }

    public function saveQuizOption($data){

        return QuizOption::create($data);
    }

    public function update($id, $data)
    {
        $result = Quiz::find($id);
        return $result->update($data);
    }

    public function delete($id)
    {
        return Quiz::destroy($id);
    }

    public function deleteQuizOpton($id){
        QuizOption::where('quiz_id','=',$id)->delete($id);
    }

    public function countTotal(){
        return Quiz::count();
    }

}