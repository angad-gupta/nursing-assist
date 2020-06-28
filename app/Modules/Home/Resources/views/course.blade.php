@include('home::layouts.navbar-inner')

<section class="neta-ribbon">
    <img src="img/cc.jpg" class="img-fluid" alt="">
    <div class="container">
        <div class="row">
            <div class="neta-ribbon__content">
                <div class="col-sm-12">
            <h1 class="mb-0">Courses</h1>
            <ul class="list-unstyled d-flex">
                <li> <a href="{{ route('home') }}">Home /</a></li>
                <li> Courses</li>
            </ul>
        </div>
        </div>
           
        </div>
    </div>
</section>

<section class="neta-courses section-padding">
    <div class="container">
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
                                <button class="btn btn-neta"><a href="{{ route('course-detail',['course_id'=>$course_val->id]) }}">Learn More</a></button>
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
        
</section>


@include('home::layouts.footer')
