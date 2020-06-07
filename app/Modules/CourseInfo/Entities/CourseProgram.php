<?php

namespace App\Modules\CourseInfo\Entities;

use Illuminate\Database\Eloquent\Model;

class CourseProgram extends Model
{
    protected $fillable = [

    	'course_info_id',
    	'program_detail_title'
    ];
}
