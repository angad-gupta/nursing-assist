<?php

namespace App\Modules\Employment\Entities;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        
        'name',
        'code'
    ];
}
