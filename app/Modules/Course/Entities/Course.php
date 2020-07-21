<?php

namespace App\Modules\Course\Entities;

use Illuminate\Database\Eloquent\Model;


class Course extends Model
{
	const FILE_PATH = '/uploads/course/';

    protected $fillable = [

    	'title',
        'title_of_training',
        'course_duration',
        'mode_of_delivery',
        'intake_dates',
        'course_fees',
 		'short_content',
    	'description',
        'enrollment_process',
        'important_course',
        'image',
        'status'

    ];

    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }

    public static function GetAllCourses(){
           return Course::pluck('title', 'id');
    }

}
