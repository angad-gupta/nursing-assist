@include('home::layouts.navbar-inner')
<section class="neta-login neta-contact section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="neta-contact__form">
                    <h4>Reset Password</h4>

                    @include('flash::message')
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    {!! Form::open(['route'=>'student.password.reset','method'=>'POST','id'=>'student_submit','class'=>'form-horizontal','role'=>'form']) !!}
                    <input type="hidden" name="token" value="{{ $token }}">

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
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="">Password <span class="text-danger">*</span></label>
                                {!! Form::password('password', $value = null, ['id'=>'password','placeholder'=>'Enter Password','class'=>'form-control']) !!}
                                @if ($errors->has('password'))
                                <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="">Confirm Password <span class="text-danger">*</span></label>
                                {!! Form::password('password_confirmation', $value = null, ['id'=>'password_confirmation','placeholder'=>'Enter Confirm Password','class'=>'form-control']) !!}
                                @if ($errors->has('password_confirmation'))
                                <span class="help-block"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-neta w-100" style="color: white;">Reset Password</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>
@include('home::layouts.footer')