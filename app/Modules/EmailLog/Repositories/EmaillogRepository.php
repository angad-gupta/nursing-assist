<?php 
namespace App\Modules\EmailLog\Repositories;

use App\Modules\EmailLog\Entities\Emaillog;

class EmaillogRepository implements EmaillogInterface
{
     
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result =Emaillog::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    } 

    public function saveEmaillog($action){
         return Emaillog::create($action);
    }


  	public function getEmailLogById($student_id, $limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {

        $result = Emaillog::when(array_keys($filter, true), function ($query) use ($filter) {

        })->where('student_id', '=', $student_id)->orderBy('id', $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));

        return $result;
    }

    public function find($id)
    {
        return Emaillog::find($id);
    }

}