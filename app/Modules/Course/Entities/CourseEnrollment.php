<?php

namespace App\Modules\Course\Entities;

use Illuminate\Database\Eloquent\Model;

class CourseEnrollment extends Model
{
    protected $fillable = [

    	'course_id',
    	'enrol_title',
    	'course_fee',
    	'payment_mode'

    ];
}
