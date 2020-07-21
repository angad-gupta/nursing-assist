<?php

namespace App\Modules\CourseInfo\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\CourseInfo\Entities\CourseStructure;
use App\Modules\CourseInfo\Entities\CourseModeOfDelivery;
use App\Modules\CourseInfo\Entities\CourseIntake;
use App\Modules\Course\Entities\Course;

class CourseInfo extends Model
{

	const FILE_PATH = '/uploads/courseInfo/';

    protected $fillable = [

    	'course_id',
    	'course_program_title',
        'course_program_sub_title',
        'course_duration_period',
        'is_course_package',
        'course_intake_title',
    	'short_content',
        'description',
    	'type',
    	'image_path',
    	'youtube_id',
        'enrol_title',
        'course_fee',
        'payment_mode',
        'students_per_intake',
        'status'

    ];

    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }

     public function Course(){
        return $this->belongsTo(Course::class,'course_id','id');
    }

    public function CourseStructure()
    {
        return $this->hasMany(CourseStructure::class, 'course_info_id');
    }

    public function CourseModeOfDelivery()
    {
        return $this->hasMany(CourseModeOfDelivery::class, 'course_info_id');
    } 

    public function courseIntake()
    {
        return $this->hasMany(CourseIntake::class, 'course_info_id');
    }
}


