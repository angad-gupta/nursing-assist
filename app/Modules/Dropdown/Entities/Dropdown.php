<?php

namespace App\Modules\Dropdown\Entities;

use App\Modules\CallDirectory\Entities\CallDirectory;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Dropdown\Entities\Field;

class Dropdown extends Model
{
    protected $fillable = [
        
        'fid',
        'dropvalue',
    ];
    
     public function dropdownField(){
        return $this->belongsTo(Field::class,'fid');
    }

    public function contacts(){
         return $this->hasMany(CallDirectory::class,'contact_category','id');
    }
}
