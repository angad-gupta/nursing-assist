<?php

namespace App\Modules\Student\Entities;

use App\Modules\CourseInfo\Entities\CourseInfo;
use App\Modules\Student\Entities\Student;
use App\Modules\Enrolment\Entities\Enrolment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudentPayment extends Model
{
    use SoftDeletes;

    protected $fillable = [

        'student_id',
        'courseinfo_id',
        'enrolment_id',
        'enrolment_payment_id',
        'status',
        'moved_to_student',
        'total_course_fee',
        'amount_paid',
        'amount_left',
        'moved_date',
        'course_start_date',
        'final_installment_date'
    ];

    public function studentInfo()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function courseInfo()
    {
        return $this->belongsTo(CourseInfo::class, 'courseinfo_id', 'id');
    }

    public function enrolmentPaymentInfo()
    {
        return $this->belongsTo(EnrolPayment::class, 'enrolment_payment_id', 'id');
    }

    public function enrolmentInfo()
    {
        return $this->belongsTo(Enrolment::class, 'enrolment_id', 'id');
    }

}
