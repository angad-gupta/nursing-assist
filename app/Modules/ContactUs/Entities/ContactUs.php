<?php

namespace App\Modules\ContactUs\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactUs extends Model
{
	use SoftDeletes;
	
    protected $table = 'contact_us';

    protected $fillable = [

        'first_name',
        'last_name',
        'email',
        'phone',
        'enquiry_about',
        'message',
        'status',
        'reply_message',

    ];
}
