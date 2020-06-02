<?php

namespace App\Modules\Employment\Repositories;


use App\Modules\Employment\Entities\Employment;
use App\Modules\Employment\Entities\Country;

use App\Modules\User\Entities\User;
use Illuminate\Support\Facades\DB;

class EmploymentRepository implements EmploymentInterface
{

    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result = Employment::when(array_keys($filter, true), function ($query) use ($filter) {
            if (isset($filter['department_id'])) {
                $query->where('department_id', '=', $filter['department_id']);
            }
            if (isset($filter['designation_id'])) {
                $query->where('designation_id', '=', $filter['designation_id']);
            }
            if (isset($filter['search_value'])) {
                $query->where('first_name', 'like', '%' . $filter['search_value'] . '%');
                $query->orWhere('last_name', 'like', '%' . $filter['search_value'] . '%');
                $query->orWhere(DB::raw("concat_ws(' ', first_name, middle_name, last_name)"), 'like', '%' . $filter['search_value'] . '%');
            }

            if (isset($filter['calender_nepali'])) {
                $query->where(DB::raw("(DATE_FORMAT(nepali_join_date,'%Y-%m'))"), '<=', $filter['year_month']);
            }
            if (isset($filter['calender_english'])) {
                $query->where(DB::raw("(DATE_FORMAT(join_date,'%Y-%m'))"), '<=', $filter['year_month']);
            }
        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result;
    }

    public function advanceSearch($limit = 10, $filter = [])
    {
        $result = Employment::where('status', 1)->when(array_keys($filter, true), function ($query) use ($filter) {
            if (isset($filter['department_id']) && !is_null($filter['department_id'])) {
                $query->whereIn('department_id', $filter['department_id']);
            }
            if (isset($filter['designation_id']) && !is_null($filter['designation_id'])) {
                $query->whereIn('designation_id', $filter['designation_id']);
            }

            if (isset($filter['organization_id']) && !is_null($filter['organization_id'])) {
                $query->whereIn('organization_id', $filter['organization_id']);
            }

            if (isset($filter['branch_id']) && !is_null($filter['branch_id'])) {
                $query->whereIn('branch', $filter['branch_id']);
            }
            if (isset($filter['search_value'])) {
                $query->where('first_name', 'like', '%' . $filter['search_value'] . '%');
                $query->orWhere('last_name', 'like', '%' . $filter['search_value'] . '%');
                $query->orWhere('personal_email', 'like', '%' . $filter['search_value'] . '%');
                $query->orWhere(DB::raw("concat_ws(' ', first_name, middle_name, last_name)"), 'like', '%' . $filter['search_value'] . '%');
            }

            if (isset($filter['calender_nepali'])) {
                $query->where(DB::raw("(DATE_FORMAT(nepali_join_date,'%Y-%m'))"), '<=', $filter['year_month']);
            }
            if (isset($filter['calender_english'])) {
                $query->where(DB::raw("(DATE_FORMAT(join_date,'%Y-%m'))"), '<=', $filter['year_month']);
            }
        })->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result;
    }

    public function findArchive($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result = Employment::where('status', '=', 0)->when(array_keys($filter, true), function ($query) use ($filter) {


            if (isset($filter['department_id'])) {
                $query->where('department_id', '=', $filter['department_id']);
            }
            if (isset($filter['designation_id'])) {
                $query->where('designation_id', '=', $filter['designation_id']);
            }
            if (isset($filter['search_value'])) {
                $query->where('first_name', 'like', '%' . $filter['search_value'] . '%');
                $query->orWhere('last_name', 'like', '%' . $filter['search_value'] . '%');
            }
        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result;
    }

    public function getEmployeeByID($emp_id)
    {
        $result = Employment::where('employee_id', '=', $emp_id)->count();
        return $result;
    }

    public function getAllEmployeeData($filter = [])
    {
        $result = Employment::get();
        return $result;
    }

    public function getAll($filter = [])
    {
        $result = Employment::select('id', 'join_date', 'employee_id', 'first_name', 'middle_name', 'last_name', 'designation_id', 'department_id', 'organization_id')->where('status', '=', '1')->get();
        return $result;
    }

    public function getAllTechnical($filter = [])
    {
        $result = Employment::select('id', 'first_name', 'last_name', 'designation_id', 'department_id')->where('department_id', '=', '1')->where('status', '=', '1')->get();
        return $result;
    }

    public function getList()
    {
        $result = Employment::where('status', 1)->pluck('first_name', 'id');
        return $result;
    }

    public function upload($file)
    {
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . Employment::FILE_PATH, $fileName);

        return $fileName;
    }

    public function uploadCitizen($file)
    {
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . Employment::CITIZEN_PATH, $fileName);

        return $fileName;
    }

    public function uploadDocument($file)
    {
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . Employment::DOC_PATH, $fileName);

        return $fileName;
    }

    public function save($data)
    {
        return Employment::create($data);
    }

    public function update($id, $data)
    {
        $Employment = Employment::find($id);
        return $Employment->update($data);
    }

    public function delete($id)
    {
        return Employment::destroy($id);
    }

    public function countTotal()
    {
        return Employment::count();
    }

    public function getCountries()
    {
        return Country::pluck('name', 'id');
    }

    public function updateStatus($id)
    {
        $employee = $this->find($id);


        if ($employee->status == 1) {
            $data['status'] = 0;
            $user_status['active'] = 0;
            if ($employee->getUser != null) {
                $employee->getUser->update($user_status);
            }
            return $employee->update($data);
        }
        if ($employee->status == 0) {
            $data['status'] = 1;
            $user_status['active'] = 1;
            if ($employee->getUser != null) {
                $employee->getUser->update($user_status);
            }
            return $employee->update($data);
        }
    }

    public function find($id)
    {
        return Employment::find($id);
    }

   
    public function getEmployeeDetail($filter, $select)
    {
        $result =  Employment::where($filter)->first($select);
        return $result;
    }

    public function getEmpById($emp_id)
    {
        $result = Employment::select('id', 'employee_id', 'first_name', 'middle_name','last_name')->where('id','=',$emp_id)->where('status', '=', '1')->get();
        return $result;
    }

    public function autosearch($query)
    {
        return Employment::select('first_name','middle_name','last_name')->where('status', '=', '1')->get();
    }


    public function getEmployeeDetailByName($data)
    {
        $full_name = explode(' ', $data);
        $first_name = $full_name[0];
        if(isset($full_name[2]) && !empty($full_name[2])) {
           $middle_name = $full_name[1];
           $last_name = $full_name[2];
        } else if(isset($full_name[1]) && !empty($full_name[1])){
            $middle_name = '';
            $last_name = $full_name[1];
        } else {
            $middle_name = '';
            $last_name = '';
        }

        if(!empty($middle_name)) {
            return Employment::where('first_name','=',$first_name)->where('middle_name','=',$middle_name)->where('last_name','=',$last_name)->first();
        } else {
            return Employment::where('first_name','=',$first_name)->where('last_name','=',$last_name)->first();
        }

    }

    public function getEmployeeDetailByCode($data)
    {
        return Employment::where('employee_id','=',$data)->first();
    }

    public function getEmployeeByEmpID($emp_id){
        $result = Employment::select('id', 'employee_id', 'first_name', 'middle_name','last_name')->where('employee_id','=',$emp_id)->where('status', '=', '1')->first();
        return $result;
    }

    public function getLatestEmployeeID()
    {
        $result = Employment::latest('employee_id')->first();
        return $result;
    }

    public function checkEmailUnique($email)
    {
        return Employment::where('personal_email', $email)->exists();
    }

}
