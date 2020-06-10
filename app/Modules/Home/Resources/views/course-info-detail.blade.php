@include('home::layouts.navbar-inner')


<section class="neta-ribbon">
    <img src="img/cc.jpg" class="img-fluid" alt="">
    <div class="container">
        <div class="row">
            <div class="neta-ribbon__content">
                <div class="col-sm-12">
                    <h1 class="mb-0">NCLEX</h1>
                    <ul class="list-unstyled d-flex">
                        <li> <a href="{{ route('home') }}">Home  >> </a></li>
                        <li> <a href="{{ route('course-detail',['course_id'=>optional($course_info_detail->Course)->id]) }}">{{optional($course_info_detail->Course)->title}} >></a></li>
                        <li>{{$course_info_detail->course_program_title}}</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="courses-wrap">
    <div class="container section-padding">
        <div class="row">
            <div class="col-sm-12">
                <div class="courses-wrap__content neta-about">
                    <h2 class="ttl-line">{{ $course_info_detail->course_program_title}}</h2>
                    <div class="oba-introduction b-line">
                       {!! $course_info_detail->description !!}
                    
                                <div class="course-iframe">
                                  @if($course_info_detail->type == 'video')
                                     <iframe class="d-block m-auto" width="75%" height="400" src="https://www.youtube.com/embed/{{ $course_info_detail->youtube_id }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                     @else

                                      @php
                                         $courseImage = ($course_info_detail->image_path) ? asset($course_info_detail->file_full_path).'/'.$course_info_detail->image_path : asset('admin/default.png');
                                    @endphp
                                     <img width="75%" height="400" src="{{ $courseImage }}" class="d-block m-auto">
                                     @endif
                                </div>

    
                    </div>

                    <div class="c-blt b-line">
                        <h6>Course Duration</h6>
                       <ul class="list-unstyled">
                           <li>{{ $course_info_detail->course_duration_period}}</li>
                       </ul>
                    </div>

                    <div class="c-blt b-line">
                        <h6>Mode of Delivery</h6>
                       <ul class="list-unstyled">
                          @if(sizeof($course_info_detail->CourseModeOfDelivery)>0)
                              @foreach($course_info_detail->CourseModeOfDelivery as $key => $delivery_val)
                                 <li>{{$delivery_val->delivery_title}}</li>
                              @endforeach
                            @endif
                       </ul>
                    </div>

                    <div class="c-blt b-line">
                        <h6>Structure</h6>
                       <ul class="list-unstyled">
                            @if(sizeof($course_info_detail->CourseStructure)>0)
                              @foreach($course_info_detail->CourseStructure as $key => $structure_val)
                                 <li>{{$structure_val->structure_title}}</li>
                              @endforeach
                            @endif
                       </ul>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>

@include('home::layouts.footer')