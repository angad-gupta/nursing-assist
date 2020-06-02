<?php

namespace App\Modules\ReminderNotify\Entities;

use App\Modules\Employment\Entities\Employment;
use Illuminate\Database\Eloquent\Model;

class ReminderNotify extends Model
{
    protected $table="reminder_notifies";

    protected $fillable = [
        'title',
        'date',
        'employee_id',
        'display_type',
        'status',
        'snoooze_date',
        'reminder_type'
    ];

    CONST DISPLAYTYPE = [
        'Daily',
        'Weekly',
        'Monthly',
        'Yearly',
        'One Time'
    ];

    CONST REMINDERTYPE = [
        'Tender Deadline',
        'Bank Guarantee',
        'APG',
        'Insurance',
        'Vehicle Service',
        'Machine Service',
        'Personal',
        'Follow Up',
        'Birthday',
        'Join Date',
        'Tender Meeting'
    ];

    protected $appends = ['display_type_name', 'reminder_type_name'];

    public function employee()
    {
        return $this->belongsTo(Employment::class,'employee_id','id');
    }

    public function getDisplayTypeNameAttribute()
    {
        return self::DISPLAYTYPE[$this->display_type];
    }

    public function getReminderTypeNameAttribute()
    {
        return self::REMINDERTYPE[$this->reminder_type];
    }
}
