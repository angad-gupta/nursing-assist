<?php

namespace App\Modules\Readiness\Entities;

use Illuminate\Database\Eloquent\Model;

class Readiness extends Model
{
	const FILE_PATH = '/uploads/readiness/';

    protected $fillable = [

    	'readiness_title',
    	'question',
        'additional_image',
    	'question_type', 
        'option_1',
        'option_2',
        'option_3',
        'option_4',
    	'correct_option', 
        'correct_answer_reason'

    ];

        public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }

      static function gettotalQuestion($readiness_title){ 
        return Readiness::where('readiness_title', '=', $readiness_title)->count();
    }

}
