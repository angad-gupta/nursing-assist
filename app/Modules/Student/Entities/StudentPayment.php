<?php

namespace App\Modules\Student\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Student\Entities\Student;
use App\Modules\CourseInfo\Entities\CourseInfo;

class StudentPayment extends Model
{
    protected $fillable = [

    	'student_id',
    	'courseinfo_id',
        'enrolment_payment_id',
        'status',
        'moved_to_student'

    ];

    public function studentInfo(){
        return $this->belongsTo(Student::class,'student_id','id');
    }

    public function courseInfo(){
        return $this->belongsTo(CourseInfo::class,'courseinfo_id','id');
    }

     public function enrolmentPaymentInfo(){
        return $this->belongsTo(EnrolPayment::class,'enrolment_payment_id','id');
    }

}
