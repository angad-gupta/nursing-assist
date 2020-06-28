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
                        <li> <a href="{{ route('student-courses') }}"> Courses >> </a></li>
                        <li> <a href="{{ route('syllabus-detail',['course_info_id'=>$course_info_id]) }}"> Syllabus >> </a></li>
                        <li> <a href="{{ route('lesson-detail',['syllabus_id'=>$syllabus_id,'course_info_id'=>$course_info_id]) }}">Lesson Plan >> </a></li>
                        <li>Couse Plan</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="neta-about neta-lesson student-hub section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="my-courses">
                    <h2 class="ttl-line">{{$lesson_detail->lesson_title}}
                    </h2>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="lesson-desc">
                                    <h4>Introduction</h4>

                                    {!! $lesson_detail->lesson_summary !!}

                                    @php
                                        $content_type = $lesson_detail->content_type;
                                    @endphp

                                    @if($content_type == 'pdf' || $content_type == 'ppt')
                                    <div class="course-day">
                                        <span>Attachment</span>
                                        <ul class="list-unstyled">
                                            <li class="d-flex b-line">
                                                <button class="btn e-btn mt-0 w-15"><a href="{{ asset($lesson_detail->file_full_path).'/'.$lesson_detail->content_path }}" target="_blank"> <i class="fa fa-download"></i> Download PPT/Pdf</a></button>
                                            </li>
                                        </ul>
                                    </div>
                                    @endif

                                    @if($content_type == 'link')
                                    <div class="course-day">
                                        <span>Important Link</span>
                                        <ul class="list-unstyled">
                                            <li class="d-flex">
                                                <a href="{{ $lesson_detail->content_path}}" target="_blank">{{ $lesson_detail->content_path}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    @endif

                                    @if($content_type == 'video')
                                    <div class="course-day">
                                        <span>Youtube Link</span>
                                        <ul class="list-unstyled">
                                            <li class="d-flex">
                                                <a href="https://www.youtube.com/watch?v={{ $lesson_detail->content_path}}" target="_blank">https://www.youtube.com/watch?v={{ $lesson_detail->content_path}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    @endif


                                @if(sizeof($lesson_detail->Courseplan)>0)
                                    @foreach($lesson_detail->Courseplan as $key => $plan)
                                    
                                    <div class="lesson-parts">
                                        <h5>{{ $plan->course_session }}</h5>
                                        
                                            {!! $plan->plan_description !!}

                                    @php
                                        $plan_content_type = $plan->plan_type;
                                    @endphp

                                    @if($plan_content_type == 'pdf' || $plan_content_type == 'ppt')
                                    <div class="course-day">
                                        <span>Attachment</span>
                                        <ul class="list-unstyled">
                                            <li class="d-flex b-line">
                                                <button class="btn e-btn mt-0 w-15"><a href="{{ asset($plan->file_full_path).'/'.$plan->plan_path }}" target="_blank"> <i class="fa fa-download"></i> Download PPT/Pdf</a></button>
                                            </li>
                                        </ul>
                                    </div>
                                    @endif

                                    @if($plan_content_type == 'link')
                                    <div class="course-day">
                                        <span>Important Link</span>
                                        <ul class="list-unstyled">
                                            <li class="d-flex">
                                                <a href="{{ $plan->plan_path}}" target="_blank">{{ $plan->plan_path}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    @endif

                                    @if($plan_content_type == 'video')
                                    <div class="course-day">
                                        <span>Youtube Link</span>
                                        <ul class="list-unstyled">
                                            <li class="d-flex">
                                                <a href="https://www.youtube.com/watch?v={{ $plan->plan_path}}" target="_blank">https://www.youtube.com/watch?v={{ $plan->plan_path}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    @endif


                                        <div class="accordion" id="accordionExample">
                                            
                                     @php

                                         $sub_topic = App\Modules\CourseContent\Entities\CourseSubTopic::getAllSubtopic($plan->id);
                                     @endphp

                                        @if(sizeof($sub_topic)>0)
                                            @foreach($sub_topic as $key => $sub_topic)

                                            @php
                                            if($key == 0){
                                                $collpasestatue = 'show';
                                            }else{
                                                $collpasestatue = '';   
                                            }
                                            @endphp
                                            <div class="card">
                                                <div class="card-header" data-toggle="collapse"
                                                    data-target="#collapse{{$key}}" aria-expanded="true">
                                                    <span class="title">{{ $sub_topic->sub_topic_title }}</span>
                                                </div>
                                                <div id="collapse{{$key}}" class="collapse {{$collpasestatue }}"
                                                    data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        {!! $sub_topic->sub_topic_description !!}

                                                        @php
                                                             $ub_content_type = $sub_topic->sub_topic_type;
                                                        @endphp

                                                        @if($ub_content_type == 'pdf' || $ub_content_type == 'ppt')
                                                        <div class="course-day">
                                                            <span>Attachment</span>
                                                            <ul class="list-unstyled">
                                                                <li class="d-flex b-line">
                                                                    <button class="btn e-btn mt-0 w-15"><a href="{{ asset($sub_topic->file_full_path).'/'.$sub_topic->sub_topic_path }}" target="_blank"> <i class="fa fa-download"></i> Download PPT/Pdf</a></button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        @endif

                                                        @if($ub_content_type == 'link')
                                                        <div class="course-day">
                                                            <span>Important Link</span>
                                                            <ul class="list-unstyled">
                                                                <li class="d-flex b-line">
                                                                    <a href="{{ $sub_topic->sub_topic_path}}" target="_blank">{{ $sub_topic->sub_topic_path}}</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        @endif

                                                        @if($ub_content_type == 'video')
                                                        <div class="course-day">
                                                            <span>Youtube Link</span>
                                                            <ul class="list-unstyled">
                                                                <li class="d-flex b-line">
                                                                    <a href="https://www.youtube.com/watch?v={{ $sub_topic->sub_topic_path}}" target="_blank">https://www.youtube.com/watch?v={{ $sub_topic->sub_topic_path}}</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        @endif


                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        @endif

                                        </div>
                                    </div>
                                    
                                    @endforeach
                                @endif

                                @if($lesson_detail->is_related_to_quiz == '1')
                                     <a href="{{ route('student-quiz',['course_info_id'=>$course_info_id]) }}"><button class="btn e-btn">Practise Test</button></a> 
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