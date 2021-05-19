<?php

namespace App\Modules\Student\Repositories;

interface StudentInterface
{
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function findAllArchives($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function find($id);

    public function randomCode($length);

    public function findByCode($code);

    public function getList();

    public function save($data);

    public function update($id, $data);

    public function delete($id);
    public function permanentDelete($id);

    public function upload($file);

    public function getStudentCourse($student_id, $limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);
    public function getStudentOsceCourse($student_id, $limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function updateStudentCourseStatus($data, $where = []);

    public function getStudentCourseInfo($where);

    public function getStudentPurchase($student_id, $limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function updatePaymentStatus($id, $data);

    public function findPurchaseCourse($payment_id);

    public function storeStudentCourse($data);

    public function checkQuizForCourseInfo($student_id, $courseContentId);

    public function clearOldQuizHistory($student_id, $course_content_id); 
    public function saveQuizHistory($quizdata);
    public function getquizHistory($student_id, $course_content_id);
    public function getcorrectAnswer($student_id, $course_content_id);

    public function saveQuizResult($quizdata);
    public function saveMockupResult($mockdata);

    public function getStudentQuizResult($student_id, $limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);
    public function getStudentMockupResult($student_id, $limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function previousQuizData($student_id, $previous_course_content_id);

    public function deletePreviousQuizResult($previous_quiz_id);
    public function deletePreviousQuizHistory($student_id, $course_info_id, $previous_course_content_id);

    public function deleteMockuphistory($student_id, $mockup_title);
    public function savemockupHistory($mockupdata);

    public function getmockupHistory($mockup_result_id, $student_id);
    public function getmockupcorrectAnswer($mockup_result_id);

    public function getLatestQuizByStudent($student_id);
    public function getQuizForCourseInfo($student_id, $courseContentId);

    public function getAllHistories($student_id, $limit = null, $filter = []);


    public function storePaymentHistory($data);

    public function findPaymentHistory($payment_id);
    public function findStudentPayment($payment_id);

    public function updateStudent($id);

    
}
