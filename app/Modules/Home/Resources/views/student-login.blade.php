@include('home::layouts.navbar-inner')

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
        <div class="row">
            <div class="col-sm-6">
                <div class="neta-contact__form">
                    <h4>Login</h4>
                    <p>Please login to your account first</p>
                    @include('flash::message')
                     {!! Form::open(['route'=>'student-login-post','method'=>'POST','id'=>'student_submit','class'=>'form-horizontal','role'=>'form','files' => true]) !!}
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
                                  </div>
                            </div>

                            {{ Form::hidden('course_info_id', $course_info_id) }}
                            {{ Form::hidden('source', $source) }}


                            <div class="col-sm-12">
                                 <button type="submit" class="btn btn-neta w-100" style="color: white;">Login</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="neta-contact__form">
                    <h4>Register</h4>
                    <p>Create your New Account here</p>
                    @if($message)
                        <div class="alert alert-info alert-dismissible">
                                {{$message}}
                        </div>
                    @endif
                     {!! Form::open(['route'=>'student-register.store','method'=>'POST','id'=>'student_submit','class'=>'form-horizontal','role'=>'form','files' => true]) !!} 
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Username</label>
                                    {!! Form::text('username', $value = null, ['id'=>'username','placeholder'=>'Enter Username','class'=>'form-control','required']) !!}
                                  </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Email Address</label>
                                     {!! Form::email('email', $value = null, ['id'=>'email','placeholder'=>'Enter Email Address','class'=>'form-control','required']) !!}
                                  </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" placeholder="Enter Password" class="form-control" id="password" name="password" required>
                                  </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Confirm Password</label>
                                    <input type="password" placeholder="Enter Re-Type  Password" class="form-control" id="c_password" name="c_password" required>
                                    
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