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
                    <!-- @if($courseInfo->status == 0)
                        <p>Please pay remaining installment to access the syllabus! You might have received an email regarding the installments.</p>
                    @else -->
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
                        </div>
                    <!-- @endif -->
                </div>
            </div>

        </div>
    </div>
</section>

<section class="section-padding"></section>

@include('home::layouts.footer')