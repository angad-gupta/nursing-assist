<?php

namespace App\Modules\CourseInfo\Repositories;

use App\Modules\CourseInfo\Entities\CourseInfo;
use App\Modules\CourseInfo\Entities\CourseInfoFeature;


class CourseInfoRepository implements CourseInfoInterface
{
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {

         $result =CourseInfo::when(array_keys($filter, true), function ($query) use ($filter) {         
            

        })
            ->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result; 


    }

    public function find($id)
    {
        return CourseInfo::find($id);
    }

    public function getList()
    {
        $result = CourseInfo::pluck('title', 'id');
        return $result;
    }

    public function save($data)
    {
        return CourseInfo::create($data);
    }

    public function saveCourseFeature($data){

        return CourseInfoFeature::create($data);
    }


    public function update($id, $data)
    {
        $result = CourseInfo::find($id);
        return $result->update($data);
    }

    public function delete($id)
    {
        return CourseInfo::destroy($id);
    }

    public function deleteCourseFeature($id){
        CourseInfoFeature::where('courseInfo_id','=',$id)->delete($id);
    }

    public function countTotal(){
        return CourseInfo::count();
    }


    public function upload($file){
        
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . CourseInfo::FILE_PATH, $fileName);

        return $fileName;
   }

}