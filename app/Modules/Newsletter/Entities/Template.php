<?php

namespace App\Modules\Newsletter\Entities;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{

const FILE_PATH = '/uploads/newsletter';

    protected $fillable = [

    	'subject',
    	'message',
    	'attached_pdf'
    	'status',
    	'send_all',
    	'date'

    ];

    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }

}
