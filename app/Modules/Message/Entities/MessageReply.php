<?php

namespace App\Modules\Message\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Student\Entities\Student;
use App\Modules\Message\Entities\Message;

class MessageReply extends Model
{
    protected $fillable = [

    	'message_id',
    	'title',
    	'message',
    	'sent_to'

    ];

    public function Message(){
        return $this->belongsTo(Message::class,'message_id','id');
    }   

     public function MessageSentTo(){
        return $this->belongsTo(Student::class,'sent_to','id');
    }
}
