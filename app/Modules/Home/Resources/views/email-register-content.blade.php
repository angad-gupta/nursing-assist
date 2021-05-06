    <div class="email-wrap" style="width: 1050px;min-height:600px;margin:15px auto;background: #dedede;">
        <div class="email-box" style="width: 700px;min-height:600px;margin:auto;display:block;background: #ffff;">
            <div class="logo" style="background:#fff">
                <img src="{{asset('home/img/logo.png')}}" width="150" alt="" style="margin: 15px;">
            </div>

            <p style="font-family: sans-serif;padding-left: 20px;padding-top: 20px;font-weight:400;text-align:left;margin:0;font-size: 20px;">Dear {{$name}},</p>

             <p style="font-family: sans-serif;text-align: justify;font-size: 14px;padding: 10px;">Welcome to Nursing Education & Training Australia (NETA). Thank you for your registration. To start
                enrolling for a course, please verify your email address via this link </p>

             <p style="font-family: sans-serif;text-align: center;font-size: 20px;padding: 10px;"><a href="{{ route('student-account-activate',['code'=>$activation_code]) }}">Activate Account</a> 

            <div class="detail" style="margin-bottom: 30px;display:flow-root;clear:both;background:#b30174;color:#fff;padding:20px 0px 10px">
                <div class="lft" style="float:left">
                    <p style="text-align: left;font-family: sans-serif;margin-left: 15px;font-size: 14px;font-weight: 600;margin-bottom: 5px;">Kind Regards,</p>
                    <p style="text-align: left;font-family: sans-serif;margin-left: 15px;font-size: 14px;">Nursing Education & Training Australia (NETA)</p>
                    <p style="text-align: left;font-family: sans-serif;margin-left: 15px;font-size: 14px;">Sydney Office: Suite 605, Level 6, 379-383 Pitt Street, Sydney NSW 2000</p>
                    <p style="text-align: left;font-family: sans-serif;margin-left: 15px;font-size: 14px;">Melbourne: 208/430 Little Collins Street, Melbourne VIC 3000</p>
                    <p style="text-align: left;font-family: sans-serif;margin-left: 15px;font-size: 14px;">Wagga Wagga Office: Suite 4, 63 Baylis Street, Wagga Wagga NSW 2650</p>
                    <p style="text-align: left;font-family: sans-serif;margin-left: 15px;font-size: 14px;">
                        General enquiries : <a href="mailto:info@nursingeta.com" style="font-family: sans-serif;color:#fff">info@nursingeta.com</a> | 
                        <a href="www.nursingeta.com" style="font-family: sans-serif;color:#fff">www.nursingeta.com</a>
                    </p>

                    <p style="text-align: left;font-family: sans-serif;margin-left: 15px;font-size: 14px;">
                        P:1300 00 6382 | M: 0432 430 170
                    </p>

                </div>
            </div>
            
            <p style="text-align: center;font-family: sans-serif;margin-left: 15px;font-size: 12px;padding: 15px 0;">© Nursingeta {{ date('Y') }} All rights reserved | <a href="www.nursingeta.com">www.nursingeta.com</a> |</p>


        </div>
    </div>