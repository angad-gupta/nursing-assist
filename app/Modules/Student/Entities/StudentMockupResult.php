<?php

namespace App\Modules\Student\Entities;

use App\Modules\Student\Entities\Student;
use Illuminate\Database\Eloquent\Model;

class StudentMockupResult extends Model
{
    protected $fillable = [

        'student_id',
        'date',
        'mockup_title',
        'total_question',
        'correct_answer',
        'percent',
        'start_time',
        'break_time',
        'end_time',

    ];

    public function studentInfo()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function histories()
    {
        return $this->hasMany(StudentMockupHistory::class, 'mockup_result_id', 'id');
    }

    public static function checkTestStatus($studentId, $title){
        return StudentMockupResult:: where('student_id','=',$studentId)->where('mockup_title','=',$title)->whereNull('total_question')->first();
    }
}
