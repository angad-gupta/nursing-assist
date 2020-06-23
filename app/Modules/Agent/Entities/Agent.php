<?php

namespace App\Modules\Agent\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Employment\Entities\Country;

class Agent extends Model
{
    const FILE_PATH = '/uploads/agent/';

    protected $fillable = [

    	'country',
    	'agent_name',
    	'contact_person',
    	'contact_number',
    	'email',
    	'address',
    	'agent_logo'

    ];

    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }

    public function CountryName(){
        return $this->belongsTo(Country::class,'country');
    }
}
