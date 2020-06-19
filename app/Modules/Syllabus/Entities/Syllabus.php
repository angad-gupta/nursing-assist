<?php

namespace App\Modules\Syllabus\Entities;

use Illuminate\Database\Eloquent\Model;

class Syllabus extends Model
{
    protected $fillable = [

    	'course_info_id',
    	'syllabus_title',
    	'syllabus_description'
    	
    ];
}
