<?php

namespace App\Modules\CourseContent\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\CourseContent\Entities\CoursePlan;

class CourseSubTopic extends Model
{
	const FILE_PATH = '/uploads/course/courseSubTopic';

    protected $fillable = [

    	'course_plan_id',
    	'sub_topic_title',
    	'sub_topic_description',
    	'sub_topic_type',
    	'sub_topic_path'

    ];

    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }
    
    public function courseplan(){
        return $this->belongsTo(CoursePlan::class,'course_plan_id','id');
    }

    static function getAllSubtopic($planid){
        return CourseSubTopic::where('course_plan_id', '=', $planid)->orderBy('id','ASC')->get();
    }

}
