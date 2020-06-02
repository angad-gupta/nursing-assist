<?php

namespace App\Modules\ContactUs\Repositories;

use App\Modules\ContactUs\Entities\ContactUs;


class ContactUsRepository implements ContactUsInterface
{
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
         $result =ContactUs::when(array_keys($filter, true), function ($query) use ($filter) {
        
            
        })
            ->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result; 

    }

    public function find($id)
    {
        return ContactUs::find($id);
    }

    public function getList()
    {
        $result = ContactUs::pluck('first_name', 'id');
        return $result;
    }

    public function save($data)
    {
        return ContactUs::create($data);
    }

    public function update($id, $data)
    {
        $result = ContactUs::find($id);
        return $result->update($data);
    }

    public function delete($id)
    {
        return ContactUs::destroy($id);
    }

    public function countTotal(){
        return ContactUs::count();
    }


}