<?php

namespace App\Modules\Newsletter\Entities;

use Illuminate\Database\Eloquent\Model;

class TemplateTo extends Model
{
    protected $fillable = [

    	'template_id',
    	'student_id'

    ];
}
