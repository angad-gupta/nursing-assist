<?php

namespace App\Modules\CourseMaterial\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\CourseMaterial\Entities\CourseMaterialDetail;
use App\Modules\CourseInfo\Entities\CourseInfo;

class CourseMaterial extends Model
{
	const FILE_PATH = '/uploads/course_material/';

    protected $fillable = [

    	'course_info_id',
    	'material_title',
    	'short_content',
    	'description',
    	'material_image',
    	'image_fade_color',
    	'image_caption',
    	'image_icon'

    ];

   public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }

    public function CourseMaterialDetail()
    {
        return $this->hasMany(CourseMaterialDetail::class, 'couse_material_id');
    }

     public function courseInfo(){
        return $this->belongsTo(CourseInfo::class,'course_info_id','id');
    }

}
