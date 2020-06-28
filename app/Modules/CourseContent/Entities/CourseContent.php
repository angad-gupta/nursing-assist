<?php

namespace App\Modules\CourseContent\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\CourseInfo\Entities\CourseInfo;
use App\Modules\CourseContent\Entities\CoursePlan;
use App\Modules\Syllabus\Entities\Syllabus;

class CourseContent extends Model
{
	const FILE_PATH = '/uploads/course/courseContent';

    protected $fillable = [

    	'course_info_id',
    	'syllabus_id',
    	'lesson_title',
    	'lesson_summary',
        'is_related_to_quiz',
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

    public function syllabus(){
        return $this->belongsTo(Syllabus::class,'syllabus_id','id');
    }

    static function gettotalsyllabus($couseinfoid){ 
        return CourseContent::where('course_info_id', '=', $couseinfoid)->groupBy('syllabus_id')->count();
    }

    static function gettotallesson($syllabus_id,$course_info_id){
        return CourseContent::where('syllabus_id', '=', $syllabus_id)->where('course_info_id', '=', $course_info_id)->count();
    }

}
