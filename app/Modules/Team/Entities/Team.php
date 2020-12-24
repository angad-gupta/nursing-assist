<?php

namespace App\Modules\Team\Entities;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
	const FILE_PATH = '/uploads/team/';

    protected $fillable = [

    	'member_name',
    	'profile_pic',
    	'designation',
        'about_me'

    ];

    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }
    
}
