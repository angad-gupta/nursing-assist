<?php

namespace App\Modules\Course\Entities;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
	const FILE_PATH = '/uploads/course/';

    protected $fillable = [

    	'title',
 		'short_content',
    	'description',
        'course_duration',
        'mode_of_delivery',
        'course_information',
        'important_course',
        'tuition_fee',
    	'image'

    ];

    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }

}
