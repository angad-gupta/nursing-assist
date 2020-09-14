<?php

namespace App\Modules\Quiz\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\CourseContent\Entities\CourseContent;

class Quiz extends Model
{
    protected $fillable = [

    	'category',
        'quiz_section',
        'course_content_id',
        'set_for_demo',
    	'question',
    	'question_type', 
        'option_1',
        'option_2',
        'option_3',
        'option_4',
    	'correct_option',
        'correct_answer_reason',

    ];


    public function courseLessonInfo(){
        return $this->belongsTo(CourseContent::class,'course_content_id','id');
    }

}
