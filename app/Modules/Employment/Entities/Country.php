<?php

namespace App\Modules\Employment\Entities;

use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    protected $fillable = [
        
        'name',
        'code'
    ];
}
