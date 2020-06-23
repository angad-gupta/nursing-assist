<?php

namespace App\Modules\CourseMaterial\Entities;

use Illuminate\Database\Eloquent\Model;

class DailyMaterialPlanDetail extends Model
{

	const FILE_PATH = '/uploads/material_plan/';

    protected $fillable = [

    	'daily_material_plan_id',
    	'subject_title',
    	'topic_type',
    	'video_id',
    	'pdf_path'

    ];

    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }
}
