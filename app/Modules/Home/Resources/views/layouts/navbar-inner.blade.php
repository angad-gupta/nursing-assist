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
    <link href="{{asset('home/new/css/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{asset('home/new/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('home/new/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('home/new/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('home/new/css/custom.css')}}" rel="stylesheet">
        @yield('script')
        
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
                         <div class="ml-2"><a href="tel:{{$setting->contact_no1}}"><img src="{{asset('home/img/top-nav/call.svg')}}" alt=""> <span>Tel: {{$setting->contact_no1}} (NETA)</span></a></div>
                        <div class="ml-2"><a href="mailto:{{$setting->company_email}}"><img src="{{asset('home/img/top-nav/mail.svg')}}" alt=""> <span>Email:{{$setting->company_email}}</span></a></div>
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



     <header class="header">
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
                    <div class="col-md-9 col-lg-9 d-flex align-items-center justify-content-end">
                        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                              <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li class="nav-item neta-dropdown">
                                            <a class="nav-link" href="{{ route('about-us') }}">About Us</a>
                                            <ul class="neta-dropdown__menu list-unstyled">
                                                <a href="{{ route('team') }}"><li>Our Team</li></a>    
                                            </ul>
                                        </li>
                                   <li class="nav-item neta-dropdown">
                                        <a class="nav-link" href="{{ route('course') }}">Courses</a>
                                        <ul class="neta-dropdown__menu list-unstyled">
                                            @if($courseInfo)
                                                @foreach($courseInfo as $key => $courselist)
                                                 <a href="{{ route('course-detail',['course_id'=>$key]) }}"><li>{{ $courselist }}</li></a>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('student-hub') }}">Learner’s Portal</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('student-forum') }}">Forums</a>
                                    </li>
                                    <li class="nav-item neta-dropdown">
                                        <a class="nav-link" href="#">Media</a>
                                        <ul class="neta-dropdown__menu list-unstyled">
                                            <a href="{{ route('blog') }}"><li>Blog</li></a>
                                            <a href="{{ route('gallery') }}"><li>Gallery</li></a>
                                            <a href="{{ route('video') }}"><li>Videos</li></a>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('contact-us') }}">Contact Us</a>
                                    </li>

                                </ul>
                        </div>

            

                       <div class="d-flex align-items-center justify-content-end">
                            <div class="hamburger-menu" id="mobile-trigger">
                                <svg viewBox="0 -53 384 384" xmlns="http://www.w3.org/2000/svg"><path d="M368 154.668H16c-8.832 0-16-7.168-16-16s7.168-16 16-16h352c8.832 0 16 7.168 16 16s-7.168 16-16 16zm0 0M368 32H16C7.168 32 0 24.832 0 16S7.168 0 16 0h352c8.832 0 16 7.168 16 16s-7.168 16-16 16zm0 0M368 277.332H16c-8.832 0-16-7.168-16-16s7.168-16 16-16h352c8.832 0 16 7.168 16 16s-7.168 16-16 16zm0 0"/></svg>
                            </div>
                            <div class="ecm-search ml-4">
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
                        </div>

                    </div>
                </nav>
            </div>
        </div>

    </header>

    <div class="sidenav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('about-us') }}">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Courses</a>
                <div class="dropdown">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-3">
                            <ul class="list-unstyled">
                                @if($courseInfo)
                                    @foreach($courseInfo as $key => $courselist)
                                    <li><a href="{{ route('course-detail',['course_id'=>$key]) }}">{{ $courselist }}</a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('student-hub') }}">Learner's Portal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('student-forum') }}">Forums</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">Media</a>
                <div class="dropdown">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-3">
                            <ul class="list-unstyled">
                                <li><a href="{{ route('blog') }}">Blog</a><li>
                                <li><a href="{{ route('gallery') }}">Gallery</a><li>
                                <li><a href="{{ route('video') }}">Videos</a><li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('contact-us') }}">Contact Us</a>
            </li>

        </ul>
        <div class="mt-3">
            <div><span><b>Tel:</b> {{$setting->contact_no1}} (NETA)</span></div>
            <div><b>Email:</b> {{$setting->company_email}}</span></div>
            <div><span><b>Location:</b> {{$setting->address1}}</span></div>
        </div>
    </div>
    <div class="body-overlay"></div>