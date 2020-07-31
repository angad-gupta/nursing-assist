@include('home::layouts.navbar-inner')
<section class="neta-login neta-contact section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="neta-contact__form">
                    <h4>Password Reset</h4>
                    <p>Please provide email address</p>

                    @include('flash::message')
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    {!! Form::open(['route'=>'student.password.email','method'=>'POST','id'=>'student_submit','class'=>'form-horizontal','role'=>'form']) !!}
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="">Email Address <span class="text-danger">*</span></label>
                                {!! Form::email('email', $value = null, ['id'=>'email','placeholder'=>'Enter Email','class'=>'form-control']) !!}
                                @if ($errors->has('email'))
                                <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-neta w-100" style="color: white;">Send Password Reset Link</button>
                            <div class="text-center">
                                <a href="{{route('student-account')}}">Login</a>
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
