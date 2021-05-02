
{{-- NCLEX TEMPLATE --}}
@if($courseinfo_id == 1)
<div class="email-wrap" style="width: 1050px;min-height:600px;margin:15px auto;">
    <div class="email-box" style="width: 700px;min-height:600px;margin:auto;display:block;">
        <div class="logo" style="">
            <img src="{{asset('home/img/logo.png')}}" width="150" alt="" style="margin: 15px;">
        </div>
        <p style="color:black;font-family: sans-serif;padding-left: 20px;padding-top: 20px;font-weight:400;text-align:left;margin:0;font-size: 20px;">Dear {{$name}}</p>
        
        <p style="color:black;font-family: sans-serif;padding-top: 20px;text-align: justify;font-size: 14px;padding-left: 20px; padding-right:20px;">Thank you for your application for enrolment with Nursing Education & Training Australia (NETA) – NCLEX Preparation Course. Our admissions team will now verify your documents. This may take 2-3 business days to process. The outcome of your application for enrolment will be sent to you by email, <strong>hence it is essential that you regularly check your inbox or spam folder</strong>.</p>

        <p style="color:black;font-family: sans-serif;padding-top: 20px;text-align: justify;font-size: 14px;padding-left: 20px; padding-right:20px;">If you would like to keep yourself updated with NETA’s program, test taker’s testimonies, information sessions on different nursing topics and more, you are invited to follow us on <a href="#">Facebook</a> and <a href="#">Instagram</a>. You can also view more information in our website at <a href="www.nursingeta.com">www.nursingeta.com</a></p>
        
        <p style="color:black;font-family: sans-serif;padding-top: 20px;font-size: 14px; padding-left: 20px; padding-right:20px;">If you would like to speak to our team, please see our contact details below. </p>
        
        <div class="detail" style="margin-bottom: 30px;display:flow-root;clear:both;background:#b30174;color:#fff;padding:20px 0px 10px;font-weight:600;">
            <div class="lft" style="float:left">
                <p style="text-align: left;font-family: sans-serif;margin-left: 15px;font-size: 14px;font-weight: 400;margin-bottom: 5px;">Kind Regards,<br/><br/>
                <span style="text-align: left;font-weight:400; font-family: sans-serif;font-size: 14px;">Nursing Education & Training Australia (NETA)<br/><br/>
                    Sydney Office: Suite 605, Level 6, 379-383 Pitt Street, Sydney NSW 2000<br/>
                    Melbourne: 208/430 Little Collins Street, Melbourne VIC 3000<br/>
                    Wagga Wagga Office: Suite 4, 63 Baylis Street, Wagga Wagga NSW 2650<br/>
                    General enquiries: <a href="mailto:info@nursingeta.com" style="color:#fff;">info@nursingeta.com</a> | <a href="www.nursingeta.com" style="color:#fff;">www.nursingeta.com</a><br/>
                    P:1300 00 6382 | M: 0432 430 170                
                </span></p>
            </div>
        </div>
        <p style="text-align: center;font-family: sans-serif; margin-left: 15px;font-size: 12px;padding: 15px 0;">© Nursingeta {{ date('Y') }} All rights reserved | <a href="www.nursingeta.com">www.nursingeta.com</a> |</p>
    </div>
</div>


 {{-- OSCE TEMPLATE --}}
@elseif($courseinfo_id == 2)
<div class="email-wrap" style="width: 1050px;min-height:600px;margin:15px auto;">
    <div class="email-box" style="width: 700px;min-height:600px;margin:auto;display:block;">
        <div class="logo">
            <img src="{{asset('home/img/logo.png')}}" width="150" alt="" style="margin: 15px;">
        </div>
        <p style="color:black;font-family: sans-serif;padding-left: 20px;padding-top: 20px;font-weight:400;text-align:left;margin:0;font-size: 20px;">Dear {{$name}}</p>

        <p style="color:black;font-family: sans-serif;padding-top: 20px;text-align: justify;font-size: 14px;padding-left: 20px; padding-right:20px;">Thank you for your application for enrolment with Nursing Education &amp; Training Australia (NETA) – OSCE Preparation Course. Our admissions team will now verify your documents. This may take 2-3 business days to process. The outcome of your application for enrolment will be sent to you by email, <strong>hence it is essential that you regularly check your inbox or spam folder</strong>.</p>
        
        <p style="color:black;font-family: sans-serif;padding-top: 20px;text-align: justify;font-size: 14px;padding-left: 20px; padding-right:20px;">If you would like to keep yourself updated with NETA’s program, test taker’s testimonies, information sessions on different nursing topics and more, you are invited to follow us on <a href="#">Facebook</a> and <a href="#">Instagram</a>. You can also view more information in our website at <a href="www.nursingeta.com">www.nursingeta.com</a></p>
        
        <p style="color:black;font-family: sans-serif;padding-top: 20px;font-size: 14px; padding-left: 20px; padding-right:20px;">If you would like to speak to our team, please see our contact details below. </p>
        
        <div class="detail" style="margin-bottom: 30px;display:flow-root;clear:both;background:#b30174;color:#fff;padding:20px 0px 10px;font-weight:600;">
            <div class="lft" style="float:left">
                <p style="text-align: left;font-family: sans-serif;margin-left: 15px;font-size: 14px;font-weight: 400;margin-bottom: 5px;">Kind Regards,<br/><br/>
                <span style="text-align: left;font-weight:400; font-family: sans-serif;font-size: 14px;">Nursing Education & Training Australia (NETA)<br/><br/>
                    Sydney Office: Suite 605, Level 6, 379-383 Pitt Street, Sydney NSW 2000<br/>
                    Melbourne: 208/430 Little Collins Street, Melbourne VIC 3000<br/>
                    Wagga Wagga Office: Suite 4, 63 Baylis Street, Wagga Wagga NSW 2650<br/>
                    General enquiries: <a href="mailto:info@nursingeta.com" style="color:#fff;">info@nursingeta.com</a> | <a href="www.nursingeta.com" style="color:#fff;">www.nursingeta.com</a><br/>
                    P:1300 00 6382 | M: 0432 430 170                
                </span></p>
            </div>
        </div>
        <p style="text-align: center;font-family: sans-serif; margin-left: 15px;font-size: 12px;padding: 15px 0;">© Nursingeta {{ date('Y') }} All rights reserved | <a href="www.nursingeta.com">www.nursingeta.com</a> |</p>
    </div>
</div>


 {{-- OBA TEMPLATE --}}
@elseif($courseinfo_id == 4)
<div class="email-wrap" style="width: 1050px;min-height:600px;margin:15px auto;">
    <div class="email-box" style="width: 700px;min-height:600px;margin:auto;display:block;">
        <div class="logo">
            <img src="{{asset('home/img/logo.png')}}" width="150" alt="" style="margin: 15px;">
        </div>
        
        <p style="color:black;font-family: sans-serif;padding-left: 20px;padding-top: 20px;font-weight:400;text-align:left;margin:0;font-size: 20px;">Dear {{$name}}</p>
        
        <p style="color:black;font-family: sans-serif;padding-top: 20px;text-align: justify;font-size: 14px;padding-left: 20px; padding-right:20px;">Thank you for your application for enrolment with Nursing Education &amp; Training Australia (NETA) –<br/>
            Outcome Based Assessment (OBA) Preparation Course. Our admissions team will now verify your
            documents. This may take 2-3 business days to process. The outcome of your application for enrolment
            will be sent to you by email, <strong>hence it is essential that you regularly check your inbox or spam folder</strong>.</p>
        <p style="color:black;font-family: sans-serif;padding-top: 20px;text-align: justify;font-size: 14px;padding-left: 20px; padding-right:20px;">If you would like to keep yourself updated with NETA’s program, test taker’s testimonies, information sessions on different nursing topics and more, you are invited to follow us on <a href="#">Facebook</a> and <a href="#">Instagram</a>. You can also view more information in our website at <a href="www.nursingeta.com">www.nursingeta.com</a></p>

        <p style="color:black;font-family: sans-serif;padding-top: 20px;font-size: 14px; padding-left: 20px; padding-right:20px;">If you would like to speak to our team, please see our contact details below. </p>

        <div class="detail" style="margin-bottom: 30px;display:flow-root;clear:both;background:#b30174;color:#fff;padding:20px 0px 10px;font-weight:600;">
            <div class="lft" style="float:left">
                <p style="text-align: left;font-family: sans-serif;margin-left: 15px;font-size: 14px;font-weight: 400;margin-bottom: 5px;">Kind Regards,<br/><br/>
                <span style="text-align: left;font-weight:400; font-family: sans-serif;font-size: 14px;">Nursing Education & Training Australia (NETA)<br/><br/>
                    Sydney Office: Suite 605, Level 6, 379-383 Pitt Street, Sydney NSW 2000<br/>
                    Melbourne: 208/430 Little Collins Street, Melbourne VIC 3000<br/>
                    Wagga Wagga Office: Suite 4, 63 Baylis Street, Wagga Wagga NSW 2650<br/>
                    General enquiries: <a href="mailto:info@nursingeta.com" style="color:#fff;">info@nursingeta.com</a> | <a href="www.nursingeta.com" style="color:#fff;">www.nursingeta.com</a><br/>
                    P:1300 00 6382 | M: 0432 430 170                
                </span></p>
            </div>
        </div>
        <p style="text-align: center;font-family: sans-serif; margin-left: 15px;font-size: 12px;padding: 15px 0;">© Nursingeta {{ date('Y') }} All rights reserved | <a href="www.nursingeta.com" >www.nursingeta.com</a> |</p>
    </div>
</div>



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