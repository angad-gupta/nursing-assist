<?php

namespace App\Modules\Gallery\Entities;

use Illuminate\Database\Eloquent\Model;

class AlbumPhoto extends Model
{
	const FILE_PATH = '/uploads/Gallery/Album';

    protected $fillable = [

    	'album_id',
    	'image_path'
    ];
}
