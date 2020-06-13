<?php

namespace App\Modules\CourseMaterial\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\CourseMaterial\Entities\DailyMaterialPlanDetail;
use App\Modules\CourseMaterial\Entities\CourseMaterialDetail;

class DailyMaterialPlan extends Model
{
    protected $fillable = [

    	'course_material_detail_id',
    	'plan_title',
    	'plan_description'

    ];

    public function coursematerialdetail(){
        return $this->belongsTo(CourseMaterialDetail::class,'course_material_detail_id','id');
    }


    public function DailyMaterialPlanDetail()
    {
        return $this->hasMany(DailyMaterialPlanDetail::class, 'daily_material_plan_id');
    }
}
