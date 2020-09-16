    <div class="email-wrap" style="width: 1050px;min-height:600px;margin:15px auto;background: #dedede;">
        <div class="email-box" style="width: 700px;min-height:600px;margin:auto;display:block;background: #ffff;">
            <div class="logo" style="background:#fff">
                <img src="{{asset('home/img/logo.png')}}" width="150" alt="" style="margin: 15px;">
            </div>
            <p style="font-family: sans-serif;padding-left: 20px;padding-top: 20px;font-weight:400;text-align:left;margin:0;font-size: 20px;">Dear {{$student_info->full_name}},</p>
         
            <p style="font-family: sans-serif;padding-top: 20px;text-align: justify;font-size: 14px;padding-left: 20px;">Your Installment Payment for Respected Course has been Received. Please Check the Installment Payment Summary Below.</p>

            <p style="font-family: sans-serif;padding-top: 20px;font-size: 14px;padding-left: 20px;">Please note that as a NETA student, you have full access to the online course.</p>

         
            <p style="font-family: sans-serif;padding-top: 5px;font-size: 14px;padding-left: 20px;">
              <b>
                Total Course Amount : AUD {{ $total_course_fee }}<br>
                Amount Paid         : AUD {{ $amount_paid }}<br>
                Amount Remaining    : AUD {{ $amount_left }}<br>
              </b>
            </p> 

            <p style="font-family: sans-serif;padding-top: 5px;font-size: 14px;padding-left: 20px;">Please Pay your Remaining Amount on Time and Enjoy your course with Different Test.
            </p>


            <p style="font-family: sans-serif;padding-top: 20px;font-size: 14px;padding-left: 20px;">Once again, thank you for choosing Nursing Education and Training Australia. We are looking forward to coaching you in your Outcome Based Assessment.<br><br>
            If you have any questions, please do not hesitate to contact us.</p>
            
            <div class="detail" style="margin-bottom: 15px;display:flow-root;clear:both;background:#b30174;color:#fff;padding:20px">
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