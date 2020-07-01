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
        'correct_answer_reason'

    ];

      static function gettotalQuestion($mockup_title){ 
        return Mockup::where('mockup_title', '=', $mockup_title)->count();
    }
}
