<?php
namespace App\Modules\Student\Repositories;

use App\Modules\Student\Entities\StudentReadinessHistory;
use App\Modules\Student\Entities\StudentReadinessResult;

class StudentReadinessRepository implements StudentReadinessInterface
{

    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result = StudentReadinessResult::when(array_keys($filter, true), function ($query) use ($filter) {

        })->orderBy('id', $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result;

    }

    public function find($id)
    {
        return StudentReadinessResult::find($id);
    }

    public function getList()
    {
        $result = StudentReadinessResult::pluck('company_name', 'id');
        return $result;
    }

    public function save($data)
    {
        return StudentReadinessResult::create($data);
    }

    public function update($id, $data)
    {
        $result = StudentReadinessResult::find($id);
        return $result->update($data);
    }

    public function delete($id)
    {
        $result = StudentReadinessResult::find($id);
        return $result->delete();
    }

    public function saveHistory($mockupdata)
    {
        return StudentReadinessHistory::create($mockupdata);
    }

    public function deleteHistory($student_id, $title)
    {
        return StudentReadinessHistory::where('student_id', '=', $student_id)->where('title', '=', $title)->delete();
    }

    public function getHistory($student_id, $title)
    {
        return StudentReadinessHistory::where('student_id', '=', $student_id)->where('title', '=', $title)->get();
    }

    public function getCorrectAnswer($student_id, $title)
    {
        return StudentReadinessHistory::where('student_id', '=', $student_id)->where('title', '=', $title)->where('is_correct_answer', '=', '1')->count();
    }
}