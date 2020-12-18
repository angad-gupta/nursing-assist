<?php

namespace App\Modules\Forum\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Forum\Entities\Forum;
use App\Modules\Student\Entities\Student;

class ForumComment extends Model
{
    protected $fillable = [

    	'forum_id',
    	'comment',
    	'commented_by',
    	'commented_date',
    	
    ];

    public function forumInfo()
    {
        return $this->belongsTo(Forum::class, 'forum_id', 'id');
    }

    public function commentStudentInfo(){
        return $this->belongsTo(Student::class,'commented_by','id');
    }

    public static function countComment($forum_id){
        return  ForumComment::where('forum_id','=',$forum_id)->count();
    }
}
