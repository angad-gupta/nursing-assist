<head>
    <title>NETA</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link href="{{asset('home/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('home/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('home/css/custom.css')}}" rel="stylesheet">

</head>


@php
    $setting = App\Modules\Setting\Entities\Setting::getSetting(); 
    $courseInfo = App\Modules\Course\Entities\Course::GetAllCourses();
@endphp

<div class="top-nav">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-7col-lg-8 col-xl-8">
                    <div class="top-info__list t-f d-flex align-self-center">
                        <div class="ml-2"><a href="#"><img src="img/top-nav/call.svg" alt=""></a> <span>Tel: {{$setting->contact_no1}}</span></div>
                        <div class="ml-2"><a href="#"><img src="img/top-nav/mail.svg" alt=""></a> <span>Email:{{$setting->company_email}}</span></div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="social-links">
                        <div class="top-info__list d-flex justify-content-end">
                            <div class="ml-2"><a href="{{$setting->facebook_link}}"><img src="{{asset('home/img/fb.svg')}}" alt=""></a></div>
                            <div class="ml-2"><a href="{{$setting->twitter_link}}"><img src="{{asset('home/img/tw.svg')}}" alt=""></a></div>
                            <div class="ml-2"><a href="{{$setting->instagram_link}}"><img src="{{asset('home/img/ins.svg')}}" alt=""></a></div>
                            <div class="ml-2"><a href="{{$setting->youtube_link}}"><img src="{{asset('home/img/yt.svg')}}" alt=""></a></div>
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
    </div>

<header class="header-two">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="col-md-3 col-lg-3">
                     @if($setting != null && $setting->company_logo != null)
                         <a class="navbar-brand" href="{{ route('home') }}"><img src="{{asset('uploads/setting/'.$setting->company_logo)}}" alt="" class="img-fluid"></a>
                    @else
                        <a class="navbar-brand" href="{{ route('home') }}"><img src="{{asset('home/img/logo.png')}}" alt="" class="img-fluid"></a>
                    @endif

                </div>
                <div class="col-sm-12 col-md-12 col-lg-8">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse float-right" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('about-us') }}">About Us</a>
                            </li>
                           <li class="nav-item neta-dropdown">
                                    <a class="nav-link" href="{{ route('course') }}">Courses</a>
                                    <ul class="neta-dropdown__menu list-unstyled">
                                        @if($courseInfo)
                                            @foreach($courseInfo as $key => $courselist)
                                             <a href="{{ route('course-detail',['course_id'=>$key]) }}"><li>{{ $courselist }}</li></a>
                                            @endforeach
                                        @endif
                                        <a href="{{ route('enrolment') }}"><li>Enrolment</li></a>
                                    </ul>
                                </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('agent') }}">Agents</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('student-hub') }}">Student's Hub</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact-us') }}">Contact Us</a>
                            </li>

                        </ul>
                    </div>
                </div>

                <div class="ecm-search col-sm-12 col-md-1">
                    <ul class="list-unstyled d-flex mt-3 float-right neta-user">
                        <a href="{{ route('student-account') }}">
                            <li class="user"><img src="{{asset('home/img/user.svg')}}" alt="">
                                @php
                                    use Illuminate\Support\Facades\Auth;
                                @endphp

                                @if(Auth::guard('student')->check())
                                    <ul class="list-unstyled">
                                        <a href="{{ route('student-account') }}"><li>My Account</li></a>
                                        <a href="{{ route('student-logout') }}"><li>Sign Out</li></a>
                                    </ul>
                                @endif

                            </li>
                        </a>
                    </ul>
                </div>


            </nav>
        </div>
    </div>

</header>
