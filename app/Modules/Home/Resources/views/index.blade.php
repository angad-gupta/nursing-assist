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
	<link href="{{asset('home/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('home/css/style.css')}}" rel="stylesheet">
	<link href="{{asset('home/css/responsive.css')}}" rel="stylesheet">
	<link href="{{asset('home/css/custom.css')}}" rel="stylesheet">
	
</head>
<body>

@php
    $setting = App\Modules\Setting\Entities\Setting::getSetting(); 
    $courseInfo = App\Modules\Course\Entities\Course::GetAllCourses();
@endphp

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
                                    <a class="nav-link" href="{{ route('student-account') }}">Student's Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('contact-us') }}">Contact Us</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="ecm-search col-sm-12 col-md-1">
                        <ul class="list-unstyled d-flex mt-3 float-right">
                            <a href="{{ route('student-account') }}">
                           		<li class="user"><img src="{{asset('home/img/user.svg')}}" alt="">
                                </li>
                       		 </a>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

    </header>


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
                             <button class="btn btn-neta"><a href="{{ route('course') }}">Learn More</a></button>
                             <a href="#">
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

<section class="neta-courses">
	<div class="container">
		<div class="neta-head text-center m-5">
			<h4 class="mb-0">What We Offer ?</h4>
			<p>{!! ($we_offer['short_content']) ? $we_offer['short_content'] : ' ' !!}</p>
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
					<div class="col-sm-6">
						<h5 class="wow animated fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">{{ $course_val->title }}</h5>
						<p class="wow animated fadeInUp" data-wow-duration="1s" data-wow-delay=".75s">{!! $course_val->short_content !!}
						</p>
						<button class="btn btn-neta"><a href="{{ route('course-detail',['course_id'=>$course_val->id]) }}">Learn More</a></button>
					</div>
					<div class="col-sm-5 offset-1">
						<div class="course-img wow animated fadeInRight" data-wow-duration="1s" data-wow-delay=".5s">
							<img src="{{ $image }}" alt="" class="img-fluid">
						</div>
					</div>
				</div>
			</div>


        @else

        	<div class="col-sm-12 neta-courses__content">
				<div class="row">
					<div class="col-sm-5">
						<div class="course-img-rev wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s">
							<img src="{{ $image }}" alt="" class="img-fluid">
						</div>
					</div>

					<div class="col-sm-6 offset-1">
						<h5 class="wow animated fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">{{ $course_val->title }}</h5>
						<p class="wow animated fadeInUp" data-wow-duration="1s" data-wow-delay=".75s">{!! $course_val->short_content !!}
						</p>
						<button class="btn btn-neta"><a href="{{ route('course-detail',['course_id'=>$course_val->id]) }}">Learn More</a></button>
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

<section class="neta-career">
	<div class="container section-padding">
		<div class="neta-head text-center m-5">
			<h4 class="mb-0">Ready for the Next Chapter in your Career ?</h4>
			<p>Nursing Education and Training Australia (NETA) will help you get there!</p>
		</div>
		<div class="row">
			<div class="col-sm-4">
				<div class="neta-career__content">
					<figure>
						<div class="career-bg">
							<img src="{{asset('home/img/c1.png')}}" class="img-fluid" alt="">
						</div>
						<div class="img-fade1"></div>
						<figcaption>
							<img src="{{asset('home/img/ic1.png')}}" class="img-fluid" alt="">
							<p>I want to join the Outcome Based <br>
							Assessment Preparation Class</p>
						</figcaption>
					</figure>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="neta-career__content">
					<figure>
						<div class="career-bg">
							<img src="{{asset('home/img/c2.png')}}" class="img-fluid" alt="">
						</div>
						<div class="img-fade2"></div>
						<figcaption>
							<img src="{{asset('home/img/ic2.png')}}" class="img-fluid" alt="">
							<p>I want a successful 1st year RN</p>
						</figcaption>
					</figure>
				</div>
			</div>

			<div class="col-sm-4">
				<div class="neta-career__content">
					<figure>
						<div class="career-bg">
							<img src="{{asset('home/img/c3.png')}}" class="img-fluid" alt="">
						</div>
						<div class="img-fade3"></div>
						<figcaption>
							<img src="{{asset('home/img/ic3.png')}}" class="img-fluid" alt="">
							<p>I want to professionally develop <br> as a nurse</p>
						</figcaption>
					</figure>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="neta-download">
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<p>Download course summary of the OBA Preparation Class</p>
			</div>
			<div class="col-sm-4">
				<button class="btn btn-neta float-right"><a target="_blank" href="{{asset('admin/oba_download.pdf')}}">Download</a></button>
			</div>
		</div>
	</div>
</section>

<section class="neta-courses neta-vid">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 neta-courses__content">
				<dov class="row">
					<div class="col-sm-6">
						<h5 class="wow animated fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">About NETA</h5>
						<p class="wow animated fadeInUp" data-wow-duration="1s" data-wow-delay=".75s">{!! $about_neta['short_content'] !!}
						</p>
						<button class="btn btn-neta"><a href="{{ route('about-us') }}">Learn More</a></button>
					</div>
					<div class="col-sm-5 offset-1">
						<div class="course-img wow animated fadeInRight" data-wow-duration="1s" data-wow-delay=".5s">
							<iframe width="100%" height="300" src="https://www.youtube.com/embed/ZBXfkINlRF0"
							frameborder="0"
							allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
							allowfullscreen></iframe>
						</div>
					</div>
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
				<a href="https://www.nursingmidwiferyboard.gov.au/Registration-and-Endorsement/International/Completing-the-Self-check.aspx" target="_blank"><button class="btn btn-neta float-right">Self Check</button></a>
			</div>
		</div>
	</div>
</section>


@include('home::layouts.footer')
