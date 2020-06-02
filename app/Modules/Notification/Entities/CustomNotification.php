<?php

namespace App\Modules\Notification\Entities;

use Illuminate\Database\Eloquent\Model;

class CustomNotification extends Model
{
    const COVER_IMAGE_PATH = '/assets/uploads/notification/';
    protected $fillable = [
        'title',
        'intro_text',
        'image',
        'detail',
        'status'
    ];
}
