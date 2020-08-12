<?php

namespace App\Modules\Student\Entities;

use Illuminate\Notifications\Notifiable;
use App\Modules\Enrolment\Entities\Enrolment;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\StudentResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Authenticatable implements CanResetPassword
{
    use Notifiable;

    use SoftDeletes;
    
    const FILE_PATH = '/uploads/student/';

    protected $fillable = [

        'username',
        'password',
        'email',
        'last_login',
        'user_type',
        'full_name',
        'gender',
        'dob',
        'phone_no',
        'primary_address',
        'temporary_address',
        'profile_pic',
        'active',
        'activation_code',
        'remember_token',

    ];

    protected $hidden = [
        'password',
        'activation_code',
        'last_login',
        'remember_token',
        'created_at',
        'updated_at',

    ];

    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }

    public function enrolments()
    {
        return $this->hasMany(Enrolment::class, 'student_id');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new StudentResetPassword($token));
    }
}
