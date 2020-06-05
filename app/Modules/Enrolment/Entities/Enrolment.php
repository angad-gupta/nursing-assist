<?php

namespace App\Modules\Enrolment\Entities;

use Illuminate\Database\Eloquent\Model;

class Enrolment extends Model
{
    protected $fillable = [

    	'company_name',
    	'email',
    	'contact_number',
    	'country',
    	'intake_date'
    ];
}
