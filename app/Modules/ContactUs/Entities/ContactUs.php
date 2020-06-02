<?php

namespace App\Modules\ContactUs\Entities;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{

	 protected $table = 'contact_us';

    protected $fillable = [

    	'first_name',
    	'last_name',
    	'email',
    	'phone',
    	'enquiry_about',
    	'message'

    ];
}
