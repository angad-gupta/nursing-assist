<?php

namespace App\Modules\Enrolment\Repositories;

use App\Modules\Enrolment\Entities\Enrolment;
use DB;

class EnrolmentRepository implements EnrolmentInterface
{
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result = Enrolment::when(array_keys($filter, true), function ($query) use ($filter) {

        })
            ->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result;

    }

    public function find($id)
    {
        return Enrolment::find($id);
    }

    public function getList()
    {
        $result = Enrolment::pluck('first_name', 'id');
        return $result;
    }

    public function save($data)
    {
        return Enrolment::create($data);
    }

    public function update($id, $data)
    {
        $result = Enrolment::find($id);
        return $result->update($data);
    }

    public function delete($id)
    {
        return Enrolment::destroy($id);
    }

    public function countTotal()
    {
        return Enrolment::count();
    }

    public function upload($file)
    {

        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . Enrolment::FILE_PATH, $fileName);

        return $fileName;
    }

    public function getLatestByStudent($student_id)
    {
        return Enrolment::where('student_id', $student_id)
            ->where('status', '!=', 'Disapproved')
            ->latest()->first();
    }

    public function checkCourseIntakeAvailability($courseinfo_id, $intake_month, $students_per_intake = 40)
    {
        $total = Enrolment::where('courseinfo_id', $courseinfo_id)
            ->where('status', '!=', 'Disapproved')
            ->where('intake_date', $intake_month)
            ->count();
         
        if($total < $students_per_intake ) {
            return $total + 1;
        } else {
            return 0;
        }

    }

}
