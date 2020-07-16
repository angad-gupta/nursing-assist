<?php

namespace App\Modules\Student\Entities;

use App\Modules\CourseInfo\Entities\CourseInfo;
use App\Modules\CourseContent\Entities\CourseContent;
use App\Modules\Student\Entities\Student;
use Illuminate\Database\Eloquent\Model;

class StudentQuizResult extends Model
{
    protected $fillable = [

        'student_id',
        'courseinfo_id',
        'course_content_id',
        'date',
        'total_question',
        'score',
        'percent',

    ];

    public function studentInfo()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function courseInfo()
    {
        return $this->belongsTo(CourseInfo::class, 'courseinfo_id', 'id');
    }

    public function courseContentInfo()
    {
        return $this->belongsTo(CourseContent::class, 'course_content_id', 'id');
    }
}
