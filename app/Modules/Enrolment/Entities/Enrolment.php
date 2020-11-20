<?php

namespace App\Modules\Enrolment\Entities;

use App\Modules\CourseInfo\Entities\CourseInfo;
use App\Modules\Student\Entities\Student;
use App\Modules\Agent\Entities\Agent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enrolment extends Model
{
    use SoftDeletes;
    
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
        'title',
        'first_name',
        'last_name',
        'street1',
        'street2',
        'city',
        'state',
        'postalcode',
        'agents',
        'country',
        'email',
        'phone',
        'intake_date',
        'payment_status',
        'payment_type',
        'status',
        'deleted_at'

    ];

    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }

    public function getIdFileFullPathAttribute()
    {
        return self::ID_PATH . $this->file_name;
    }

    public function Courseinfo()
    {
        return $this->belongsTo(CourseInfo::class, 'courseinfo_id', 'id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agents', 'id');
    }

    static function getDocumentById($enrolmentId){
         return Enrolment::where('id','=',$enrolmentId)->first();
    }

}
