<?php

namespace App\Modules\Enrolment\Entities;

use Illuminate\Database\Eloquent\Model;

use App\Modules\Enrolment\Entities\Enrolment;


class EnrolPayment extends Model
{
	
    protected $table = 'enrolment_payment';
    protected $fillable = [

    	'enrolment_id',
    	'transactionID',
    	'totalAmount',
    	'tokenCustomerID',
    	'customer',
    	'shippingAddress',
        'sucess'
    
    ];

    

    public function enrolmentinfo(){
        return $this->belongsTo(Enrolment::class,'enrolment_id','id');
    }

   

}
