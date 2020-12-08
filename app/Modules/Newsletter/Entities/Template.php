<?php

namespace App\Modules\Newsletter\Entities;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $fillable = [

    	'subject',
    	'message',
    	'status',
    	'send_all',
    	'date'

    ];
}
