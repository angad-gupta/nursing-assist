<?php

namespace App\Modules\Student\Entities;

use Illuminate\Database\Eloquent\Model;

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
}
