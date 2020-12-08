<?php

namespace App\Modules\Gallery\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Gallery\Entities\AlbumPhoto;

class Album extends Model
{
	const FILE_PATH = '/uploads/Gallery';

    protected $fillable = [

    	'album_title',
    	'short_content',
    	'content',
    	'thumbnail_image',
    	'status',
    	'date'

    ];

    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }

    public function AlbumImage()
    {
        return $this->hasMany(AlbumPhoto::class, 'album_id');
    }

}
