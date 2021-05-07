{{-- NCLEX TEMPLATE --}}
@if($courseinfo_id == 1)
<div class="email-wrap" style="width: 1050px;min-height:600px;margin:15px auto;">
    <div class="email-box" style="width: 700px;min-height:600px;margin:auto;display:block;">
        <div class="logo">
            <img src="{{asset('home/img/logo.png')}}" width="150" alt="" style="margin: 15px;">
        </div>
        <p style="font-family: sans-serif;padding-left: 20px;padding-top: 20px;font-weight:400;text-align:left;margin:0;font-size: 20px;">Dear {{$name}},</p>
        
        <p style="font-family: sans-serif;padding-top: 20px;text-align: justify;font-size: 14px;padding-left: 20px; padding-right:20px;">Thank you for your application for NCLEX Preparation Class. After careful consideration of your documents, we are unable to progress your application. Please contact the office for more information & for the process of your refund.</p>

        <div class="detail" style="margin-bottom: 30px;display:flow-root;clear:both;background:#b30174;color:#fff;padding:20px 0px 10px">
            <div class="lft" style="float:left">
                <p style="text-align: left;font-family: sans-serif;margin-left: 15px;font-size: 14px;font-weight: 600;margin-bottom: 5px;">Kind Regards,<br/><br/>
                <span style="text-align: left;font-weight:400; font-family: sans-serif;font-size: 14px;"><strong>NETA Team</strong><br/>
                    Phone: 1300006382<br/>  	
                    Mobile: 0432430170<br/>
                    Email: <a href="mailto:info@nursingeta.com" style="color:#fff;">info@nursingeta.com</a>                  
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
        <p style="font-family: sans-serif;padding-left: 20px;padding-top: 20px;font-weight:400;text-align:left;margin:0;font-size: 20px;">Dear {{$name}},</p>
        
        <p style="font-family: sans-serif;padding-top: 20px;text-align: justify;font-size: 14px;padding-left: 20px; padding-right:20px;">Thank you for your application for NCLEX and OSCE (OBA Package) Preparation Class. After careful consideration of your documents, we are unable to progress your application. Please contact the office for more information &amp; for the process of your refund.</p>

        <div class="detail" style="margin-bottom: 30px;display:flow-root;clear:both;background:#b30174;color:#fff;padding:20px 0px 10px">
            <div class="lft" style="float:left">
                <p style="text-align: left;font-family: sans-serif;margin-left: 15px;font-size: 14px;font-weight: 600;margin-bottom: 5px;">Kind Regards,<br/><br/>
                <span style="text-align: left;font-weight:400; font-family: sans-serif;font-size: 14px;"><strong>NETA Team</strong><br/>
                    Phone: 1300006382<br/>  	
                    Mobile: 0432430170<br/>
                    Email: <a href="mailto:info@nursingeta.com" style="color:#fff;">info@nursingeta.com</a> |                    
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
        <p style="font-family: sans-serif;padding-left: 20px;padding-top: 20px;font-weight:400;text-align:left;margin:0;font-size: 20px;">Dear {{$name}},</p>
        
        <p style="font-family: sans-serif;padding-top: 20px;text-align: justify;font-size: 14px;padding-left: 20px; padding-right:20px;">Thank you for your application for NCLEX and OSCE (OBA Package) Preparation Class. After careful consideration of your documents, we are unable to progress your application. Please contact the office for more information &amp; for the process of your refund.</p>

        <div class="detail" style="margin-bottom: 30px;display:flow-root;clear:both;background:#b30174;color:#fff;padding:20px 0px 10px">
            <div class="lft" style="float:left">
                <p style="text-align: left;font-family: sans-serif;margin-left: 15px;font-size: 14px;font-weight: 600;margin-bottom: 5px;">Kind Regards,<br/><br/>
                <span style="text-align: left;font-weight:400; font-family: sans-serif;font-size: 14px;"><strong>NETA Team</strong><br/>
                    Phone: 1300006382<br/>  	
                    Mobile: 0432430170<br/>
                    Email: <a href="mailto:info@nursingeta.com" style="color:#fff;">info@nursingeta.com</a> |                    
                </span></p>
            </div>
            
        </div>
        <p style="text-align: center;font-family: sans-serif; margin-left: 15px;font-size: 12px;padding: 15px 0;">© Nursingeta {{ date('Y') }} All rights reserved | <a href="www.nursingeta.com">www.nursingeta.com</a> |</p>
    </div>
</div>



@else

@endif