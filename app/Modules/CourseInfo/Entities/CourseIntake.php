<?php

namespace App\Modules\CourseInfo\Entities;

use App\Modules\CourseInfo\Entities\Month;
use Illuminate\Database\Eloquent\Model;

class CourseIntake extends Model
{
    protected $fillable = [

        'course_info_id',
        'month_id',
        'intake_date',

    ];

    public function month()
    {
        return $this->belongsTo(Month::class, 'month_id');
    }
}
