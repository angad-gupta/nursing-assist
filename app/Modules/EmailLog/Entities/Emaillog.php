<?php

namespace App\Modules\EmailLog\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Student\Entities\Student;

class Emaillog extends Model
{
    protected $fillable = [

    	'action',
    	'student_id', 
    	'date'

    ];

    public function studentInfo()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

}
