<?php

namespace App\Modules\Student\Entities;

use Illuminate\Database\Eloquent\Model;

class StudentReadinessResult extends Model
{
    protected $fillable = [

        'student_id',
        'date',
        'title',
        'total_question',
        'total_attempted_question',
        'correct_answer',
        'percent',
        'start_time',
        'break_time',
        'end_time',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public static function checkTestStatus($studentId, $title){
        return StudentReadinessResult:: where('student_id','=',$studentId)->where('title','=',$title)->whereNull('total_question')->first();
    }
}
