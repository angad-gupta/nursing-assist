<?php
namespace App\Modules\Student\Repositories;

use App\Modules\Student\Entities\StudentPracticeHistory;
use App\Modules\Student\Entities\StudentPracticeResult;

class StudentPracticeRepository implements StudentPracticeInterface
{

    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result = StudentPracticeResult::when(array_keys($filter, true), function ($query) use ($filter) {

            if(isset($filter['student_id']) && !empty($filter['student_id'])) {
                $query->where('student_id', $filter['student_id']);
            }

        })
        ->whereNotNull('percent')->whereNotNull('total_question')
        ->orderBy('id', $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

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

    public function getHistoryByPractiseID($id)
    {
        return StudentPracticeHistory::where('practice_result_id', '=', $id)->get();
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
            ->orderBy('id', 'DESC')
            ->first();
    }

    public function getQuestionHistory($whereArray)
    {
        return StudentPracticeHistory::where($whereArray)->first();
    }

    public function updateHistory($id, $data)
    {
        $result = StudentPracticeHistory::find($id);
        return $result->update($data);
    }

    public function findAllHistory($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'ASC'])
    {
        $result = StudentPracticeHistory::when(array_keys($filter, true), function ($query) use ($filter) {

            if (isset($filter['practice_result_id']) && !empty($filter['practice_result_id'])) {
                $query->where('practice_result_id', $filter['practice_result_id']);
            }

        })->orderBy('id', $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result;

    }

    public function getCorrectAnswerByResult($practice_result_id)
    {
        return StudentPracticeHistory::where('practice_result_id', '=', $practice_result_id)->where('is_correct_answer', '=', '1')->count();
    }


    public function CountPracticeTest($from_date,$to_date){
        return StudentPracticeResult::where('date','>=',$from_date)->where('date','<=',$to_date)->count();
    }

}
