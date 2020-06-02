<?php

namespace App\Modules\Dropdown\Entities;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $fillable = [
        
        'title',
        'slug'
    ];
    
    public function dropdownValue(){
        return $this->hasMany(Dropdown::class,'fid','id');
    }
}
