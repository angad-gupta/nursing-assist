<?php

namespace App\Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Dropdown\Entities\Dropdown;

class Setting extends Model
{
    protected $fillable = [

        'main_navbar_color',
        'secondary_navbar_color',
        'page_header_color',

        'company_name',
        'company_logo',
        'website',
        'company_copyright',
        'company_email',

        'contact_no1',
        'contact_no2',
        'address1',
        'address2',
        'accounts_email',
        'admission_email',
        'information_email',
        'skype',

        'facebook_link',
        'instagram_link',
        'linkin_link',
        'twitter_link',
        'youtube_link'
    ];

    const FILE_PATH = '/uploads/setting/';

    public static function getSetting(){
          return Setting::find(1);
    }
}
