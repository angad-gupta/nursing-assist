@include('home::layouts.navbar-inner')

<section class="neta-ribbon">
    <img src="img/cc.jpg" class="img-fluid" alt="">
    <div class="container">
        <div class="row">
            <div class="neta-ribbon__content">
                <div class="col-sm-12">
                    <h1 class="mb-0">Mock Test</h1>
                    <ul class="list-unstyled d-flex">
                        <li> <a href="{{ route('home') }}">Home >> </a></li>
                        <li> <a href="{{ route('student-courses') }}">Courses >></a></li>
                        <li>Mock Test</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="neta-enrolment neta-quiz neta-contact  section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="ttl-line">{{ ucfirst(str_replace('_',' ',$mockup_title)) }}
                </h2>
                <p>Comprehension, Analysis and Application level questions from all categories using the Related
                    Courses. Complete the test in a quiet environment. </p>
            </div>

            <div class="col-sm-12">
                <h6 class="p-0 mb-0"> <label id="question_number">1</label> out of {{$mockupInfo->count()}}</h6>
                {{--<div class="accordion" id="accordionExample">--}}

                    {!! Form::open(['route'=>'studentmockup.store','method'=>'POST','id'=>'studentmockup_submit','class'=>'form-horizontal','role'=>'form','files'=> true]) !!}

                    @php $last_key = $mockupInfo->keys()->last(); @endphp

                    @foreach($mockupInfo as $key => $question)
                    @php $key = $key + 1; @endphp
                    
                    <div class="card" style="display: {{ $key == 1 ? '' : 'none' }}" id="question_{{$key}}">
                        <div class="card-header" data-toggle="collapse" data-target="#collapse{{$key}}"
                            aria-expanded="true">
                            <span class="title">{{$key}}. {{ $question->question }}</span>
                        </div>
                        <div id="collapse{{$key}}" class="collapse show" data-parent="#accordionExample">
                            <div class="card-body demo-quiz neta-about">
                                <div class="">
                                    <div class="row">
                                        {{ Form::hidden('question_id[]', $question->id) }}
                                        {{ Form::hidden('mockup_title', $mockup_title) }}

                                        @if($question->question_type == 'multiple')
                                        <div class="col-sm-6">
                                            <div class="e-input">
                                                <input type="checkbox" name="question_option_{{$key}}[]"
                                                    value="option_a" />
                                                <label for="">A. {{ $question->option_1 }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="e-input">
                                                <input type="checkbox" name="question_option_{{$key}}[]"
                                                    value="option_b" />
                                                <label for="">B. {{ $question->option_2 }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="e-input">
                                                <input type="checkbox" name="question_option_{{$key}}[]"
                                                    value="option_c" />
                                                <label for="">C. {{ $question->option_3 }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="e-input">
                                                <input type="checkbox" name="question_option_{{$key}}[]"
                                                    value="option_d" />
                                                <label for="">D. {{ $question->option_4 }}
                                                </label>
                                            </div>
                                        </div>

                                        @else

                                        <div class="col-sm-6">
                                            <div class="e-input">
                                                <input type="radio" name="question_option_{{$key}}[]" value="true" />
                                                <label for="">True
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6"></div>
                                        <div class="col-sm-6">
                                            <div class="e-input">
                                                <input type="radio" name="question_option_{{$key}}[]" value="false" />
                                                <label for="">False
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6"></div>

                                        @endif
                                        {{--
                                            <div class="col-sm-6">
                                                <button type="submit" class="enrol-cpd mockup_submit" id="show-btn">Submit Your Answer</button>
                                        </div>--}}
                                        @if($last_key + 1 != $key)
                                        <div class="col-sm-6">
                                            <button type="button" name="next" class="enrol-cpd show-btn"
                                                data-id="{{$key}}">Next Question</button>
                                        </div>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                   
                   
                    <div class="col-sm-12 neta-about">
                        <button type="submit" class="enrol-cpd mockup_submit" id="show-btn">Submit Your Answer</button> 
                        <span class="text-center" id="loaderImg" style="display:none;">
                            <img src="{{asset('home/img/loader.gif')}}" alt="loader1"
                                style="margin-left: 330px; height:200px; width:auto;">
                            <h4>Please Wait..While Saving Your Answer</h4>
                        </span>
                    </div>

                    {!! Form::close() !!}

                {{--</div>--}}

            </div>
        </div>
    </div>
</section>

<section class="section-padding"></section>
@include('home::layouts.footer')

<script type="text/javascript">
    $(document).ready(function () {

        $('#studentmockup_submit').submit(function () {
            $('#loaderImg').show();
            $('.mockup_submit').attr('disabled', true);
            $('.mockup_submit').prepend('<i class="icon-spinner4 spinner"></i>');
            return true;
        });

        $('.show-btn').on('click', function () {
            var qkey = $(this).attr('data-id');
            var new_key = parseInt(qkey, 10) + 1;
            $('#question_'+qkey).css('display', 'none');
            $('#question_'+new_key).css('display', 'block');
            $('#question_number').text(new_key);
        });

    });

</script>
