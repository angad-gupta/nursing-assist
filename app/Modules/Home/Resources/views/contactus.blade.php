@include('home::layouts.navbar-inner')

@php
    $setting = App\Modules\Setting\Entities\Setting::getSetting(); 
@endphp

<section class="neta-ribbon">
    <img src="img/bg.png" class="img-fluid" alt="">
    <div class="container">
        <div class="row">
            <div class="neta-ribbon__content">
                <div class="col-sm-12">
                    <h1 class="mb-0">Contact Us</h1>
                    <ul class="list-unstyled d-flex">
                        <li> <a href="{{ route('home') }}">Home /</a></li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="neta-contact section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-7">
                <div class="neta-contact__form">
                    <h2 class="ttl-line">Get In Touch</h2>
                    @if($message)
                        <div class="alert alert-info alert-dismissible">
                                {{$message}}
                        </div>
                    @endif
                    <p>Want to get in touch? We'd love to hear from you. Here's how you can reach us...</p>
                   @php
                        $user = Auth::guard('student')->user();
                        if($user){
                        $user_fullname = $user->full_name;
                        $arr =  explode(" ", $user_fullname);
                        $user_firstname = $arr[0];
                        $user_lastname = $arr[1];
                        }
                   @endphp
              
                     {!! Form::open(['route'=>'contactus.store','method'=>'POST','id'=>'contactus_submit','class'=>'form-horizontal','role'=>'form','files' => true]) !!}

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">   
                                    @auth('student')                        
                                    {!! Form::text('first_name', $value = $user_firstname , ['id'=>'first_name','placeholder'=>'Enter First Name','class'=>'form-control']) !!}
                                    @else
                                    {!! Form::text('first_name', $value = $value = null, ['id'=>'first_name','placeholder'=>'Enter First Name','class'=>'form-control']) !!}
                                    @endauth
                                  </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    @auth('student')  
                                    {!! Form::text('last_name', $value = $user_lastname , ['id'=>'last_name','placeholder'=>'Enter Last Name','class'=>'form-control']) !!}
                                    @else
                                    {!! Form::text('last_name', $value = null, ['id'=>'last_name','placeholder'=>'Enter Last Name','class'=>'form-control']) !!}
                                    @endauth
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    @auth('student')  
                                    {!! Form::email('email', $value = $user->email, ['id'=>'email','placeholder'=>'Enter Address','class'=>'form-control']) !!}
                                    @else
                                    {!! Form::email('email', $value = null, ['id'=>'email','placeholder'=>'Enter Address','class'=>'form-control']) !!}
                                    @endauth
                                  </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    @auth('student') 
                                    {!! Form::text('phone', $value = $user->phone_no, ['id'=>'phone','placeholder'=>'Enter Phone','class'=>'form-control']) !!}
                                    @else
                                    {!! Form::text('phone', $value = null, ['id'=>'phone','placeholder'=>'Enter Phone','class'=>'form-control']) !!}
                                    @endauth
                                  </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    {!! Form::text('enquiry_about', $value = null, ['id'=>'enquiry_about','placeholder'=>'Enter Enquiry','class'=>'form-control']) !!}
                                  </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    {!! Form::textarea('message', null, ['id' => 'message','placeholder'=>'Enter Message', 'class' =>'form-control']) !!}                     

                                  </div>
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-neta" style="color:white;">Submit</button>
                            </div>
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
            <div class="col-md-12 col-lg-5">
                <div class="neta-contact__form">
                    <h2 class="ttl-line">Address</h2>
                    <ul class="list-unstyled">
                        <li>
                            <span class="material-icons">
                                call
                            </span><a href="tel:{{$setting->contact_no1}}">{{$setting->contact_no1}}</a> 
                        </li>
                        <li>
                            <span class="material-icons">
                                call
                            </span><a href="tel:{{$setting->contact_no2}}">{{$setting->contact_no2}}</a>
                        </li>
                        <li><span class="material-icons">
                                place
                            </span>{{$setting->address1}}</li>
                        <li><span class="material-icons">
                                place
                            </span>{{$setting->address2}}</li>
                        <li><span class="material-icons">
                                mail
                            </span>For Information: <p><a href="mailto:{{$setting->information_email}}">{{$setting->information_email}}</a></p>
                        </li>
                        <li><span>
                        <i class="fa fa-skype" aria-hidden="true"></i>
                            </span>Skype: <p>{{$setting->skype}}</p>
                        </li>

                        <li><span class="material-icons">
                                public
                            </span>Website: <p><a href="{{$setting->website}}" target="_blank">{{$setting->website}}</a></p>
                        </li>
                    </ul>
                </div>
                <div class="row">
                <div class="col-sm-12">
                <div class="neta-contact__form mt-4">
                    <h2 class="ttl-line">Contact Us</h2>
                    <p>{!! $contact_us['short_content'] !!}</p>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>

<section class="neta-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d205340.14971876782!2d150.9274457118659!3d-33.80560082211353!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b129838f39a743f%3A0x3017d681632a850!2sSydney%20NSW%2C%20Australia!5e1!3m2!1sen!2snp!4v1591163023292!5m2!1sen!2snp" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</section>

@include('home::layouts.footer')
