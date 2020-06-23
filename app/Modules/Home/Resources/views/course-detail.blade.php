@include('home::layouts.navbar-inner')

<section class="neta-ribbon">
    <img src="{{asset('home/img/cc.jpg')}}" class="img-fluid" alt="">
    <div class="container">
        <div class="row">
            <div class="neta-ribbon__content">
                <div class="col-sm-12">
                    <h1 class="mb-0">{{$course_detail->title}} Courses</h1>
                    <ul class="list-unstyled d-flex">
                        <li> <a href="{{ route('home') }}">Home  >> </a></li>
                        <li>{{$course_detail->title}} Courses</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="courses-wrap">
    <div class="container section-padding">
        <div class="row">
            <div class="col-sm-8">
                <div class="courses-wrap__content neta-about">
                    <h2 class="ttl-line">{{$course_detail->title}} Courses</h2>
                    <div class="oba-introduction b-line">
                        <h6>Introduction</h6>
                            {!! $course_detail->description !!} 
                    </div>

                    <div class="why-oba b-line">
                        <h6>Why take the {{$course_detail->title}}  preparation class?</h6>
                                {!! $course_detail->important_course !!}
                    </div>

                    <div class="course-enrolment b-line">
                        <h6>Enrolment</h6>
                         {!! $course_detail->enrollment_process !!}

                        <div class="row">
                              @if(sizeof($course_info)>0)
                                @foreach($course_info as $key => $enroll_val)
                                    <div class="col-sm-4">
                                        <div class="course-enrolment__content">
                                            <p>{{$enroll_val->enrol_title }}</p>
                                            <h2>${{$enroll_val->course_fee}}</h2>
                                            <span>({{$enroll_val->payment_mode }})</span>
                                            <button class="btn w-100"><a href="{{ route('enrolment',['course_info_id'=>$enroll_val->id]) }}">Enroll</a></button>
                                        </div>
                                    </div>
                             @endforeach
                            @endif

                        </div>
                    </div>

                    <div class="intake-date b-line">
                        <h6 class="mb-4">Intake Dates</h6>


                     @if(isset($course_info))
                     
                            @foreach($course_info as $key => $courseInfo)
                                <div class="intake-date__content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img src="{{asset('home/img/abt.png')}}" class="img-fluid" alt="">
                                        </div>
                                        <div class="col-sm-8 pt-4">
                                            <a href="{{ route('course-info-detail',['courseinfo_id'=>$courseInfo->id]) }}"><h4>{{$courseInfo->course_intake_title}}</h4></a>
                                             <p>Online and Live Teleconferences</p>
                                            <ul class="list-unstyled d-flex">


                                                @if(sizeof($courseInfo->courseIntake)>0)
                                                    @foreach($courseInfo->courseIntake as $key => $courseInfoIntake)
                                                        <li>
                                                            <p>{{optional($courseInfoIntake->month)->name}}</p>
                                                            <span>{{$courseInfoIntake->intake_date}}</span>
                                                        </li>
                                                    @endforeach
                                                @endif

                                            </ul>
                                            <button class="btn e-btn w-25 mt-1"><a href="{{ route('enrolment',['course_info_id'=>$courseInfo->id]) }}">Enroll Now</a></button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @else
                             <span>No Intake Date Added</span>
                        @endif

                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="course-summary neta-about">
                    <h4 class="ttl-line">Course Summary</h4>
                    <ul class="list-unstyled">
                        <li>
                            <p>Title of Training :</p>
                            <h6>{{$course_detail->title_of_training}}</h6>
                        </li>

                        <li>
                            <p>Course Duration :</p>
                            <h6>{{$course_detail->course_duration}}</h6>
                        </li>

                        <li>
                            <p>Mode of delivery :</p>
                            <h6>{{$course_detail->mode_of_delivery}}</h6>
                        </li>

                        <li>
                            <p>Intake Dates :</p>
                            <h6>{{$course_detail->intake_dates}}</h6>
                        </li>

                        <li>
                            <p>Course Fee :</p>
                            <h6>${{$course_detail->course_fees}}</h6>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>

@include('home::layouts.footer')