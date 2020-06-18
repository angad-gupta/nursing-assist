<?php

namespace App\Modules\CourseContent\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\CourseContent\Entities\CourseSubTopic;
use App\Modules\CourseContent\Entities\CourseContent;

class CoursePlan extends Model
{
	const FILE_PATH = '/uploads/course/coursePlan';

    protected $fillable = [

    	'course_content_id',
    	'course_session',
    	'plan_description',
    	'plan_type',
    	'plan_path'

    ];

    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }

    public function Coursesubtopic()
    {
        return $this->hasMany(CourseSubTopic::class, 'course_plan_id');
    }

    public function coursecontent(){
        return $this->belongsTo(CourseContent::class,'course_content_id','id');
    }


}
