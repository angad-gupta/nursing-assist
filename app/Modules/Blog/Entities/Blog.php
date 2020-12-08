<?php

namespace App\Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
	const FILE_PATH = '/uploads/blog/';

    protected $fillable = [

    	'title',
    	'sub_content',
    	'content',
    	'blog_image',
    	'status',
    	'date'

    ];

   	public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }

}
