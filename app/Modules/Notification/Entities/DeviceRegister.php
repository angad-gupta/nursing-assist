<?php

namespace App\Modules\Notification\Entities;

use Illuminate\Database\Eloquent\Model;

class DeviceRegister extends Model
{
    protected $fillable = [
        'device_id' ,
        'device_type' ,
        'user_id' ,
    ];

    public function setDeviceTypeAttribute($value)
    {
        $this->attributes['device_type'] = strtoupper($value);
    }


}
