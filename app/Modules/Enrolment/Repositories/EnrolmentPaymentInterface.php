<?php

namespace App\Modules\Enrolment\Repositories;

interface EnrolmentPaymentInterface
{
    public function findAll($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function find($id);

    public function getList();

    public function save($data);

    public function update($id,$data);

    public function delete($id);

    public function countTotal();

     public function upload($file);

     public function where($field, $value);
     
     public function with($with = []);

}