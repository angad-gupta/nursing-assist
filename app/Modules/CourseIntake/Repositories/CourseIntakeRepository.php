<?php

namespace App\Modules\CourseIntake\Repositories;

use App\Modules\CourseIntake\Entities\CourseIntake;
use App\Modules\CourseIntake\Entities\CourseIntakeSetup;


class CourseIntakeRepository implements CourseIntakeInterface
{
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {

         $result =CourseIntake::when(array_keys($filter, true), function ($query) use ($filter) {         
            

        })
            ->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result; 


    }

    public function find($id)
    {
        return CourseIntake::find($id);
    }

    public function getList()
    {
        $result = CourseIntake::pluck('cat_no', 'id');
        return $result;
    }

    public function save($data)
    {
        return CourseIntake::create($data);
    }

    public function saveCourseIntakeSetup($data){

        return CourseIntakeSetup::create($data);
    }


    public function update($id, $data)
    {
        $result = CourseIntake::find($id);
        return $result->update($data);
    }

    public function delete($id)
    {
        return CourseIntake::destroy($id);
    }

    public function deleteCourseIntakeSetup($id){
        CourseIntakeSetup::where('course_intake_id','=',$id)->delete($id);
    }

    public function countTotal(){
        return CourseIntake::count();
    }

}