<?php

namespace App\Modules\Forum\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Forum\Entities\ForumComment;
use App\Modules\Student\Entities\Student;

class Forum extends Model
{
    protected $fillable = [

    	'forum_title',
    	'forum_description',
    	'posted_by',
    	'posted_date',
    	'is_top_topic',
    	'is_featured_topic'

    ];

    public function ForumComment()
    {
        return $this->hasMany(ForumComment::class, 'forum_id');
    }

    public function studentInfo(){
        return $this->belongsTo(Student::class,'posted_by','id');
    }

}
