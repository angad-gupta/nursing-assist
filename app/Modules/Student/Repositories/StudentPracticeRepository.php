<?php
namespace App\Modules\Student\Repositories;

use App\Modules\Student\Entities\StudentPracticeHistory;
use App\Modules\Student\Entities\StudentPracticeResult;

class StudentPracticeRepository implements StudentPracticeInterface
{

    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result = StudentPracticeResult::when(array_keys($filter, true), function ($query) use ($filter) {

        })->orderBy('id', $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result;

    }

    public function find($id)
    {
        return StudentPracticeResult::find($id);
    }

    public function save($data)
    {
        return StudentPracticeResult::create($data);
    }

    public function update($id, $data)
    {
        $result = StudentPracticeResult::find($id);
        return $result->update($data);
    }

    public function delete($id)
    {
        $result = StudentPracticeResult::find($id);
        return $result->delete();
    }

    public function saveHistory($mockupdata)
    {
        return StudentPracticeHistory::create($mockupdata);
    }

    public function deleteHistory($student_id, $title)
    {
        return StudentPracticeHistory::where('student_id', '=', $student_id)->where('title', '=', $title)->delete();
    }

    public function getHistory($student_id, $title)
    {
        return StudentPracticeHistory::where('student_id', '=', $student_id)->where('title', '=', $title)->get();
    }

    public function getCorrectAnswer($student_id, $title)
    {
        return StudentPracticeHistory::where('student_id', '=', $student_id)->where('title', '=', $title)->where('is_correct_answer', '=', '1')->count();
    }

    public function checkPracticeResult($student_id, $title, $date)
    {
        return StudentPracticeResult::where('student_id', '=', $student_id)
            ->where('title', '=', $title)
            ->where('date', $date)
            ->first();
    }

}
