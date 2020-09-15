<?php

namespace App\Modules\Message\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Student\Entities\Student;

class Message extends Model
{
    protected $fillable = [

    	'title',
    	'message',
    	'sent_by',
    	'status'

    ];

    public function MessageSent(){
        return $this->belongsTo(Student::class,'sent_by','id');
    }

}
