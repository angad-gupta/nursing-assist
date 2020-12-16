<?php

namespace App\Modules\Resource\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resources extends Model
{
    use SoftDeletes;

    const FILE_PATH = '/uploads/resources/';

    protected $fillable = [
        'title',
        'description',
        'mime_type',
        'course_type',
        'source_name',
        'status',

    ];

    public function getFileFullPathAttribute()
    {
        return self::FILE_PATH . $this->file_name;
    }
}
