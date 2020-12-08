<?php

namespace App\Modules\Video\Entities;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{

	const VIDEO_PATH = '/uploads/Video';

	const FILE_PATH = '/uploads/Video/thumbnail';

    protected $fillable = [

    	'video_title',
    	'short_content',
    	'content',
    	'thumbnail_image',
    	'is_youtube_image',
    	'youtube_id',
    	'video_path',
    	'status',
    	'date'

    ];

    public function getVideoFileFullPathAttribute()
    {
        return self::VIDEO_PATH . $this->file_name;
    }    

    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }
}
