<?php

namespace App\Modules\Student\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Student\Entities\Student;

class StudentMockupResult extends Model
{
    protected $fillable = [

    	'student_id',
    	'date',
    	'mockup_title',
    	'total_question',
    	'correct_answer',
    	'percent'

    ];

      public function studentInfo(){
        return $this->belongsTo(Student::class,'student_id','id');
    }
}
