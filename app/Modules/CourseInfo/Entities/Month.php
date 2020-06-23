<?php

namespace App\Modules\CourseInfo\Entities;

use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    protected $fillable = [

    	'name',
    	'code'
    ];
}
