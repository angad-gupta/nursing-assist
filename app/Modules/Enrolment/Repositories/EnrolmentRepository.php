<?php

namespace App\Modules\Enrolment\Repositories;

use App\Modules\Enrolment\Entities\Enrolment;


class EnrolmentRepository implements EnrolmentInterface
{
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
         $result =Enrolment::when(array_keys($filter, true), function ($query) use ($filter) {
        
            
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

    public function countTotal(){
        return Enrolment::count();
    }
     public function upload($file){
        
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . Enrolment::FILE_PATH, $fileName);

        return $fileName;
   }

     


}