<?php

namespace App\Modules\Student\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Student\Entities\Student;
use App\Modules\CourseInfo\Entities\CourseInfo;
use App\Modules\Quiz\Entities\Quiz;

class StudentQuizHistory extends Model
{
    protected $fillable = [

    	'student_id',
    	'courseinfo_id',
    	'quiz_id',
    	'answer',
    	'is_correct_answer'

    ];

    public function studentInfo(){
        return $this->belongsTo(Student::class,'student_id','id');
    }

    public function courseInfo(){
        return $this->belongsTo(CourseInfo::class,'courseinfo_id','id');
    }

    public function quizInfo(){
        return $this->belongsTo(Quiz::class,'quiz_id','id');
    }
}
