<?php

namespace App\Modules\FAQ\Entities;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
	protected $table = 'f_a_qs';
    
    protected $fillable = [

    	'question',
    	'answer',
    	'status'
    ];
}
