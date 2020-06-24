@include('home::layouts.navbar-inner')

<section class="neta-ribbon">
    <img src="img/cc.jpg" class="img-fluid" alt="">
    <div class="container">
        <div class="row">
            <div class="neta-ribbon__content">
                <div class="col-sm-12">
                    <h1 class="mb-0">Student Hub</h1>
                    <ul class="list-unstyled d-flex">
                         <li> <a href="{{ route('home') }}">Home  >> </a></li>
                        <li> Student Courses</li>
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
                    <p>Find your Courses and explode your knowledge through online and evaluate with taking online Practise Tests.</p>
                    <div class="row">
                        
                         @if($student_course)
                            @foreach($student_course as $key => $my_course_val)

                            @php
                                $k = $key+1;
                                $imgfluid = asset('home/img/c' .$k. '.png'); 

                                $total_syllabus = App\Modules\CourseContent\Entities\CourseContent::gettotalsyllabus($my_course_val->id);
                            @endphp

                            <div class="col-sm-4">
                                <div class="my-courses__list">
                                    <img src="{{ $imgfluid }}" class="img-fluid" alt="">
                                    <div class="list-content">
                                    <h5>{{ optional($my_course_val->courseInfo)->course_program_title }}</h5>
                                    <span>{{$total_syllabus}} syllabus</span>
                                    <p>{!! optional($my_course_val->courseInfo)->short_content !!} </p>
                                     <button class="btn e-btn"><a href="{{ route('syllabus-detail',['course_info_id'=>$my_course_val->id]) }}">View syllabus</a></button>
                                    </div>
                                </div>
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
                    <p>Browse Online Courses including a mockup of each course.</p>
                        <div class="row">

                        @if($other_course)
                            @foreach($other_course as $key => $course_val)

                            @php
                            $k = $key+1;
                                $imgfluid = asset('home/img/c' .$k. '.png'); 

                                $total_syllabus = App\Modules\CourseContent\Entities\CourseContent::gettotalsyllabus($course_val->id);
                            @endphp

                            <div class="col-sm-4">
                                <div class="my-courses__list">
                                    <img src="{{ $imgfluid }}" class="img-fluid" alt="">
                                    <div class="list-content">
                                    <h5>{{ $course_val->course_program_title }}</h5>
                                    <span>{{$total_syllabus}}  syllabus</span>
                                     <p>{!! optional($my_course_val->courseInfo)->short_content !!} </p>
                                    <button class="btn e-btn"><a href="{{ route('enrolment',['course_info_id'=>$course_val->id]) }}">Enroll</a></button>
                                    </div>
                                </div>
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
