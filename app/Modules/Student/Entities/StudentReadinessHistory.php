<?php

namespace App\Modules\Student\Entities;

use Illuminate\Database\Eloquent\Model;

class StudentReadinessHistory extends Model
{
    protected $fillable = [
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
