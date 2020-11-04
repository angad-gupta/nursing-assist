<?php

namespace App\Modules\Student\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Student\Entities\StudentPayment;

class StudentPaymentHistory extends Model
{
    protected $fillable = [

    	'student_payment_id',
    	'amount_paid',
    	'date'
    ];


    public function studentPaymentInfo()
    {
        return $this->belongsTo(StudentPayment::class, 'student_payment_id', 'id');
    }
}
