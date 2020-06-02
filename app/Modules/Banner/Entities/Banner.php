<?php

namespace App\Modules\Banner\Entities;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
	const FILE_PATH = '/uploads/banner/';

    protected $fillable = [

    	'title',
    	'banner',
    	'status'

    ];

    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }
    
}
