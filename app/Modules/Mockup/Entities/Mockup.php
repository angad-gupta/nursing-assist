<?php

namespace App\Modules\Mockup\Entities;

use Illuminate\Database\Eloquent\Model;

class Mockup extends Model
{
    protected $fillable = [

    	'mockup_title',
    	'question',
    	'question_type', 
        'option_1',
        'option_2',
        'option_3',
        'option_4',
    	'correct_option',

    ];
}
