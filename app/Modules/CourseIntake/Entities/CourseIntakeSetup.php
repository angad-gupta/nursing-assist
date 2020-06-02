<?php

namespace App\Modules\CourseIntake\Entities;

use Illuminate\Database\Eloquent\Model;

class CourseIntakeSetup extends Model
{
    protected $fillable = [

    	'course_intake_id',
    	'month',
    	'course_intake'

    ];
}
