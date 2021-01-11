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

<section class="courses-wrap section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8">
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
                                            <h2>${{$enroll_val->course_fee}} <p>inc. GST</p></h2>
                                            <span>({{$enroll_val->payment_mode }})</span>
                                            <a class="btn w-100" href="{{ route('enrolment',['course_info_id'=>$enroll_val->id]) }}">Enroll</a>
                                        </div>
                                    </div>
                             @endforeach
                            @endif

                        </div>
                    </div>


                </div>
            </div>

            <div class="col-md-12 col-lg-4">
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
                            <h6>${{$course_detail->course_fees}} inc. GST</h6>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>

@include('home::layouts.footer')