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

</head>
<body>
	<header class="header">
		<div class="container">
			<div class="row">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<div class="col-md-3 col-lg-3">
						<a class="navbar-brand" href="index.php"><img src="{{asset('home/img/logo.png')}}" alt="" class="img-fluid"></a>
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
								<a class="nav-link active" href="#">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="about.php">About Us</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="">Courses</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="">Agents</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="">Student's Login</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="contact.php">Contact Us</a>
							</li>

						</ul>
					</div>
				</div>
				<div class="ecm-search col-sm-12 col-md-1">
					<ul class="list-unstyled d-flex mt-3 float-right">
						<a href="#">
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
					<div class="col-sm-6 banner-content">
						<h1 class="wow animated fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">{{ $banner_val->title }}</h1>
						<h5 class="wow animated fadeInUp" data-wow-duration="1s" data-wow-delay=".75s">{{ $banner_val->sub_title }}</h5>
						<div class="banner-btn d-flex mt-2">
							<button class="btn btn-neta"><a href="#">Learn More</a></button>
							<a href="#">
								<div class="neta-play"><img src="{{asset('home/img/play.svg')}}" alt=""><span>Watch Video</span></div>
							</a>
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
						</ul>
					</div>
					<p>It is the work that we do every day that makes us superheroes.</p>
					<p>What is your Superhero?</p>
					<button class="btn btn-neta"><a href="#">Find More</a></button>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="neta-courses">
	<div class="container">
		<div class="neta-head text-center m-5">
			<h4 class="mb-0">What We Offer ?</h4>
			<p>{!! $we_offer['description'] !!}</p>
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
						<button class="btn btn-neta"><a href="#">Learn More</a></button>
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
						<button class="btn btn-neta"><a href="#">Learn More</a></button>
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
				<button class="btn btn-neta float-right"><a href="#">Download</a></button>
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
						<p class="wow animated fadeInUp" data-wow-duration="1s" data-wow-delay=".75s">{!! $about_neta['description'] !!}
						</p>
						<button class="btn btn-neta"><a href="#">Learn More</a></button>
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
				<button class="btn btn-neta float-right"><a href="#">Self Check</a></button>
			</div>
		</div>
	</div>
</section>

<footer>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<h5>Online CPD</h5>
				<ul class="list-unstyled">
					<a href="#"><li>CPD Courses</li> </a>
					<a href="#"><li>Online</li> </a>
					<a href="#"><li>All Resourses</li> </a>
					<a href="#"><li>Practical Question</li> </a>
					<a href="#"><li>Podcasts</li> </a>
				</ul>
			</div>

			<div class="col-sm-3">
				<h5>Features</h5>
				<ul class="list-unstyled">
					<a href="#"><li>Overview</li> </a>
					<a href="#"><li>Learning</li> </a>
					<a href="#"><li>OBA Courses</li> </a>
					<a href="#"><li>NCLEX</li> </a>
				</ul>
			</div>

			<div class="col-sm-3">
				<h5>Company</h5>
				<ul class="list-unstyled">
					<a href="#"><li>About Us</li> </a>
					<a href="#"><li>Our Team</li> </a>
					<a href="#"><li>Contact US</li> </a>
					<a href="#"><li>Helps</li> </a>
					<a href="#"><li>CPD Guidlines</li> </a>
					<a href="#"><li>FAQ's</li> </a>
				</ul>
			</div>

			<div class="col-sm-3">
				<h5>Legals</h5>
				<ul class="list-unstyled">
					<a href="#"><li>My Account</li> </a>
					<a href="#"><li>Privacy & Policy</li> </a>
					<a href="#"><li>Terms & Condition</li> </a>
					<a href="#"><li>Legals</li> </a>
					<a href="#"><li>Help</li> </a>
				</ul>
			</div>

			<div class="col-sm-9">
				<p class="copyright">Legal Entity: Nurse Assist International Pty Ltd. {{ date('Y') }}. All Right Reserved ABN  88641245187</p>
			</div>
			<div class="col-sm-3">
				<div class="social-links">
					<div class="top-info__list d-flex pt-2">
						<div class="ml-2"><a href="#"><img src="img/fb.svg" alt=""></a></div>
						<div class="ml-2"><a href="#"><img src="img/tw.svg" alt=""></a></div>
						<div class="ml-2"><a href="#"><img src="img/ins.svg" alt=""></a></div>
						<div class="ml-2"><a href="#"><img src="img/yt.svg" alt=""></a></div>
					</div>
				</div>
			</div>

		</div>
	</div>
</footer>
</body>

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="{{asset('home/js/wow.min.js')}}"></script>
<script src="{{asset('home/js/v-ticker.js')}}"></script>


<script>
	$('.owl-carousel').owlCarousel({
		loop:true,
		margin:10,
		nav:true,
		autoplay:true,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:1
			},
			1000:{
				items:1
			}
		}
	})

	$(window).scroll(function () {
		var scroll=$(window).scrollTop();
		if(scroll >= 100) {
			$("header").addClass("sticky");
		} else {
			$("header").removeClass("sticky");
		}
	});

	new WOW().init();

</script>



</html>