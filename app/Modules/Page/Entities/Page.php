<?php

namespace App\Modules\Page\Entities;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

	const FILE_PATH = '/uploads/page/';

    protected $fillable = [

    	'title',
        'short_content',
    	'slug',
    	'image',
    	'description',
        'youtube_id'

    ];

    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }
}
