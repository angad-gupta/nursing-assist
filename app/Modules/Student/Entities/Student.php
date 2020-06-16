<?php

namespace App\Modules\Student\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    const FILE_PATH = '/uploads/student/';

    protected $fillable = [

    	'username',
    	'password',
    	'email',
        'last_login',
    	'user_type',
    	'full_name',
    	'gender',
    	'dob',
    	'phone_no',
    	'primary_address',
    	'temporary_address',
    	'profile_pic',
    	'active',
    	'activation_code',
        'remember_token'

    ];

    protected $hidden =[
        'password',
        'activation_code',
        'last_login',
        'remember_token',
        'created_at',
        'updated_at'

    ];

        public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }

}
