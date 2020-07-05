@php
    $setting = App\Modules\Setting\Entities\Setting::getSetting(); 
@endphp

<footer>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
				<h5>Online CPD</h5>
				<ul class="list-unstyled">
					<a href="#"><li>CPD Courses</li> </a>
					<a href="{{ route('demo-quiz') }}"><li>Demo Questions</li> </a>
				</ul>
			</div>

			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
				<h5>Media</h5>
				<ul class="list-unstyled">
					<a href="#"><li>Podcasts</li> </a>
					<a href="#"><li>Gallery</li> </a>
					<a href="#"><li>Videos</li> </a>
				</ul>
			</div>

			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
				<h5>Company</h5>
				<ul class="list-unstyled">
					<a href="{{ route('about-us') }}"><li>About Us</li> </a>
					<a href="{{ route('about-us') }}"><li>Our Team</li> </a>
					<a href="{{ route('contact-us') }}"><li>Contact US</li> </a>
					<a href="{{ route('faq')}}"><li>FAQ's</li> </a>
				</ul>
			</div>

			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
				<h5>Legals</h5>
				<ul class="list-unstyled">
					<a href="#"><li>My Account</li> </a>
					<a href="{{ route('privacy-policy')}}"><li>Privacy & Policy</li> </a>
					<a href="{{ route('term-condition')}}"><li>Terms & Conditions</li> </a>
					<a href="{{ route('user-agreement')}}"><li>User Agreement</li> </a>
					<a href="{{ route('payment-plan')}}"><li>Fees & Payment plans</li> </a>
				</ul>
			</div>

			<div class="col-sm-12 col-md-12 col-lg-9">
				<p class="copyright">{{$setting->company_copyright}}</p>
			</div>
			<div class="col-sm-12 col-md-12 col-sm-3">
				<div class="social-links">
					<div class="top-info__list d-flex pt-2">
						<div class="ml-2"><a href="{{$setting->facebook_link}}"><img src="{{asset('home/img/fb.svg')}}" alt=""></a></div>
                        <div class="ml-2"><a href="{{$setting->twitter_link}}"><img src="{{asset('home/img/tw.svg')}}" alt=""></a></div>
                        <div class="ml-2"><a href="{{$setting->instagram_link}}"><img src="{{asset('home/img/ins.svg')}}" alt=""></a></div>
                        <div class="ml-2"><a href="{{$setting->youtube_link}}"><img src="{{asset('home/img/yt.svg')}}" alt=""></a></div>
					</div>
				</div>
			</div>
  			

  			 <diiv class="col-sm-12">
                <div class="acknowledge">
                    <p>Nursing Education & Training Australia acknowledges the Traditional Owners
                        of the country throughout Australia and recognises their continuing connection
                        to land, waters and culture. We pay our respects to Elders past, present and
                        emerging
                    </p>
                    <p>   
                        NCLEX-P ®, NCLEX-RN® are registered trademarks of the National Council of State Boards of
                        Nursing, Inc (NCSBN ®)
                        Nursing Education & Training Australia is neither endorsed by nor affiliated with AHPRA. None of the
                        trademark holders is affiliated with, and does not endorse, Nursing Education & Training Australia
                        Products.
                    </p>
                </div>
            </diiv>


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
<script src="{{asset('home/js/custom.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<script src="{{asset('admin/validation/contactus.js')}}"></script>
<script src="{{asset('admin/validation/enrolment.js')}}"></script>
<script src="{{asset('admin/validation/student-register.js')}}"></script>

@yield('scripts')



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

$("#compose").click(function(){
  $("#compose-field").slideToggle();
});

new WOW().init();

</script>



</html>