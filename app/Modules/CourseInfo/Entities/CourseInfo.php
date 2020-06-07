<?php

namespace App\Modules\CourseInfo\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\CourseInfo\Entities\CourseStructure;
use App\Modules\CourseInfo\Entities\CourseProgram;
use App\Modules\Course\Entities\Course;

class CourseInfo extends Model
{

	const FILE_PATH = '/uploads/courseInfo/';

    protected $fillable = [

    	'course_id',
    	'course_program_title',
    	'description',
    	'type',
    	'image_path',
    	'youtube_id'

    ];

    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }

     public function Course(){
        return $this->belongsTo(Course::class,'course_id','id');
    }

    public function CourseStructure()
    {
        return $this->hasMany(CourseStructure::class, 'course_info_id');
    }

    public function CourseProgramme()
    {
        return $this->hasMany(CourseProgram::class, 'course_info_id');
    }
}
