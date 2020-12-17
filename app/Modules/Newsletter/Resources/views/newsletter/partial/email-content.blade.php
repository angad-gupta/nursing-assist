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
                <img src="{{$image}}" height="auto" width="auto" />

            @endif

            <p style="text-align: center;font-family: sans-serif;margin-left: 15px;font-size: 12px;padding: 15px 0;">© Nursingeta {{ date('Y') }} All rights reserved | <a href="www.nursingeta.com">nursingeta.com</a> |</p>
            

        </div>
    </div>