<?php
namespace App\Modules\Student\Repositories;

use App\Modules\Student\Entities\Student;
use App\Modules\Student\Entities\StudentCourse;
use App\Modules\Student\Entities\StudentMockupHistory;
use App\Modules\Student\Entities\StudentMockupResult;
use App\Modules\Student\Entities\StudentPayment;
use App\Modules\Student\Entities\StudentQuizHistory;
use App\Modules\Student\Entities\StudentQuizResult;
use DB;

class StudentRepository implements StudentInterface
{

    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result = Student::when(array_keys($filter), function ($query) use ($filter) {

            if (isset($filter['active'])) {
                $query->where('active', $filter['active']);
            }

            if (isset($filter['intake_date']) && !empty($filter['intake_date'])) {
                $query->whereHas('enrolments', function ($qry) use ($filter) {
                    $qry->where('intake_date', $filter['intake_date']);
                    $qry->where(DB::raw('DATE_FORMAT(created_at,"%Y")'), ">=", date('Y'));
                });
            }

            if (isset($filter['agent_id']) && !empty($filter['agent_id'])) {
                $query->whereHas('enrolments', function ($qry) use ($filter) {
                    $qry->where('agents', $filter['agent_id']);
                });
            }

            if (isset($filter['search_value']) && !empty($filter['search_value'])) {
                $query->where(function ($q) use ($filter) {
                    $q->where('full_name', 'like', '%' . $filter['search_value'] . '%');
                    $q->orWhere('username', 'like', '%' . $filter['search_value'] . '%');
                    $q->orWhere('email', 'like', '%' . $filter['search_value'] . '%');
                    $q->orWhere('phone_no', 'like', '%' . $filter['search_value'] . '%');
                });

            }

        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result;

    }

    public function findAllArchives($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result = Student::withTrashed()->when(array_keys($filter), function ($query) use ($filter) {

            if (isset($filter['active'])) {
                $query->where('active', $filter['active']);
            }

            if (isset($filter['search_value']) && !empty($filter['search_value'])) {
                $query->where(function ($q) use ($filter) {
                    $q->where('full_name', 'like', '%' . $filter['search_value'] . '%');
                    $q->orWhere('username', 'like', '%' . $filter['search_value'] . '%');
                    $q->orWhere('email', 'like', '%' . $filter['search_value'] . '%');
                    $q->orWhere('phone_no', 'like', '%' . $filter['search_value'] . '%');
                });

            }

        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result;

    }


    public function find($id)
    {
        return Student::find($id);
    }

    public function getList()
    {
        $team = Student::pluck('company_name', 'id');
        return $team;
    }

    public function save($data)
    {
        return Student::create($data);
    }

    public function update($id, $data)
    {
        $Student = Student::withTrashed()->find($id);
        return $Student->update($data);
    }

    public function delete($id)
    {
        $Student = Student::find($id);
        return $Student->delete();
    }

    public function upload($file)
    {

        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . Student::FILE_PATH, $fileName);

        return $fileName;
    }

    public function getStudentCourse($student_id, $limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {

        $result = StudentCourse::when(array_keys($filter, true), function ($query) use ($filter) {

        })->where('student_id', '=', $student_id)->orderBy('id', $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result;
    }

    public function getStudentPurchase($student_id, $limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {

        $result = StudentPayment::when(array_keys($filter, true), function ($query) use ($filter) {

        })->where('student_id', '=', $student_id)->orderBy('id', $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result;
    }

    public function updatePaymentStatus($id, $data)
    {
        $result = StudentPayment::find($id);
        return $result->update($data);
    }

    public function findPurchaseCourse($payment_id)
    {
        return StudentPayment::find($payment_id);
    }

    public function storeStudentCourse($data)
    {
        return StudentCourse::create($data);
    }

    public function updateStudentCourseStatus($data, $where = [])
    {
        $result = StudentCourse::where($where);
        return $result->update($data);
    }

    public function getStudentCourseInfo($where)
    {
        $result = StudentCourse::where($where)->first();
        return $result;
    }

    public function checkQuizForCourseInfo($student_id, $courseContentId)
    {
        return StudentQuizResult::where('student_id', '=', $student_id)->where('course_content_id', '=', $courseContentId)->count();
    }

    public function saveQuizHistory($quizdata)
    {
        return StudentQuizHistory::create($quizdata);
    }

    public function getquizHistory($student_id, $course_content_id)
    {
        return StudentQuizHistory::where('student_id', '=', $student_id)->where('course_content_id', '=', $course_content_id)->get();
    }

    public function getcorrectAnswer($student_id, $course_content_id)
    {
        return StudentQuizHistory::where('student_id', '=', $student_id)->where('course_content_id', '=', $course_content_id)->where('is_correct_answer', '=', '1')->count();

    }

    public function saveQuizResult($quizdata)
    {
        return StudentQuizResult::create($quizdata);
    }

    public function saveMockupResult($mockdata)
    {
        return StudentMockupResult::create($mockdata);
    }

    public function getStudentQuizResult($student_id, $limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {

        $result = StudentQuizResult::when(array_keys($filter, true), function ($query) use ($filter) {

        })->where('student_id', '=', $student_id)->orderBy('id', $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result;
    }

    public function getStudentMockupResult($student_id, $limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {

        $result = StudentMockupResult::when(array_keys($filter, true), function ($query) use ($filter) {

        })->where('student_id', '=', $student_id)->orderBy('id', $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result;
    }

    public function previousQuizData($student_id, $previous_course_content_id)
    {
        return StudentQuizResult::where('student_id', '=', $student_id)->where('course_content_id', '=', $previous_course_content_id)->get()->first();
    }

    public function deletePreviousQuizResult($previous_quiz_id)
    {
        StudentQuizResult::destroy($previous_quiz_id);
    }

    public function deletePreviousQuizHistory($student_id, $course_info_id, $previous_course_content_id)
    {
        StudentQuizHistory::where('student_id', '=', $student_id)->where('courseinfo_id', '=', $course_info_id)->where('course_content_id', '=', $previous_course_content_id)->delete();
    }

    public function deleteMockuphistory($student_id, $mockup_title)
    {
        StudentMockupHistory::where('student_id', '=', $student_id)->where('mockup_title', '=', $mockup_title)->delete();
    }

    public function savemockupHistory($mockupdata)
    {
        return StudentMockupHistory::create($mockupdata);
    }

    public function getmockupHistory($student_id, $mockup_title)
    {
        return StudentMockupHistory::where('student_id', '=', $student_id)->where('mockup_title', '=', $mockup_title)->get();
    }

    public function getmockupcorrectAnswer($student_id, $mockup_title)
    {
        return StudentMockupHistory::where('student_id', '=', $student_id)->where('mockup_title', '=', $mockup_title)->where('is_correct_answer', '=', '1')->count();
    }

    public function getLatestQuizByStudent($student_id)
    {
        return StudentQuizResult::where('student_id', $student_id)
            ->latest()->first();
    }

}
