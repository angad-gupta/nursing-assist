<?php

namespace App\Modules\Student\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Student\Entities\Student;
use App\Modules\CourseInfo\Entities\CourseInfo;

class StudentQuizResult extends Model
{
    protected $fillable = [

    	'student_id',
    	'courseinfo_id',	
    	'date',
    	'total_question',
    	'score',
    	'percent'

    ];

        public function studentInfo(){
        return $this->belongsTo(Student::class,'student_id','id');
    }

    public function courseInfo(){
        return $this->belongsTo(CourseInfo::class,'courseinfo_id','id');
    }
}
