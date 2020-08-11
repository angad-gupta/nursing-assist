<?php

namespace App\Modules\Student\Entities;

use Illuminate\Database\Eloquent\Model;

class StudentPaymentInstallment extends Model
{
    protected $fillable = [
        'student_payment_id',
        'enrolment_payment_id',
        'installment_amt',
        'status'
    ];
}
