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
            @include('flash::message')
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">My Courses</a>
                </li>
                @if(sizeof($student_course)>0) 
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Mock Tests</a>
                </li>
                @endif
                <li class="nav-item">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Other Courses</a>
                </li>
            </ul>

              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="my-courses">
                        
                        <div class="row">
                            
                             @if($student_course) 
                                @foreach($student_course as $key => $my_course_val)
    
                                @php
                                    $k = $key+1;
                                    $imgfluid = asset('home/img/c' .$k. '.png'); 
    
                                    $total_syllabus = App\Modules\CourseContent\Entities\CourseContent::gettotalsyllabus($my_course_val->courseinfo_id);
                                @endphp
    
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <div class="my-courses__list">
                                        <img src="{{ $imgfluid }}" class="img-fluid" alt="">
                                        <div class="list-content">
                                        <h5>{{ optional($my_course_val->courseInfo)->course_program_title }}</h5>
                                        <span>{{$total_syllabus}} syllabus</span>
                                        <div class="neta-limit"> <p>{!! optional($my_course_val->courseInfo)->short_content !!} </p> </div>
                                        <a class="btn e-btn w-100" href="{{ route('syllabus-detail',['course_info_id'=>$my_course_val->courseinfo_id]) }}">View syllabus</a>
                                        </div>
                                    </div>
                                </div>
    
                                @endforeach
                                @endif
    
                        </div>
    
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="my-courses">
                        <div class="row">

                            @php
                            $mockup_list =array('mockup_test_week_1'=>'Mock Test Week 1','mockup_test_week_2'=>'Mock Test Week 2','mockup_test_week_3'=>'Mock Test Week 3','mockup_test_week_4'=>'Mock Test Week 4','mockup_test_week_5'=>'Mock Test Week 5','mockup_test_week_6'=>'Mock Test Week 6','mockup_test_week_7'=>'Mock Test Week 7','mockup_test_week_8'=>'Mock Test Week 8');
                            @endphp

                            @foreach($mockup_list as $key => $list)

                            @php 
                            $total_quesion = App\Modules\Mockup\Entities\Mockup::gettotalQuestion($key);
                            @endphp

                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="my-courses__list">
                                    <div class="list-content">
                                    <h5>{{$list}}</h5> 
                                    <span>{{$total_quesion}} Questions</span>
                                    <a class="btn e-btn w-100" href="{{ route('mockup-question',['mockup_title'=>$key]) }}">Take Test</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="my-courses">
                        <div class="row">

                        @if($other_course)
                            @foreach($other_course as $key => $course_val)

                            @php
                            $k = $key+1;
                                $imgfluid = asset('home/img/c' .$k. '.png'); 

                                $total_syllabus = App\Modules\CourseContent\Entities\CourseContent::gettotalsyllabus($course_val->id);
                            @endphp

                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="my-courses__list">
                                    <img src="{{ $imgfluid }}" class="img-fluid" alt="">
                                    <div class="list-content">
                                    <h5>{{ $course_val->course_program_title }}</h5>
                                    <span>{{$total_syllabus}}  syllabus</span>
                                     <p>{!! optional($course_val->courseInfo)->short_content !!} </p>
                                   <a class="btn e-btn w-100" href="{{ route('enrolment',['course_info_id'=>$course_val->id]) }}">Enroll</a>
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
        </div>
    </div>
</section>

<section class="section-padding"></section>

@include('home::layouts.footer')
