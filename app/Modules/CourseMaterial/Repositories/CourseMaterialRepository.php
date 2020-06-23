<?php

namespace App\Modules\CourseMaterial\Repositories;

use App\Modules\CourseMaterial\Entities\CourseMaterial;


class CourseMaterialRepository implements CourseMaterialInterface
{
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {

        $result =CourseMaterial::when(array_keys($filter, true), function ($query) use ($filter) {         
            

        })
            ->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result; 

    }

    public function find($id)
    {
        return CourseMaterial::find($id);
    }

    public function getList()
    {
        $result = CourseMaterial::pluck('title', 'id');
        return $result;
    }

    public function save($data)
    {
        return CourseMaterial::create($data);
    }

    public function update($id, $data)
    {
        $result = CourseMaterial::find($id);
        return $result->update($data);
    }

    public function delete($id)
    {
        return CourseMaterial::destroy($id);
    }

    public function upload($file){
        
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . CourseMaterial::FILE_PATH, $fileName);

        return $fileName;
   }

}