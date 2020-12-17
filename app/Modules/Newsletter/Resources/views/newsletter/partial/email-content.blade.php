    <div class="email-wrap" style="width: 1050px;min-height:200px;margin:15px auto;background: #dedede;">
        <div class="email-box" style="width: 700px;min-height:200px;margin:auto;display:block;background: #ffff;">
            <div class="logo" style="background:#fff">
                <img src="{{asset('home/img/logo.png')}}" width="150" alt="" style="margin: 15px;">
            </div>
           
            <p style="font-family: sans-serif;padding-top: 20px;text-align: justify;font-size: 14px;padding-left: 20px;">{!! $message !!}</p>


            @if($attachment)
            
                @php
                 $image = asset('uploads').'/newsletter/'.$attachment;
                @endphp
                <a href="{{$image}}" target="_blank"><p style="font-family: sans-serif;padding-top: 20px;text-align: justify;font-size: 14px;padding-left: 20px;">Here is the Newsletter Attachment. Please view for Details :</p></a>

            @endif


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