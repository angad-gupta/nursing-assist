@include('home::layouts.navbar-inner')


<section class="neta-ribbon">
    <img src="img/cc.jpg" class="img-fluid" alt="">
    <div class="container">
        <div class="row">
            <div class="neta-ribbon__content">
                <div class="col-sm-12">
                    <h1 class="mb-0">Student Hub</h1>
                    <ul class="list-unstyled d-flex">
                        <li> <a href="#">Home /</a></li>
                        <li> <a href="#">Student hub</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="neta-about student-hub section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="my-courses">
                    <h2 class="ttl-line">My Courses
                    </h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book.</p>
                    <div class="row">

                        @if($course)
                            @foreach($course as $key => $course_val)

                            @php
                            $k = $key+1;
                                $imgfluid = asset('home/img/c' .$k. '.png'); 
                                $imgfadfluid = asset('home/img/ic'. $k . '.png'); 
                            @endphp

                            <div class="col-sm-4">
                                <a href="#">
                                    <div class="neta-career__content">
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
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        @endif

                    </div>

                </div>
            </div>


            <div class="col-sm-12">
                <div class="my-courses">
                    <h2 class="ttl-line">Other Courses
                    </h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book.</p>
                    <div class="row">
                       

                        @if($course)
                            @foreach($course as $key => $course_val)

                            @php
                            $k = $key+1;
                                $imgfluid = asset('home/img/c' .$k. '.png'); 
                                $imgfadfluid = asset('home/img/ic'. $k . '.png'); 
                            @endphp

                            <div class="col-sm-4">
                                <a href="#">
                                    <div class="neta-career__content">
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
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        @endif

                        
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<section class="section-padding"></section>

@include('home::layouts.footer')
