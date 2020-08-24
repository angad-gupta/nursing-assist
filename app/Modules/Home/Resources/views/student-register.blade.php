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
})

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
                     {!! Form::open(['route'=>'student-register.store','method'=>'POST','id'=>'studentRegister_submit','class'=>'form-horizontal','role'=>'form']) !!} 
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Username</label>
                                    {!! Form::text('username', $value = null, ['id'=>'username','placeholder'=>'Enter Username','class'=>'form-control']) !!}
                                  </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Full Name</label>
                                    {!! Form::text('full_name', $value = null, ['id'=>'full_name','placeholder'=>'Enter Full Name','class'=>'form-control']) !!}
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
@include('home::layouts.footer')