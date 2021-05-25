<!DOCTYPE html>
<html lang="en">

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
    <link rel="icon" href="https://nursingeta.com/LP/public/LPDesign/img/logoneta.svg" type="image/svg+xml" sizes="16x16">
	<link href="{{asset('home/new/css/magnific-popup.css')}}" rel="stylesheet">
	<link href="{{asset('home/new/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('home/new/css/style.css')}}" rel="stylesheet">
	<link href="{{asset('home/new/css/responsive.css')}}" rel="stylesheet">
	<link href="{{asset('home/new/css/custom.css')}}" rel="stylesheet">
	
</head>
<body>
 
@php
    $setting = App\Modules\Setting\Entities\Setting::getSetting(); 
    $courseInfo = App\Modules\Course\Entities\Course::GetAllCourses();

@endphp

    <div class="top-nav">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-12 col-md-3">
                    <div class="top-info__list social-links d-flex align-self-center">
                        <div class="ml-2"><a href="{{$setting->facebook_link}}"><img src="{{asset('home/img/fb.svg')}}" alt=""></a></div>
                        <div class="ml-2"><a href="{{$setting->twitter_link}}"><img src="{{asset('home/img/tw.svg')}}" alt=""></a></div>
                        <div class="ml-2"><a href="{{$setting->instagram_link}}"><img src="{{asset('home/img/ins.svg')}}" alt=""></a></div>
                        <div class="ml-2"><a href="{{$setting->youtube_link}}"><img src="{{asset('home/img/yt.svg')}}" alt=""></a></div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9">
                    <div class="top-info__list t-f d-flex align-self-center justify-content-end">
                    	 <div class="ml-2"><a href="tel:{{$setting->contact_no1}}"><img src="{{asset('home/img/top-nav/call.svg')}}" alt=""> <span>Tel: {{$setting->contact_no1}} (NETA)</span></a></div>
                        <div class="ml-2"><a href="mailto:{{$setting->company_email}}"><img src="{{asset('home/img/top-nav/mail.svg')}}" alt=""> <span>Email:{{$setting->company_email}}</span></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <header class="header">test dev
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
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('faq') }}">FAQs</a>
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
                <a class="nav-link" href="{{ route('faq') }}">FAQs</a>
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
            <div><span><b>Tel 1:</b> {{$setting->contact_no1}} (NETA)</span></div>
            <div><span><b>Tel 2:</b> {{$setting->contact_no2}}</span></div>
            <div><b>Email:</b> {{$setting->company_email}}</span></div>
            <div><span><b>Location 1:</b> {{$setting->address1}}</span></div>
            <div><span><b>Location 2:</b> {{$setting->address2}}</span></div>
        </div>
    </div>
    <div class="body-overlay"></div>



<section class="neta-banner">
	<div class="owl-carousel owl-theme">

		@if(sizeof($banner)>0)
		@foreach($banner as $key => $banner_val)

		@php
            $image = ($banner_val->banner) ? asset($banner_val->file_full_path).'/'.$banner_val->banner : '';
        @endphp


		<div class="item">
             <div class="img-fade"></div>
             <img src="{{ $image }}" alt="" class="neta-bg">
             <div class="container">
                 <div class="row">
                    	<div class="banner-content">
                         <div class="col-sm-6">
                         <h1 class="wow animated fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">{{ $banner_val->title }}</h1>                         
                         <h5 class="wow animated fadeInUp" data-wow-duration="1s" data-wow-delay=".75s">{{ $banner_val->sub_title }}</h5>
                         <div class="banner-btn d-flex mt-2">
                          <a class="btn btn-neta" href="{{ route('course-detail',['course_id'=>'1']) }}">Learn More</a>
                             <a href="https://www.youtube.com/embed/ZBXfkINlRF0" target="_blank" class="popup-youtube">
                                 <div class="neta-play"><img src="{{asset('home/img/play.svg')}}" alt=""><span>Watch Video</span></div>
                             </a>
                         </div>
                        </div>
                     </div>
                 </div>
             </div>
         </div>

		@endforeach
		@endif

	</div>
</section>

 <section class="neta-slog">
     <div class="container">
         <div class="row">
             <div class="col-sm-10">
                 <div class="neta-slog__content">
                     <h2>Nurses are</h2>
                     <div id="vticker">
                        <ul>
                          <li>Smart</li>
                          <li>Passionate</li>
                          <li>Caring</li>
                          <li>Essential</li>
                          <li>Capable</li>
                          <li>Life savers</li>
                          <li>Your Friend</li>
                        </ul>
                      </div>
                     <p>It is the work that we do every day that makes us superheroes.</p> 
                     <p>What is your Superpower?</p>
                     <button class="btn btn-neta"><a href="{{ route('course') }}">Find More</a></button>
                 </div>
             </div>
         </div>
     </div>
 </section>


 <section class="team-testimonial">
    <div class=" container">
        <div class="neta-head text-center mb-3">
            <h4 class="mb-0">What Our Students Say</h4>
            <p>Find out why our students enjoy being part of the Nursing Education & Training Australia ?</p>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel owl-theme testimonial">

                    @if(sizeof($student_say)>0) 
                    @foreach($student_say as $key => $student_val)
                    @php
                        $image = ($student_val->profile_pic) ? asset($student_val->file_full_path).'/'.$student_val->profile_pic : '';
                        $short_message = substr(strip_tags($student_val->message),0,300);
                    @endphp
                    <div class="item">
                        <div class="card">
                            <div class="card-body text-center testimonial-item">
                                <p class="mb-0 testimonial_desc">"{!!$short_message!!}..."</p>
                                <a href="#" class="pt-2 d-block show_all_msg" my_message="{{$student_val->message}}" data-toggle="modal" data-target="#exampleModal">See More</a>
                                <div class="testimonial-item_img mt-4 mb-3"><img src="{{$image}}" alt=""></div>
                                <h5>{{$student_val->student_name }}</h5>
                                <p>{{$student_val->designation }}</p>
                            </div> 
                        </div>
                    </div>
                    @endforeach
                    @endif 

                </div>
            </div>
        </div>
    </div>
</section>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body popup_message">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



 <section class="courses-wrap neta-fees">
    <div class=" container course-enrolment mb-5">
        <div class="neta-head text-center m-5">
            <h4 class="mb-0">Browse Courses</h4>
            <p>Courses to get you started.</p>
        </div>
    <div class="row d-flex justify-content-center">

    	  @if(sizeof($course_info)>0) 
                @foreach($course_info as $key => $course_enrol)
                    <div class="col-sm-4">
                        <div class="course-enrolment__content m-0">
                            <p>{{$course_enrol->enrol_title }}</p>
                            <h2>${{$course_enrol->course_fee}} <p> inc. GST </p> </h2>
                            <span>({{$course_enrol->payment_mode }})</span>
                            <a href="{{ route('enrolment',['course_info_id'=>$course_enrol->id]) }}" class="btn w-100">Enroll</a>
                        </div>
                    </div>
         	@endforeach
         @endif    
 </div> 
</div>
</section>



<section class="neta-download section-padding neta-demo">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-8">
               <p>Take a demo quiz to experience the learning from NETA.</p>
                <span style="color:white">The demo is intended for a trial quiz only and not all features of the course are available. To obtain full access, you will need to enrol to our classes.</span>
            </div>
            <div class="col-sm-4 d-flex justify-content-center justify-content-md-end">
                <button class="btn btn-neta"><a href="{{ route('demo-quiz') }}">Take a Demo Quiz</a></button>
            </div>
        </div>
    </div>
</section>

<section class="neta-courses">
	<div class="container">
		<div class="neta-head text-center m-5">
			<h4 class="mb-0">What We Offer ?</h4>
			<p>{!! ($we_offer) ? $we_offer['short_content'] : ' ' !!}</p>
		</div>


		<div class="row">

		@if(sizeof($course)>0)
		@foreach($course as $key => $course_val)

		@php
            $image = ($course_val->image) ? asset($course_val->file_full_path).'/'.$course_val->image : '';
        @endphp

        @if($key % 2 === 0)

        	<div class="col-sm-12 neta-courses__content">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-6">
						<h5 class="wow animated fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">{{ $course_val->title }}</h5>
						<p class="wow animated fadeInUp" data-wow-duration="1s" data-wow-delay=".75s">{!! $course_val->short_content !!}
						</p>
						<a class="btn btn-neta" href="{{ route('course-detail',['course_id'=>$course_val->id]) }}">Learn More</a>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-5 offset-1">
						<div class="course-img wow animated fadeInRight" data-wow-duration="1s" data-wow-delay=".5s">
							<img src="{{ $image }}" alt="" class="img-fluid">
						</div>
					</div>
				</div>
			</div>


        @else

        	<div class="col-sm-12 neta-courses__content">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-6">
						<div class="course-img-rev wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s">
							<img src="{{ $image }}" alt="" class="img-fluid">
						</div>
					</div>

					<div class="col-sm-12 col-md-12 col-lg-5 offset-1">
						<h5 class="wow animated fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">{{ $course_val->title }}</h5>
						<p class="wow animated fadeInUp" data-wow-duration="1s" data-wow-delay=".75s">{!! $course_val->short_content !!}
						</p>
						<a class="btn btn-neta" href="{{ route('course-detail',['course_id'=>$course_val->id]) }}">Learn More</a>
					</div>
				</div>
			</div>

        @endif

        
        @endforeach
        @endif

			</div>
		</div>
	</div>
</section>

<section class="neta-career section-padding">
	<div class="container">
		<div class="neta-head text-center m-4">
			<h4 class="mb-0">Ready for the Next Chapter in your Career ?</h4>
			<p>Nursing Education and Training Australia (NETA) will help you get there!</p>
		</div>
		<div class="row">
			@if($course)
            	@foreach($course as $key => $course_val)

            	@php
            	$k = $key+1;
            		$imgfluid = asset('home/img/c' .$k. '.png'); 
            		$imgfadfluid = asset('home/img/ic'. $k . '.png'); 
            	@endphp
            		<div class="col-md-12 col-lg-4">
						<div class="neta-career__content">
							<a href="{{ route('course-detail',['course_id'=>$course_val->id]) }}">
								<figure>
									<div class="career-bg">
										<img src="{{ $imgfluid }}" class="img-fluid" alt="">
									</div>
									<div class="img-fade1"></div>
									<figcaption>
										<img src="{{ $imgfadfluid }}" class="img-fluid" alt="">
										<p>I want to join the {{ $course_val->title_of_training }}</p>
									</figcaption>
								</figure>
							</a>

						</div>
					</div>

		        @endforeach
    		@endif

		</div>
	</div>
</section>

<section class="neta-download section-padding">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-sm-8">
				<p>Download OBA PrepClass Brochure</p>
			</div>
			<div class="col-sm-4 d-flex justify-content-center justify-content-md-end">
				<a class="btn btn-neta float-right" target="_blank" href="{{asset('admin/oba_download.jpg')}}">Download Now</a>
			</div>
		</div>
	</div>
</section>

<section class="neta-courses neta-vid">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 neta-courses__content">
				<div class="row">
					<div class="col-md-12 col-lg-6">
						<h5 class="wow animated fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">About NETA</h5>
						<p class="wow animated fadeInUp" data-wow-duration="1s" data-wow-delay=".75s">{!! ($about_neta) ? $about_neta['short_content'] : '' !!}
						</p>
						<a class="btn btn-neta" href="{{ route('about-us') }}">Learn More</a>
					</div>
                    @if($about_neta['youtube_id'])
    					<div class="col-md-12 col-lg-5 offset-0 offset-lg-1">
    						<div class="course-img wow animated fadeInRight" data-wow-duration="1s" data-wow-delay=".5s">
    							<iframe width="100%" height="300" src="https://www.youtube.com/embed/{{$about_neta['youtube_id']}}"
    							frameborder="0"
    							allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
    							allowfullscreen></iframe>
    						</div>
    					</div>
                    @endif
				</div>
			</div>
		</div>
	</div>
</div>
</section>

<section class="neta-selfcheck">
    <div class="container wow animated fadeInUp" data-wow-duration=".5s" data-wow-delay=".5s">
        <div class="row">
            <div class="col-sm-8">
                <h3>OBA Preparation Class</h3>
                <p>No documentation needed, no English test. Just self check – for free.To know if you are eligible, commence your self check</p>
            </div>
            <div class="col-sm-4">
               <a href="https://www.nursingmidwiferyboard.gov.au/Registration-and-Endorsement/International/Completing-the-Self-check.aspx" target="_blank"><button class="btn btn-neta self-check float-right">Self Check</button></a>
            </div>
        </div>
    </div>
</section>

@include('home::layouts.footer')
