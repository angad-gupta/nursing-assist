<?php

namespace App\Modules\WhatOurStudentSay\Entities;

use Illuminate\Database\Eloquent\Model;

class WhatOurStudentSay extends Model
{

	const FILE_PATH = '/uploads/studentTestimonial/';

    protected $fillable = [

    	'profile_pic',
        'student_name',
    	'designation',
    	'message'

    ];

    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }
}
