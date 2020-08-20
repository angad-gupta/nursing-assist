<?php

namespace App\Modules\Student\Entities;

use App\Modules\Mockup\Entities\Mockup;
use Illuminate\Database\Eloquent\Model;

class StudentPracticeHistory extends Model
{
    protected $fillable = [
        'practice_result_id',
        'student_id',
        'title',
        'question_id',
        'answer',
        'is_correct_answer',
    ];

    public function mockup()
    {
        return $this->belongsTo(Mockup::class, 'question_id', 'id');
    }
}
