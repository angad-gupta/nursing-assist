<div class="email-wrap" style="width: 1050px;min-height:600px;margin:15px auto;background: #dedede;">
            <div class="email-box" style="width: 700px;min-height:600px;margin:auto;display:block;background: #ffff;">
                <div class="logo" style="background:#fff">
                    <img src="{{asset('home/img/logo.png')}}" width="150" alt="" style="margin: 15px;">
                </div>
                <h4 style="font-family: sans-serif;margin-left: 15px;padding-top: 20px;font-weight:400;text-align:center;margin:0;font-size: 24px;">Hello, {{$studentInfo->full_name}} </h4>
                <p style="text-align: center;font-family: sans-serif;width: 500px;margin: auto;padding-top: 20px;">Your payment has been made Successfully.Please view your course on <a href="{{ route('student-courses') }}">Student Hub</a>. Thank you for buying our products</p>
                
                <div class="book-info" style="width: 95%;margin: auto;font-family: sans-serif;font-weight: bold;margin-top: 40px;text-align: center;font-size: 13px;">
                    <table style="width:100%;width: 100%;border: 0;box-shadow: 0 0 10px #f1f1f1;">
                        <tr style="background:#72309a">
                          <th style="padding: 10px;color: #fff;">Course</th>
                          <th style="padding: 10px;color: #fff;">Price</th>
                          <th style="padding: 10px;color: #fff;">Payment Method</th>
                          <th style="padding: 10px;color: #fff;">Total Amount</th>
                        </tr>
                        <tr>
                          <td style="padding:30px">{{optional($coursinfo->courseInfo)->course_program_title}}</td>
                          <td style="padding:30px">${{optional($coursinfo->courseInfo)->course_fee}}</td>
                          <td style="padding:30px">E-way</td>
                          <td style="padding:30px">${{optional($coursinfo->courseInfo)->course_fee}}</td>
                        </tr>
                      </table>
                </div>

                <p style="font-family: sans-serif;padding-top: 20px;font-size: 14px;padding-left: 20px;">We will be happy to assist you. For any questions, suggestions or comments please contact us at:</p>
                 
                <div class="detail" style="margin-bottom: 15px;display:flow-root;clear:both;background:#b30174;color:#fff;padding:20px">
                <div class="lft" style="float:left">
                    <p style="text-align: left;font-family: sans-serif;margin-left: 15px;font-size: 14px;font-weight: 600;margin-bottom: 5px;">Best Regards,</p>
                <span style="text-align: left;font-family: sans-serif;margin-left: 15px;font-size: 14px;">Customer Service</span>
                <a href="www.nursingeta.com/" style="display:block;font-family: sans-serif;padding-left: 15px;padding-top:5px;color:#fff">www.nursingeta.com</a>
                </div>

                <div class="lft" style="float:right;padding-right:15px">
                    <p style="text-align: left;font-family: sans-serif;margin-left: 15px;font-size: 14px;font-weight: 600;margin-bottom: 5px;">Contact Details</p>
                <span style="text-align: left;font-family: sans-serif;margin-left: 15px;font-size: 14px;">+614 32430170</span>
                <span style="text-align: left;font-family: sans-serif;margin-left: 15px;font-size: 14px;display:block">(Monday to Friday, 09:00 AM to 06:00 PM)</span>
                
                </div>
            </div>
            
                <p style="text-align: center;font-family: sans-serif;margin-left: 15px;font-size: 12px;padding: 15px 0;">© Nursingeta {{ date('Y') }} All rights reserved | <a href="www.nursingeta.com">nursingeta.com</a> |</p>
                

            </div>
        </div>