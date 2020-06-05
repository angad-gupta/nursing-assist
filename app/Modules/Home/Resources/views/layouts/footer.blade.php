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
				<p class="copyright">{{$setting->company_copyright}}</p>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
<script src="{{asset('admin/validation/contactus.js')}}"></script>
<script src="{{asset('admin/validation/enrolment.js')}}"></script>

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