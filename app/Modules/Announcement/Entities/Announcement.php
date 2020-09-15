<?php

namespace App\Modules\Announcement\Entities;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [

    	'title',
    	'intake_date',
    	'content'

    ];
}
