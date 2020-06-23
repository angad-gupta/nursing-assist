<?php

namespace App\Modules\Reminder\Entities;

use Carbon\Carbon;
use App\Modules\User\Entities\User;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Dropdown\Entities\Field;
use App\Modules\Dropdown\Entities\dropdown;

class Reminder extends Model
{
    protected $fillable = [
        'title',
        'reminder_type',
        'note',
        'additional_notes',
        'remind_date',
        'is_remind_range',
        'remind_from',
        'remind_to',
        'remind_before',
        'repeat_type',
        'next_repeat_date',
        'priority',
        'created_by',
        'status',
    ];

    CONST PRIORITY = [
        'Low',
        'Medium',
        'High'
    ];

    CONST REPEATTYPE = [
        'Daily',
        'Weekly',
        'Monthly',
        'Yearly'
    ]; 


    CONST PRIORITYCLASS = [
        'badge badge-warning',
        'badge badge-success',
        'badge badge-danger'
    ];

    protected $appends = ['priority_name', 'priority_class'];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getPriorityNameAttribute()
    {
        return self::PRIORITY[$this->priority];
    }

    public function getPriorityClassAttribute()
    {
        return self::PRIORITYCLASS[$this->priority];
    }

    public function reminderType()
    {
        return $this->belongsTo(dropdown::class, 'reminder_type');
    }

    public function repeatType()
    {
        return self::REPEATTYPE[$this->repeat_type];
    }
}