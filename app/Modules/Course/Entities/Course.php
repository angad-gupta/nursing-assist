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
    	'image'

    ];

    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }

}
