<?php

namespace App\Modules\Student\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Mockup\Entities\Mockup;

class StudentMockupHistory extends Model
{
    protected $fillable = [

        'student_id',
    	'mockup_title',
    	'question_id',
    	'answer',
    	'is_correct_answer'

    ];

    public function mockupInfo(){
        return $this->belongsTo(Mockup::class,'question_id','id');
    }
}
