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
                        <li> <a href="{{ route('syllabus-detail',['course_info_id'=>$course_info_id]) }}">Syllabus >></a></li>
                        <li>Lesson Plan</li>
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
                    <h2 class="ttl-line">{{ $syllabus->syllabus_title}}
                    </h2>
                    <div class="row">

                    @if($lesson_info)
                        @foreach($lesson_info as $key => $lesson_val)

                        <div class="col-sm-4">
                            <div class="my-courses__list">
                                <div class="list-content">
                                    <a href="{{ route('lesson-plan-detail',['course_content_id'=>$lesson_val,'course_info_id'=>$course_info_id,'syllabus_id'=>$syllabus_id]) }}">
                                        <h5>Lesson {{ $key+1 }}</h5>
                                        <span>{{$lesson_val->lesson_title}}</span>
                                    </a>
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
