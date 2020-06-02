<?php

namespace App\Modules\CourseInfo\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\CourseInfo\Entities\CourseInfoFeature;
use App\Modules\Course\Entities\Course;

class CourseInfo extends Model
{

	const FILE_PATH = '/uploads/courseInfo/';

    protected $fillable = [

    	'course_id',
    	'title',
    	'description',
    	'type',
    	'image_path',
    	'youtube_id',
    	'tuition_fee'

    ];

    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }

     public function Course(){
        return $this->belongsTo(Course::class,'course_id','id');
    }

    public function CourseFeatures()
    {
        return $this->hasMany(CourseInfoFeature::class, 'courseInfo_id');
    }
}
