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
                        <li> <a href="{{ route('student-courses') }}">Courses >></a></li>
                        <li> Syllabus</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>



<section class="neta-about student-hub section-padding">
    <div class="container">
         @include('flash::message')
        <div class="row">

            <div class="col-sm-12">

                <div class="my-courses">
                    <h2 class="ttl-line">All syllabus</h2>
                    @if($courseInfo->status == 0)
                        <p>Please pay remaining installment to access the syllabus! You might have received an email regarding the installments.</p>
                    @else
                        <p>Find All Syllabus related to your Courses.</p>
                        <div class="row">

                        
                            @if($syllabus_info)
                                @foreach($syllabus_info as $key => $syllabi_val)

                                @php
                                    $total_lesson = App\Modules\CourseContent\Entities\CourseContent::gettotallesson($syllabi_val->syllabus_id,$course_info_id);
                                @endphp

                                <div class="col-sm-12 col-md-6 col-lg-3">
                                    <div class="my-courses__list">
                                        <div class="list-content">
                                            <a href="{{ route('lesson-detail',['syllabus_id'=>$syllabi_val->syllabus_id,'course_info_id'=>$course_info_id]) }}">
                                            <h5>{{ optional($syllabi_val->syllabus)->syllabus_title}}</h5>
                                            <span>{{$total_lesson}} Lessons</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                       


                            <div class="col-sm-12 col-md-6 col-lg-3">
                                <div class="my-courses__list">
                                    <div class="list-content">
                                        <a href="{{ route('resouces-detail',['course_info_id'=>$course_info_id,'course_type'=>$course_name]) }}">
                                        <h5>Resources[{{$course_name}}]</h5>
                                        <span>View Resources</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>    
                    @endif
                </div>

                @if($course_info_id == '1')
                <div class="my-courses">
                    <h2 class="ttl-line">Student Test</h2>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="practice-tab" data-toggle="tab" href="#practice" role="tab"
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
                </ul>
                </div>
       

                <div class="tab-content" id="myTabContent">

                   <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                       <div class="my-courses">
                           <div class="row">

                               @php
                               $mockup_list = array('mockup_test_week_1'=>'Mock Test 1','mockup_test_week_2'=>'Mock Test 2',
                                   'mockup_test_week_3'=>'Mock Test 3','mockup_test_week_4'=>'Mock Test 4',
                                   'mockup_test_week_5'=>'Mock Test 5','mockup_test_week_6'=>'Mock Test 6',
                                   'mockup_test_week_7'=>'Mock Test 7','mockup_test_week_8'=>'Mock Test 8',
                                   'add_practice_test_1'=>'Mock Test 9', 'add_practice_test_2'=>'Mock Test 10', 
                                   'add_practice_test_3'=>'Mock Test 11','management_of_care'=>'Management of Care',
                                   'safety_and_infection_control'=>'Safety and Infection Control','health_promotion_and_maintenance'=>'Health Promotion and Maintenance',
                                   'psychosocial_integrity'=>'Psychosocial Integrity','basic_care_and_comfort'=>'Basic Care and Comfort',
                                   'pharmacological_and_parenteral_therapies'=>'Pharmacological and Parenteral Therapies','reduction_of_risk_potential'=>'Reduction of Risk Potential',
                                   'physiological_adaptation'=>'Physiological Adaptation');
                               @endphp

                               @foreach($mockup_list as $key => $list)

                                   @php 
                                       $total_quesion = App\Modules\Mockup\Entities\Mockup::gettotalQuestion($key);
                                       $student_id = Auth::guard('student')->user()->id;
                                       $testStatus = App\Modules\Student\Entities\StudentMockupResult::checkTestStatus($student_id,$key);
                                       $text = ($testStatus) ? 'Resume Test' : 'Take Test';
                                       $color = ($testStatus) ? "style=background-color:#15a815;" : '';
                                   @endphp

                                   <div class="col-sm-6 col-md-4 col-lg-3">
                                       <div class="my-courses__list">
                                           <div class="list-content">
                                               <h5>{{$list}}</h5>
                                               <span>{{$total_quesion}} Questions</span>
                                               <a class="btn e-btn w-100" href="{{ route('mockup-question',['mockup_title'=>$key,'course_info_id' => $course_info_id]) }}" {{$color}}>{{$text}}</a>
                                           </div>
                                       </div>
                                   </div>
                               @endforeach

                           </div>
                       </div>
                   </div>

                   <div class="tab-pane fade show active" id="practice" role="tabpanel" aria-labelledby="practice-tab">
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
                                               <a class="btn e-btn w-100" href="{{ route('practice-question',['practice_title'=>$key,'course_info_id' => $course_info_id]) }}">Take Test</a>
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
<!-- 
                   <div class="tab-pane fade neta-resources" id="resources-nclex" role="tabpanel" aria-labelledby="resources-nclex-tab">
                       <div class="row">
                           @if($resources_nclex->total() > 0)
                               @foreach($resources_nclex as $key => $value)
                                   <div class="col-sm-12">
                                       <div class="resource-box">
                                           <div class="row">
                                               <div class="col-sm-12 col-md-8">
                                                   <h6>{{ $value->title }}</h6>
                                                   <p>{!! $value->description !!} </p>
                                               </div>
                                               <div class="col-sm-12 col-md-4">
                                                   <div class="downloads"> 
                                                       <a target="_blank" href="{{ route('student-resources-view',['resources_id'=>$value->id]) }}" class="btn btn-neta float-right" style="background: #B0117E;color: white;"><b><i class="fa fa-eye"></i></b>View</a>

                                                   </div>
                                               </div>
                                           </div>
                                       </div>

                                   </div>
                               @endforeach
                           @else
                               <span>No NCLEX Resources Added</span>
                           @endif                           
                       </div>
                   </div> -->

   <!--                 <div class="tab-pane fade neta-resources" id="resources-osce" role="tabpanel" aria-labelledby="resources-osce-tab">
                       <div class="row">

                       @if($student_osce_course->total() >0)
                           @if($resources_osce->total() > 0)
                               @foreach($resources_osce as $key => $value)
                                   <div class="col-sm-12">
                                       <div class="resource-box">
                                           <div class="row">
                                               <div class="col-sm-12 col-md-8">
                                                   <h6>{{ $value->title }}</h6>
                                                   <p>{!! $value->description !!} </p>
                                               </div>
                                               <div class="col-sm-12 col-md-4">
                                                   <div class="downloads"> 
                                                       <a target="_blank" href="{{ route('student-resources-view',['resources_id'=>$value->id]) }}" class="btn btn-neta float-right" style="background: #B0117E;color: white;"><b><i class="fa fa-eye"></i></b>View</a>

                                                   </div>
                                               </div>
                                           </div>
                                       </div>

                                   </div>
                               @endforeach
                           @else
                                <div class="col-sm-12">
                                   <div class="resource-box">
                                       <div class="row">
                                           <div class="col-sm-12 col-md-8">
                                           <span>No OSCE Resources Added</span>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           @endif    
                       @else
                           <div class="col-sm-12">
                                   <div class="resource-box">
                                       <div class="row">
                                           <div class="col-sm-12 col-md-8">
                                           <span>Sorry, You have not Enrol OSCE Course.Please Enrol to Access.</span>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       @endif

                       </div>
                   </div> -->


                   <div class="tab-pane fade" id="readliness" role="tabpanel" aria-labelledby="contact-tab">
                       <div class="row my-courses">
                           @php
                               $readiness_list = array('readiness_exam_1'=>'Readiness Exam 1','readiness_exam_2'=>'Readiness Exam 2',
                                   'readiness_exam_3'=>'Readiness Exam 3','readiness_exam_4'=>'Readiness Exam 4','readiness_exam_5'=>'Readiness Exam 5','readiness_exam_6'=>'Readiness Exam 6',
                                   'management_of_care'=>'Management of Care',
                                   'safety_and_infection_control'=>'Safety and Infection Control','health_promotion_and_maintenance'=>'Health Promotion and Maintenance',
                                   'psychosocial_integrity'=>'Psychosocial Integrity','basic_care_and_comfort'=>'Basic Care and Comfort',
                                   'pharmacological_and_parenteral_therapies'=>'Pharmacological and Parenteral Therapies','reduction_of_risk_potential'=>'Reduction of Risk Potential',
                                   'physiological_adaptation'=>'Physiological Adaptation');
                               @endphp

                               @foreach($readiness_list as $key => $list)

                                   @php 
                                       $student_id = Auth::guard('student')->user()->id;
                                       $testStatus = App\Modules\Student\Entities\StudentReadinessResult::checkTestStatus($student_id,$key);
                                       $text = ($testStatus) ? 'Resume Test' : 'Take Test';
                                       $color = ($testStatus) ? "style=background-color:#15a815;" : '';
                                   @endphp

                                   <div class="col-sm-6 col-md-4 col-lg-3">
                                       <div class="my-courses__list">
                                           <div class="list-content">
                                               <h5>{{$list}}</h5>
                                               <span>Questions</span>
                                               <a class="btn e-btn w-100" href="{{ route('readline-question',['readline_title'=>$key,'course_info_id' => $course_info_id]) }}" {{$color}}>{{$text}}</a>
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

                                                   @php
                                                       if($value->type == 'mockup'){
                                                           $title = 'Mock Test Week'.' '.substr($value->title, -1);
                                                       }
                                                       if($value->type == 'practice'){
                                                           $title = 'Practice Test'.' '.substr($value->title, -1);
                                                       }
                                                       if($value->type == 'readiness'){
                                                           $title = 'Readiness Test'.' '.substr($value->title, -1);
                                                       }


                                                   @endphp
                                                   <tr>
                                                       <td>{{ $student_histories->firstItem() + $key }}</td>
                                                       <td>{{ $title }} </td>
                                                       <td>{{ date('dS M, Y',strtotime($value->date)) }}</td>
                                                       <td>{{$value->total_question}}</td>
                                                       <td>{{$value->correct_answer}}</td>
                                                       <td>
                                                           <div class="history-view">
                                                               @if($value->type == 'mockup')
                                                                   <a href="{{ route('mockup.history', $value->id) }}" class="btn e-btn">View Details</a>
                                                               @endif    
                                                               @if($value->type == 'practice')
                                                                   <a href="{{ route('practice.history', $value->id) }}" class="btn e-btn">View Details</a>
                                                               @endif    
                                                               @if($value->type == 'readiness')
                                                                   <a href="{{ route('readiness.history', $value->id) }}" class="btn e-btn">View Details</a>
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

              

               </div>

               @endif


              
            </div>

        </div>
    </div>
</section>

<section class="section-padding"></section>

@include('home::layouts.footer')