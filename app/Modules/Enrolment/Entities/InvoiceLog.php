<?php

namespace App\Modules\Enrolment\Entities;

use Illuminate\Database\Eloquent\Model;

class InvoiceLog extends Model
{
    protected $fillable = [
        'enrolment_id',
        'student_id',
        'full_name',
        'subject',
        'description',
        'redirect_url',
        'end_line',
        'invoice_file',
        'mail_success',
        
    ];
}
