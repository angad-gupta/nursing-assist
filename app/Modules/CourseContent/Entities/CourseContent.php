<?php

namespace App\Modules\CourseContent\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\CourseInfo\Entities\CourseInfo;
use App\Modules\CourseContent\Entities\CoursePlan;

class CourseContent extends Model
{
	const FILE_PATH = '/uploads/course/courseContent';

    protected $fillable = [

    	'course_info_id',
    	'main_topic',
    	'lesson_title',
    	'lesson_summary',
    	'content_type',
    	'content_path'

    ];

    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }


    public function Courseplan()
    {
        return $this->hasMany(CoursePlan::class, 'course_content_id');
    }

     public function courseInfo(){
        return $this->belongsTo(CourseInfo::class,'course_info_id','id');
    }

}
