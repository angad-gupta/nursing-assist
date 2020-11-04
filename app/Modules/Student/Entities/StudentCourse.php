<?php

namespace App\Modules\Student\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Student\Entities\Student;
use App\Modules\CourseInfo\Entities\CourseInfo;

class StudentCourse extends Model
{
    protected $fillable = [

    	'student_id',
        'courseinfo_id',
        'status'

    ];

    public function studentInfo(){
        return $this->belongsTo(Student::class,'student_id','id');
    }

    public function courseInfo(){
        return $this->belongsTo(CourseInfo::class,'courseinfo_id','id');
    }

    static function checkStudentCourses($student_id,$courseinfo_id){
        return StudentCourse::where('student_id', '=', $student_id)->where('courseinfo_id', '=', $courseinfo_id)->count();
    }
}
