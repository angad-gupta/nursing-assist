<?php

namespace App\Modules\Quiz\Entities;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [

    	'category',
    	'question',
    	'question_type',
        'option_1',
        'option_2',
        'option_3',
        'option_4',
    	'correct_option'

    ];


}
