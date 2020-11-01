@include('home::layouts.navbar-inner')
<style>
.modal {z-index: 9999 !important;}
</style>
<section class="neta-ribbon">
    <img src="img/cc.jpg" class="img-fluid" alt="">
    <div class="container">
        <div class="row">
            <div class="neta-ribbon__content">
                <div class="col-sm-12">
                    <h1 class="mb-0">Learner's Portal</h1>
                    <ul class="list-unstyled d-flex">
                        <li> <a href="{{ route('home') }}">Home >> </a></li>
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
                    
                    @if(sizeof($student_course)>0)

                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">My Courses</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="resources-tab" data-toggle="tab" href="#resources" role="tab"
                                aria-controls="resources" aria-selected="false">Resources</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="practice-tab" data-toggle="tab" href="#practice" role="tab"
                                aria-controls="practice" aria-selected="false">Practice Test</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Mock Test</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="readliness-tab" data-toggle="tab" href="#readliness" role="tab"
                                aria-controls="readliness" aria-selected="false">Readiness Test</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="history-tab" data-toggle="tab" href="#history" role="tab"
                                aria-controls="history" aria-selected="false">Test History</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                            aria-controls="contact" aria-selected="false">Other Courses</a>
                        </li>
                    @else
                        <li class="nav-item">
                        <a class="nav-link active" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                            aria-controls="contact" aria-selected="false">Available Courses</a>
                        </li>
                    @endif
                    
                </ul>


                <div class="tab-content" id="myTabContent">

                     @if(sizeof($student_course)>0)

                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="my-courses">
                            <div class="row">
                                 @if(sizeof($student_course)>0)
                                    @foreach($student_course as $key => $my_course_val)

                                        @php
                                        $k = $key+1;
                                        $imgfluid = asset('home/img/c' .$k. '.png');

                                        $total_syllabus =
                                        App\Modules\CourseContent\Entities\CourseContent::gettotalsyllabus($my_course_val->courseinfo_id);
                                        @endphp

                                        <div class="col-sm-6 col-md-4 col-lg-3">
                                            <div class="my-courses__list">
                                                <img src="{{ $imgfluid }}" class="img-fluid" alt="">
                                                <div class="list-content">
                                                    <h5>{{ optional($my_course_val->courseInfo)->course_program_title }}</h5>
                                                    <span>{{$total_syllabus}} syllabus</span>
                                                    <div class="neta-limit">
                                                        <p>{!! optional($my_course_val->courseInfo)->short_content !!} </p>
                                                    </div>
                                                    @if($my_course_val->status == 1)
                                                    <a class="btn e-btn w-100"
                                                        href="{{ route('syllabus-detail',['course_info_id'=>$my_course_val->courseinfo_id]) }}">View
                                                        Syllabus</a>
                                                    @else
                                                    <a data-toggle="modal" data-target="#modal_theme_installment"
                                                        class="btn e-btn w-100 installment_info">View Syllabus</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                    @else

                                    <div class="col-12">
                                            <div class="my-courses__list">
                                                <div class="list-content">
                                                    <h5>There is no any Course you have Enroll. Please View <b data-popup="tooltip" title="Click on Next Tab Above." data-placement="top">Available Courses</b> and Enroll.</h5>
                                                </div>
                                            </div>
                                        </div>

                                @endif

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="my-courses">
                            <div class="row">

                                @php
                                $mockup_list = array('mockup_test_week_1'=>'Mock Test Week 1','mockup_test_week_2'=>'Mock Test Week 2',
                                    'mockup_test_week_3'=>'Mock Test Week 3','mockup_test_week_4'=>'Mock Test Week 4',
                                    'mockup_test_week_5'=>'Mock Test Week 5','mockup_test_week_6'=>'Mock Test Week 6',
                                    'mockup_test_week_7'=>'Mock Test Week 7','mockup_test_week_8'=>'Mock Test Week 8',
                                    'add_practice_test_1'=>'Additional Practice Tests 1', 'add_practice_test_2'=>'Additional Practice Tests 2', 
                                    'add_practice_test_3'=>'Additional Practice Tests 3');
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
                                                <a class="btn e-btn w-100"
                                                    href="{{ route('mockup-question',['mockup_title'=>$key]) }}">Take Test</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="practice" role="tabpanel" aria-labelledby="practice-tab">
                        <div class="row my-courses">
                            @php
                                $practice_list = array('practice_test_1'=>'Practice Test 1','practice_test_2'=>'Practice Test 2',
                                    'practice_test_3'=>'Practice Test 3');
                                @endphp

                                @foreach($practice_list as $key => $list)

                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                        <div class="my-courses__list">
                                            <div class="list-content">
                                                <h5>{{$list}}</h5>
                                                <span>{{ $key == 'practice_test_1' ? '25' : ($key == 'practice_test_2' ? '50' : '100') }} Questions</span>
                                                <a class="btn e-btn w-100"
                                                    href="{{ route('practice-question',['practice_title'=>$key]) }}">Take Test</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
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

                                        $my_courses_check = App\Modules\Student\Entities\StudentCourse::checkStudentCourses($student_id,$course_val->id);
                                        @endphp

                                        <div class="col-sm-6 col-md-4 col-lg-3">
                                            <div class="my-courses__list">
                                                <img src="{{ $imgfluid }}" class="img-fluid" alt="">
                                                <div class="list-content">
                                                    <h5>{{ $course_val->course_program_title }}</h5>
                                                    <span>{{$total_syllabus}} syllabus</span>
                                                    <p>{!! optional($course_val->courseInfo)->short_content !!} </p>

                                                    @if($my_courses_check >0)
                                                      <a class="btn e-btn w-100" href="javascript:void(0)" style="background-color: #15a815;">Already Enrolled</a>
                                                    @else
                                                        <a class="btn e-btn w-100" href="{{ route('enrolment',['course_info_id'=>$course_val->id]) }}">Enroll</a>
                                                   @endif
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade neta-resources" id="resources" role="tabpanel" aria-labelledby="resources-tab">
                        <div class="row">
                            @if($resources->total() > 0)
                                @foreach($resources as $key => $value)
                                    <div class="col-sm-12">
                                        <div class="resource-box">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-8">
                                                    <h6>{{ $value->title }}</h6>
                                                    <p>{!! $value->description !!} </p>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="downloads"> 
                                                        <a target="_blank" href="{{asset($value->file_full_path).'/'.$value->source_name}}" ><i class="fa fa-eye"></i> View</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            @endif                           
                        </div>
                    </div>

                    <div class="tab-pane fade" id="readliness" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="row my-courses">
                            @php
                                $readiness_list = array('readiness_exam_1'=>'Readiness Exam 1','readiness_exam_2'=>'Readiness Exam 2',
                                    'readiness_exam_3'=>'Readiness Exam 3','readiness_exam_4'=>'Readiness Exam 4','readiness_exam_5'=>'Readiness Exam 5','readiness_exam_6'=>'Readiness Exam 6');
                                @endphp

                                @foreach($readiness_list as $key => $list)

                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                        <div class="my-courses__list">
                                            <div class="list-content">
                                                <h5>{{$list}}</h5>
                                                <span>Questions</span>
                                                <a class="btn e-btn w-100"
                                                    href="{{ route('readline-question',['readline_title'=>$key]) }}">Take Test</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                        </div>
                    </div>

                    <div class="tab-pane fade neta-resources" id="history" role="tabpanel" aria-labelledby="history-tab">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="resource-box">
                                    <div class="row col-sm-12">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>S.No.</th>
                                                    <th>Mockup Title</th>
                                                    <th>Date</th>
                                                    <th>Total Questions</th>
                                                    <th>Correct Answer</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                @if($student_histories->total() != 0)
                                                    @foreach($student_histories as $key => $value)
                                                    <tr>
                                                        <td>{{ $student_histories->firstItem() + $key }}</td>
                                                        <td>{{ $value->type == 'mockup' ? 'Mock Test Week' : 'Practice Test'}} {{ substr($value->title, -1) }}</td>
                                                        <td>{{ date('dS M, Y',strtotime($value->date)) }}</td>
                                                        <td>{{$value->total_question}}</td>
                                                        <td>{{$value->correct_answer}}</td>
                                                        <td>
                                                            <div class="history-view">
                                                                @if($value->type == 'mockup')
                                                                    <a href="{{ route('mockup.history', $value->id) }}" class="btn e-btn">View Details</a>
                                                                @else
                                                                    <a href="{{ route('practice.history', $value->id) }}" class="btn e-btn">View Details</a>
                                                                @endif
                                                            </div>
                                                        </td>
                                                      
                                                    </tr>
                                                    @endforeach
                                                @endif

                                            </tbody>
                                        </table>
                                        <span style="margin: 5px;float: right;">
                                            @if($student_histories->total() != 0)
                                            {{ $student_histories->appends(request()->except('page'))->links()  }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>                       
                        </div>
                    </div>

                    @else
                    <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="my-courses">
                            <div class="row">

                                @if($other_course)
                                    @foreach($other_course as $key => $course_val)

                                        @php
                                        $k = $key+1;
                                        $imgfluid = asset('home/img/c' .$k. '.png');

                                        $total_syllabus =
                                        App\Modules\CourseContent\Entities\CourseContent::gettotalsyllabus($course_val->id);
                                        @endphp

                                        <div class="col-sm-6 col-md-4 col-lg-3">
                                            <div class="my-courses__list">
                                                <img src="{{ $imgfluid }}" class="img-fluid" alt="">
                                                <div class="list-content">
                                                    <h5>{{ $course_val->course_program_title }}</h5>
                                                    <span>{{$total_syllabus}} syllabus</span>
                                                    <p>{!! optional($course_val->courseInfo)->short_content !!} </p>
                                                    <a class="btn e-btn w-100"
                                                        href="{{ route('enrolment',['course_info_id'=>$course_val->id]) }}">Enroll</a>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding"></section>

<!-- Warning modal -->
<div id="modal_theme_installment" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <center>
                    <i class="icon-alert text-danger icon-3x"></i>
                </center>
                <br>
                <center>
                    <p>Please pay remaining installment to access the syllabus! You might have received an email regarding the installments.</p>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </center>
            </div>
        </div>
    </div>
</div>
<!-- /warning modal -->

@include('home::layouts.footer')
