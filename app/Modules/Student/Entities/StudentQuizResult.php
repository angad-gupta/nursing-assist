<?php

namespace App\Modules\Student\Entities;

use Illuminate\Database\Eloquent\Model;

class StudentQuizResult extends Model
{
    protected $fillable = [

    	'student_id',
    	'quiz_id',
    	'courseinfo_id',	
    	'date',
    	'score',
    	'remark'

    ];
}
