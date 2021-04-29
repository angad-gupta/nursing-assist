
{{-- NCLEX TEMPLATE --}}
@if($courseinfo_id == 1)
 from NCLEX

 {{-- OSCE TEMPLATE --}}
@elseif($courseinfo_id == 2)
from OSCE

 {{-- OBA TEMPLATE --}}
@elseif($courseinfo_id == 4)
from OBA


@else

<div class="email-wrap" style="width: 1050px;min-height:600px;margin:15px auto;background: #dedede;">
    <div class="email-box" style="width: 700px;min-height:600px;margin:auto;display:block;background: #ffff;">
        <div class="logo" style="background:#fff">
            <img src="{{asset('home/img/logo.png')}}" width="150" alt="" style="margin: 15px;">
        </div>
        <p style="font-family: sans-serif;padding-left: 20px;padding-top: 20px;font-weight:400;text-align:left;margin:0;font-size: 20px;">Dear {{$name}}</p>
        <p style="text-align: center;font-family: sans-serif;width: 500px;margin: auto;padding-top: 20px;font-size: 14px;">Thank you for your application for the OBA Class Preparation.</p>



        <p style="font-family: sans-serif;padding-top: 20px;text-align: justify;font-size: 14px;padding-left: 20px;">Our admission team will now check your attached documents in order to progress with your enrolment.<br>Please allow 1-2 days to complete the process. <br>For the meantime, we invite you to watch a recording of the OBA Preparation Class Information via this link below:</p>

        <p style="font-family: sans-serif;padding-top: 20px;font-size: 14px;padding-left: 20px;">https://zoom.us/rec/share/y_UyNKP10kpLcrPWslvnRbUjPLa1aaa82iIb-
PsEz0koVzAQjdyMwSnV6FzdUq2H</p>

        <p style="font-family: sans-serif;padding-top: 20px;font-size: 14px;padding-left: 20px;">Password: 4x#Y1ZW#<br><br>
        We would also like you to follow us on Facebook for the latest and up to date information regarding the OBA Preparation Class.</a></p>
        <p style="font-family: sans-serif;padding-top: 20px;font-size: 14px;padding-left: 20px;">Once again, thank you for choosing Nursing Education and Training Australia.</p>

        <div class="detail" style="margin-bottom: 30px;display:flow-root;clear:both;background:#b30174;color:#fff;padding:20px 0px 10px">
            <div class="lft" style="float:left">
                <p style="text-align: left;font-family: sans-serif;margin-left: 15px;font-size: 14px;font-weight: 600;margin-bottom: 5px;">Kind Regards,</p>
                <span style="text-align: left;font-family: sans-serif;margin-left: 15px;font-size: 14px;">The Team at NETA</span>
                <a href="mailto:info@nursingeta.com" style="display:block;font-family: sans-serif;padding-left: 15px;padding-top:5px;color:#fff">info@nursingeta.com</a>
                <a href="www.nursingeta.com" style="display:block;font-family: sans-serif;padding-left: 15px;padding-top:5px;color:#fff">www.nursingeta.com</a>
            </div>

            <div class="lft" style="float:right;padding-right:15px">
                <p style="text-align: left;font-family: sans-serif;margin-left: 15px;font-size: 14px;font-weight: 600;margin-bottom: 5px;">Contact Details</p>
                <span style="text-align: left;font-family: sans-serif;margin-left: 15px;font-size: 14px;">+61 432 430 170</span>
                
            </div>
        </div>

        <p style="text-align: center;font-family: sans-serif;margin-left: 15px;font-size: 12px;padding: 15px 0;">© Nursingeta {{ date('Y') }} All rights reserved | <a href="www.nursingeta.com">nursingeta.com</a> |</p>


    </div>
</div>

@endif