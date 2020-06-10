<?php

namespace App\Modules\CourseInfo\Entities;

use Illuminate\Database\Eloquent\Model;

class CourseModeOfDelivery extends Model
{
    protected $fillable = [

    	'course_info_id',
    	'delivery_title'

    ];
}
