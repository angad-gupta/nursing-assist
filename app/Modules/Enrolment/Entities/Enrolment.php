<?php

namespace App\Modules\Enrolment\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\CourseInfo\Entities\CourseInfo;
use App\Modules\Student\Entities\Student;


class Enrolment extends Model
{
	const FILE_PATH = '/uploads/eligible_document/';
	const ID_PATH = '/uploads/student/identity_document/';

    protected $fillable = [

    	'student_id',
    	'courseinfo_id',
    	'is_eligible_mcq_osce',
    	'is_eligible_att',
    	'is_eligible_letter_ahpra',
    	'eligible_document',

    	'is_id',
    	'identity_document',

    	'company_name',
    	'email',
    	'contact_number',
    	'country',
    	'message',
    	
    	'payment_status'
    
    ];

    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }

    public function getIdFileFullPathAttribute()
    {
        return self::ID_PATH . $this->file_name;
    }

    public function Courseinfo(){
        return $this->belongsTo(CourseInfo::class,'courseinfo_id','id');
    }

    public function student(){
        return $this->belongsTo(Student::class,'student_id','id');
    }

}
