<?php

namespace App\Modules\Resource\Repositories;

use App\Modules\Resource\Entities\Resources;

class ResourcesRepository implements ResourcesInterface
{
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {

        $result = Resources::when(array_keys($filter, true), function ($query) use ($filter) {

        })
            ->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result;

    }     

    public function findAllNclex($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {

        $result = Resources::when(array_keys($filter, true), function ($query) use ($filter) {

        })
            ->where('course_type','=','NCLEX')->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result;

    }   

    public function findAllOsce($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {

        $result = Resources::when(array_keys($filter, true), function ($query) use ($filter) {

        })
            ->where('course_type','=','OSCE')->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result;

    }

    public function find($id)
    {
        return Resources::find($id);
    }

    public function save($data)
    {
        return Resources::create($data);
    }

    public function update($id, $data)
    {
        $result = Resources::find($id);
        return $result->update($data);
    }

    public function delete($id)
    {
        return Resources::destroy($id);
    }

    public function upload($file)
    {
        $imageName = $file->getClientOriginalName(); 
        $fileName = time().'_'.preg_replace('[ ]', '-', $imageName);
        $file->move(public_path() . Resources::FILE_PATH, $fileName);
       
        return $fileName;
    }

}
