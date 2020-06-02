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

        'permanent_address',
        'province_no',
        'district',
        'suburb',
        'ward_no',
        'contact_no1',
        'contact_no2',
        'phone1',
        'phone2',
        'email',
        'facebook_link',
        'instagram_link',
        'linkin_link',
        'twitter_link',
        'software_type',

        'pf',
        'gratuity',
        'ssf',
        'ssf_tax',
        'currency',
        'basic_salary_percentage',
        'bank_account1',
        'bank_account2',
        'bank_name1',
        'bank_name2',

        'softwaretype_title',
//        'constructiontitle',
//        'salestitle',

        'general_ot_rate',
        'normal_holiday_ot_rate',
        'special_holiday_ot_rate',
    ];
    protected $appends = ['full_address'];

    public function getFullAddressAttribute()
    {
        return $this->province_no.", ".$this->district." ".$this->suburb.",".$this->ward_no;
    }

    public function getCurrency()
    {
        return $this->belongsTo(Dropdown::class, 'currency');
    }

    const FILE_PATH = '/uploads/setting/';
}
