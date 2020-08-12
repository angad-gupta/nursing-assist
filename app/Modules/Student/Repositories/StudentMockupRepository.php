<?php
namespace App\Modules\Student\Repositories;

use App\Modules\Student\Entities\StudentMockupHistory;
use App\Modules\Student\Entities\StudentMockupResult;

class StudentMockupRepository implements StudentMockupInterface
{

    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result = StudentMockupResult::when(array_keys($filter, true), function ($query) use ($filter) {

        })->orderBy('id', $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result;

    }

    public function find($id)
    {
        return StudentMockupResult::find($id);
    }

    public function getList()
    {
        $result = StudentMockupResult::pluck('mockup_title', 'id');
        return $result;
    }

    public function save($data)
    {
        return StudentMockupResult::create($data);
    }

    public function update($id, $data)
    {
        $result = StudentMockupResult::find($id);
        return $result->update($data);
    }

    public function delete($id)
    {
        $result = StudentMockupResult::find($id);
        return $result->delete();
    }

    public function saveHistory($mockupdata)
    {
        return StudentMockupHistory::create($mockupdata);
    }

    public function deleteHistory($student_id, $title)
    {
        return StudentMockupHistory::where('student_id', '=', $student_id)->where('mockup_title', '=', $title)->delete();
    }

    public function getHistory($student_id, $title)
    {
        return StudentMockupHistory::where('student_id', '=', $student_id)->where('mockup_title', '=', $title)->get();
    }

    public function getCorrectAnswer($result_id)
    {
        return StudentMockupHistory::where('mockup_result_id', $result_id)->count();
    }

    public function findAllHistory($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result = StudentMockupHistory::when(array_keys($filter, true), function ($query) use ($filter) {

            if (isset($filter['mockup_result_id']) && !empty($filter['mockup_result_id'])) {
                $query->where('mockup_result_id', $filter['mockup_result_id']);
            }

        })->orderBy('id', $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result;

    }

    public function updateHistory($student_id, $title, $updateData)
    {
        return StudentMockupHistory::where('student_id', '=', $student_id)->where('mockup_title', '=', $title)->update($updateData);
    }


}
