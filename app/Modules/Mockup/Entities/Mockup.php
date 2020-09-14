<?php

namespace App\Modules\Mockup\Entities;

use Illuminate\Database\Eloquent\Model;

class Mockup extends Model
{
    const FILE_PATH = '/uploads/mockup/';

    protected $fillable = [

    	'mockup_title',
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

      static function gettotalQuestion($mockup_title){ 
        return Mockup::where('mockup_title', '=', $mockup_title)->count();
    }
}
