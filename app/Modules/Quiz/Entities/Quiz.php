<?php

namespace App\Modules\Quiz\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\CourseContent\Entities\CourseContent;

class Quiz extends Model
{
    
    const FILE_PATH = '/uploads/quiz/';

    protected $fillable = [

    	'category',
        'quiz_section',
        'course_content_id',
        'set_for_demo',
    	'question',
        'additional_image',
    	'question_type', 
        'option_1',
        'option_2',
        'option_3',
        'option_4',
    	'correct_option',
        'correct_answer_reason',

    ];

    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }

    public function courseLessonInfo(){
        return $this->belongsTo(CourseContent::class,'course_content_id','id');
    }

}
