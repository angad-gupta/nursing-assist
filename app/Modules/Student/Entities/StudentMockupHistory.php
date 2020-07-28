<?php

namespace App\Modules\Student\Entities;

use App\Modules\Mockup\Entities\Mockup;
use Illuminate\Database\Eloquent\Model;

class StudentMockupHistory extends Model
{
    protected $fillable = [

        'student_id',
        'mockup_title',
        'question_id',
        'answer',
        'is_correct_answer',

    ];

    public function mockupInfo()
    {
        return $this->belongsTo(Mockup::class, 'question_id', 'id');
    }
}
