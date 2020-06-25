<?php

namespace App\Modules\Student\Repositories;

interface StudentInterface
{
    public function findAll($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function find($id);
    
    public function getList();
    
    public function save($data);

    public function update($id,$data);

    public function delete($id);
    
    public function upload($file);


    public function getStudentCourse($student_id,$limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function getStudentPurchase($student_id,$limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

   public function updatePaymentStatus($id,$data); 
   
   public function findPurchaseCourse($payment_id); 
   
   public function storeStudentCourse($data);  


   public function checkQuizForCourseInfo($student_id, $couseinfoid);

   public function saveQuizHistory($quizdata);
   public function getquizHistory($student_id,$courseinfo_id);
   public function getcorrectAnswer($student_id,$courseinfo_id);

   public function saveQuizResult($quizdata);

   public function getStudentQuizResult($student_id,$limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

}