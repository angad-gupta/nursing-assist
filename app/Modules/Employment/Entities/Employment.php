<?php

namespace App\Modules\Employment\Entities;

use App\Modules\Employment\Entities\Country;
use App\Modules\User\Entities\User;
use App\Modules\Dropdown\Entities\Dropdown;

use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    
    const FILE_PATH = '/uploads/employee/';
    const CITIZEN_PATH = '/uploads/employee/citizen/';
    const DOC_PATH = '/uploads/employee/document/';
    
    protected $fillable = [

        'employee_id',
        'first_name',
        'middle_name',
        'last_name',
        'profile_pic',
        'citizen_pic',
        'cv_pic',
        'phone',
        'mobile',
        'mobile_2',
        'address',
        'country_id',
        'designation_id',
        'department_id',
        'join_date',
        'nepali_join_date',
        'personal_email',
        'gender',
        'dob',
        'blood_group',
        'religion',
        'cast_ethnic',
        'salutation_title',
        'martial_status',
        'status',
        'is_user_access',
        'is_parent_link',   
        'archive_reason',
        'other_allowance',
        'daily_allowance',
        'salary',
        'pan_no',
        'ss_no'
        
    ];

    protected $hidden =[
        'created_at',
        'updated_at'
    ];
    
    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }
    
    public function bloodtype(){
        return $this->belongsTo(Dropdown::class,'blood_group','id');
    }
    public function religiontype(){
        return $this->belongsTo(Dropdown::class,'religion','id');
    }
    public function ethnic(){
        return $this->belongsTo(Dropdown::class,'cast_ethnic','id');
    }

    public function designation(){
        return $this->belongsTo(Dropdown::class,'designation_id');
    }
    
    public function dropdownField(){
        return $this->belongsTo(Dropdown::class,'branch_location');
    }
    
    public function department(){
        return $this->belongsTo(Dropdown::class,'department_id');
    }
    
    public function country(){
        return $this->belongsTo(Country::class,'country_id');
    }
    
     public static function getHeadDept(){
        return User::where('user_type','!=','super_admin')->get();
    }

    public function getUser(){
        return $this->hasOne(User::class,'emp_id');
    }
    
    public static function getUserInfoByEmp($emp_id){
        return User::where('emp_id','=',$emp_id)->first();
    }

}
