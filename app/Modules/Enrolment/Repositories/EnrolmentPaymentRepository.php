<?php

namespace App\Modules\Enrolment\Repositories;

use App\Modules\Enrolment\Entities\EnrolPayment;


class EnrolmentPaymentRepository implements EnrolmentPaymentInterface
{
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
         $result =EnrolPayment::when(array_keys($filter, true), function ($query) use ($filter) {
        
            
        })
            ->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result; 

    }

    public function find($id)
    {
        return EnrolPayment::find($id);
    }

    public function getList()
    {
        $result = EnrolPayment::pluck('first_name', 'id');
        return $result;
    }

    public function save($data)
    {
        return EnrolPayment::create($data);
    }

    public function update($id, $data)
    {

        $result = EnrolPayment::find($id);
        return $result->update($data);
    }

    public function delete($id)
    {
        return EnrolPayment::destroy($id);
    }

    public function countTotal(){
        return EnrolPayment::count();
    }
     public function upload($file){
        
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . EnrolPayment::FILE_PATH, $fileName);

        return $fileName;
   }

     public function where($field, $value)
    {
        return EnrolPayment::where($field, $value);
    }

    public function with($with = [])
    {
        return EnrolPayment::with($with);
    }
     


}