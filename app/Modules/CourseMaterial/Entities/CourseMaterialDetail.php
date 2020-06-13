<?php

namespace App\Modules\CourseMaterial\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\CourseMaterial\Entities\CourseMaterialSession;
use App\Modules\CourseMaterial\Entities\CourseMaterial;

class CourseMaterialDetail extends Model
{
    protected $fillable = [

    	'couse_material_id',
    	'material_topic',
    	'course_schedule',
    	'topic_summary'

    ];

    public function courseMaterial(){
        return $this->belongsTo(CourseMaterial::class,'couse_material_id','id');
    }

    public function coursematerialsession()
    {
        return $this->hasMany(CourseMaterialSession::class, 'course_material_detail_id');
    }
    
}
