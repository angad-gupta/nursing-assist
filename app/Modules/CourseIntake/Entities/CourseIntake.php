<?php

namespace App\Modules\CourseIntake\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Course\Entities\Course;
use App\Modules\CourseInfo\Entities\CourseInfo;
use App\Modules\CourseIntake\Entities\CourseIntakeSetup;

class CourseIntake extends Model
{
    protected $fillable = [

    	'course_id',
    	'course_info_id',
    	'year'

    ];


    public function Course(){
        return $this->belongsTo(Course::class,'course_id','id');
    }
    
    public function CourseInfo(){
        return $this->belongsTo(CourseInfo::class,'course_info_id','id');
    }

    public function CourseIntakesetup()
    {
        return $this->hasMany(CourseIntakeSetup::class, 'course_intake_id');
    }

}
