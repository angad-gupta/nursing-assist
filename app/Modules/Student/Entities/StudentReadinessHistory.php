<?php

namespace App\Modules\Student\Entities;

use App\Modules\Readiness\Entities\Readiness;
use Illuminate\Database\Eloquent\Model;

class StudentReadinessHistory extends Model
{
    protected $fillable = [
        
        'readiness_result_id',
        'student_id',
        'title',
        'question_id',
        'answer',
        'is_correct_answer',
    ];

    public function readiness() 
    {
        return $this->belongsTo(Readiness::class, 'question_id', 'id');
    }
}
 