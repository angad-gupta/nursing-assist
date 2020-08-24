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
                    <h4>Login</h4>
                    <p>Please login to your account first</p>
                    @include('flash::message')
                     {!! Form::open(['route'=>'student-login-post','method'=>'POST','id'=>'student_submit','class'=>'form-horizontal','role'=>'form']) !!}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Email Address</label>
                                   {!! Form::email('email', $value = null, ['id'=>'email','placeholder'=>'Enter Email Address','class'=>'form-control']) !!}
                                  </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" placeholder="Enter Password" class="form-control" id="password" name="password" >
                                    <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                  </div>
                            </div>

                            {{ Form::hidden('course_info_id', $course_info_id) }}
                            {{ Form::hidden('source', $source) }}
                            <div class="col-sm-12">
                                <div class="text-center">
                                    <a href="{{route('student.password.reset')}}">Forgot password?</a>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                 <button type="submit" class="btn btn-neta w-100" style="color: white;">Login</button>
                            </div><br/><br/><br/>
                            <div class="col-sm-12">
                                <div class="text-center">
                                    <a href="{{route('student.register')}}">New Student Register Here</a>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
          
        </div>
    </div>
</section>
@include('home::layouts.footer')