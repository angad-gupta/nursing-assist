@include('home::layouts.navbar-inner')
<style>
.field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -35px;
  position: relative;
  z-index: 2;
}

</style>
@section('scripts')
<script src="{{asset('admin/validation/studentRegister.js')}}"></script>
<script>
$(document).ready(function() {
    $(".toggle-password").click(function() {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    }); 


    $(document).on('keyup','#rpassword',function(){
       check_pass();

    });
})

function check_pass()
    {
     var val=document.getElementById("rpassword").value;
     var meter=document.getElementById("meter");
     var no=0;
     if(val!="")
     {
      // If the password length is less than or equal to 6
      if(val.length<=6)no=1;

      // If the password length is greater than 6 and contain any lowercase alphabet or any number or any special character
      if(val.length>6 && (val.match(/[a-z]/) || val.match(/\d+/) || val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)))no=2;

      // If the password length is greater than 6 and contain alphabet,number,special character respectively
      if(val.length>6 && ((val.match(/[a-z]/) && val.match(/\d+/)) || (val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) || (val.match(/[a-z]/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))))no=3;

      // If the password length is greater than 6 and must contain alphabets,numbers and special characters
      if(val.length>6 && val.match(/[a-z]/) && val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))no=4;

      if(no==1)
      {
       $("#meter").animate({width:'50px'},300);
       meter.style.backgroundColor="red";
       document.getElementById("pass_type").innerHTML="Very Weak";
      }

      if(no==2)
      {
       $("#meter").animate({width:'100px'},300);
       meter.style.backgroundColor="#F5BCA9";
       document.getElementById("pass_type").innerHTML="Weak";
      }

      if(no==3)
      {
       $("#meter").animate({width:'150px'},300);
       meter.style.backgroundColor="#FF8000";
       document.getElementById("pass_type").innerHTML="Good";
      }

      if(no==4)
      {
       $("#meter").animate({width:'200px'},300);
       meter.style.backgroundColor="#00FF40";
       document.getElementById("pass_type").innerHTML="Strong";
      }
     }

 else
 {
  meter.style.backgroundColor="white";
  document.getElementById("pass_type").innerHTML="";
 }
}

</script>
@stop
<section class="neta-ribbon">
    <img src="{{asset('home/img/bg.png')}}" class="img-fluid" alt="">
    <div class="container">
        <div class="row">
            <div class="neta-ribbon__content">
                <div class="col-sm-12">
                    <h1 class="mb-0">Login/Register</h1>
                    <ul class="list-unstyled d-flex">
                        <li> <a href="{{ route('home') }}">Home >></a></li>
                        <li>Login</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="neta-login neta-contact section-padding">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-sm-6">
                <div class="neta-contact__form">
                    <h4>Register</h4>
                    <p>Create your New Account here</p>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if($message)
                        <div class="alert alert-info alert-dismissible">
                                {{$message}}
                        </div>
                    @endif
                     {!! Form::open(['route'=>'student-register.store','method'=>'POST','id'=>'subscriber_submit','class'=>'form-horizontal','role'=>'form']) !!} 
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Username</label>
                                    {!! Form::text('username', $value = null, ['id'=>'username','placeholder'=>'Enter Username','class'=>'form-control']) !!}
                                  </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">First Name</label>
                                    {!! Form::text('first_name', $value = null, ['id'=>'first_name','placeholder'=>'Enter First Name','class'=>'form-control']) !!}
                                  </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Middle Name</label>
                                    {!! Form::text('middle_name', $value = null, ['id'=>'middle_name','placeholder'=>'Enter Middle Name','class'=>'form-control']) !!}
                                  </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Last Name</label>
                                    {!! Form::text('last_name', $value = null, ['id'=>'last_name','placeholder'=>'Enter Last Name','class'=>'form-control']) !!}
                                  </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Email Address</label>
                                     {!! Form::email('email', $value = null, ['id'=>'email','placeholder'=>'Enter Email Address','class'=>'form-control']) !!}
                                  </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" placeholder="Enter Password" class="form-control" id="rpassword" name="password" >
                                    <span toggle="#rpassword" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                  </div>
                            </div>
                            <span style="margin-left: 15px;margin-top: 5px;">Password Strength :</span>
                            <div id="meter_wrapper">
                                <div id="meter"></div>
                            </div>
                            <br>
                            <span id="pass_type"></span>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Confirm Password</label>
                                    <input type="password" placeholder="Enter Re-Type  Password" class="form-control" id="c_password" name="c_password" >
                                    
                                  </div>
                            </div>

                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-neta w-100" style="color: white;">Register</button>
                            </div>
                        </div>

                   {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>


<style type="text/css">
    
#rpassword
{
 height:45px;
 width:564px;
 border-radius:3px;
 border:1px solid grey;
 padding:10px;
 font-size:18px;
}
#meter_wrapper
{
 border:1px solid grey;
 margin-left:18px;
 margin-bottom: 22px;
 width:200px;
 height:35px;
 border-radius:3px;
}
#meter
{
 width:0px;
 height:35px;
 border-radius:
}
#pass_type
{
 font-size:20px;
 margin-top:2px;
 margin-left:5px;
 text-align:center;
 color:grey;
}
</style>

@include('home::layouts.footer')