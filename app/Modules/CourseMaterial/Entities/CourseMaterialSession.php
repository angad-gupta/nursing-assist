<?php

namespace App\Modules\CourseMaterial\Entities;

use Illuminate\Database\Eloquent\Model;

class CourseMaterialSession extends Model
{
    protected $fillable = [

    	'course_material_detail_id',
    	'session_title',
    	'session_content'
    ];
    
}
