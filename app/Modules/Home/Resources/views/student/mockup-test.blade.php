@include('home::layouts.navbar-inner')
<style>
#time { background-color: cyan; font-size:x-large;padding:5px 30px 5px 30px}
</style>
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
                <h2 class="ttl-line">Mock Test Week {{ substr($mockup_title, -1) }}</h2>
                <p>Comprehension, Analysis and Application level questions from all categories using the Related
                    Courses. Complete the test in a quiet environment. </p>
                
                    @if($is_new)
                        <div class="neta-courses" style="color: #db1515;">
                            <marquee><h5>You have Already Attempted {{$qnos}} Question Answer. Please Complete Remaining Test Questions.</h5></marquee>
                        </div>
                    @endif

                <div class="card card-body" id="timer_div">
                    
                    <div class="col-sm-12 row ">
                        <div class="col-sm-12 row justify-content-center">
                            <p id="time" class="text-center">{{ $time }}</p>
                        </div>
                        <div class="col-sm-12 row justify-content-center">
                            <div class="col-sm-2">
                                <a id="pause_btn" class="btn bg-danger btn-icon rounded-round" data-popup="tooltip">Pause Timer</a>
                            
                            </div>
                            <div class="col-sm-2">
                                <a id="resume_btn" class="btn bg-danger btn-icon rounded-round" data-popup="tooltip" >Resume Timer</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-sm-12">
                <h6 class="p-0 mb-0"> <label id="question_number">1</label> out of {{$mockupInfo->count()}}</h6>
                {{--<div class="accordion" id="accordionExample">--}}

                    {!! Form::open(['route'=>'studentmockup.store','method'=>'POST','id'=>'studentmockup_submit','class'=>'form-horizontal','role'=>'form','files'=> true]) !!}

                    @php $last_key = $mockupInfo->keys()->last(); @endphp

                    @foreach($mockupInfo as $key => $question)
                    @php 
                        $key = $key + 1; 
                        $result_id = ($result_id) ? $result_id : null;
                    @endphp
                    
                    <div class="card" style="display: {{ $key == 1 ? '' : 'none' }}" id="question_{{$key}}">
                        <div class="card-header" data-toggle="collapse" data-target="#collapse{{$key}}"
                            aria-expanded="true">
                            <span class="title">{{$key}}. {{ $question->question }}</span><br>
                            @if($question->additional_image)
                             @php
                                $image = asset($question->file_full_path).'/'.$question->additional_image;
                            @endphp

                                <span class="title"><img src="{{$image}}" height="50%" width="50%"></span>
                            @endif 
                        </div>
                        <div id="collapse{{$key}}" class="collapse show" data-parent="#accordionExample">
                            <div class="card-body demo-quiz neta-about">
                                <div class="">
                                    <div class="row">
                                        {!! Form::hidden('question_id[]', $question->id, ['class'=>'question_id']) !!}
                                        {!! Form::hidden('mockup_title', $mockup_title, ['class'=>'mockup_title']) !!}
                                        {!! Form::hidden('question_type[]', $question->question_type, ['class'=>'question_type']) !!}
                                        {!! Form::hidden('mockup_result_id', $result_id, ['class'=>'mockup_result_id']) !!}

                                        @if($question->question_type == 'multiple')
                                        <div class="col-sm-6">
                                            <div class="e-input">
                                                <input type="checkbox" name="question_option_{{$key}}[]"
                                                    value="option_a" class="question_option" />
                                                <label for="">A. {{ $question->option_1 }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="e-input">
                                                <input type="checkbox" name="question_option_{{$key}}[]"
                                                    value="option_b"  class="question_option" />
                                                <label for="">B. {{ $question->option_2 }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="e-input">
                                                <input type="checkbox" name="question_option_{{$key}}[]"
                                                    value="option_c"  class="question_option" />
                                                <label for="">C. {{ $question->option_3 }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="e-input">
                                                <input type="checkbox" name="question_option_{{$key}}[]"
                                                    value="option_d"   class="question_option" />
                                                <label for="">D. {{ $question->option_4 }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="e-input">
                                                <input type="checkbox" name="question_option_{{$key}}[]"
                                                    value="option_e"   class="question_option" />
                                                <label for="">E. {{ $question->option_5 }}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="e-input">
                                                <input type="checkbox" name="question_option_{{$key}}[]"
                                                    value="option_f"   class="question_option" />
                                                <label for="">F. {{ $question->option_6 }}
                                                </label>
                                            </div>
                                        </div>

                                        @else

                                        <div class="col-sm-6">
                                            <div class="e-input">
                                                <input type="radio" name="question_option_{{$key}}[]" value="true"  class="question_option"/>
                                                <label for="">True
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6"></div>
                                        <div class="col-sm-6">
                                            <div class="e-input">
                                                <input type="radio" name="question_option_{{$key}}[]" value="false"   class="question_option"/>
                                                <label for="">False
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6"></div>

                                        @endif
                                        @if($last_key + 1 == $key)
                                            <div class="col-sm-6">
                                                <button type="button" class="enrol-cpd mockup_submit" id="show-btn"  data-id="{{$key}}" >Submit Your Answer</button>
                                            </div>
                                        @else
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
                        {{--<button type="submit" class="enrol-cpd mockup_submit" id="show-btn">Submit Your Answer</button>--}}
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
        Clock.start();

        $('#pause_btn').click(function () { 
            Clock.pause();
            $('.enrol-cpd').hide();
            });
        $('#resume_btn').click(function () { 
              var r = confirm("Are you Sure Want To Resume ?");
              if (r == true) {
                $('.enrol-cpd').show();
                Clock.resume();
              } else {
                Clock.pause();
                $('.enrol-cpd').hide();
              }
             
         });

        $('.mockup_submit').on('click', function () {
            $('#loaderImg').show();
            $('.mockup_submit').attr('disabled', true);
            $('.mockup_submit').prepend('<i class="icon-spinner4 spinner"></i>');

            var qkey = $(this).attr('data-id');
            var index = qkey - 1;
            var mockup_title = $('.mockup_title').val();
            var mockup_result_id = $('.mockup_result_id').val();
            var time = $('#time').html(); 
            var question_id = $('.question_id').eq(index).val();
            var question_type = $('.question_type').eq(index).val();
  
            var ans_array = [];
            if(question_type == 'multiple') {
               // $('.question_option:eq('+index+'):checkbox:checked')
                var checkedVals =  $('input[name="question_option_'+qkey+'[]"]:checked').map(function() {
                    ans_array.push(this.value);
                });
            } else {
               var ans_array =  $('input[name="question_option_'+qkey+'[]"]:checked').val();
            }
       
            var token = '{{csrf_token()}}';

            $.ajax({
                type: 'POST',
                url: '{{route("studentmockup.ajaxStore")}}',
                data: { mockup_title: mockup_title, question_id: question_id, answers: ans_array, qkey: qkey, mockup_result_id:mockup_result_id,time:time, _token: token },
                success: function (res) {
                    if(res == 0) {
                        alert('Please provide answer');
                        return false;
                    } else if (res == 2) {
                        alert('Saving Answer error!Please try again');
                        return false;
                    } else {
                        $('#studentmockup_submit').submit();
                        return true;
                    }
                }

            }) 
            
        });

        $('.show-btn').on('click', function () {
            var qkey = $(this).attr('data-id');
            var new_key = parseInt(qkey, 10) + 1;

            var index = qkey - 1;
            var mockup_title = $('.mockup_title').val();
            var mockup_result_id = $('.mockup_result_id').val();
            var time = $('#time').html();
            var question_id = $('.question_id').eq(index).val();
            var question_type = $('.question_type').eq(index).val();
  
            var ans_array = [];
            if(question_type == 'multiple') {
                var checkedVals =  $('input[name="question_option_'+qkey+'[]"]:checked').map(function() {
                    ans_array.push(this.value);
                });
            } else {
               var ans_array =  $('input[name="question_option_'+qkey+'[]"]:checked').val();
            }
  
            var token = '{{csrf_token()}}';

            $.ajax({ 
                type: 'POST',
                url: '{{route("studentmockup.ajaxStore")}}',
                data: { mockup_title: mockup_title, question_id: question_id, answers: ans_array, qkey: qkey,mockup_result_id:mockup_result_id,time:time, _token: token },
                success: function (res) {
                    if(res == 0) {
                        alert('Please provide answer');
                        return false;
                    } else if(res == 2) {
                        alert('Saving Answer error!Please try again');
                        return false;
                    } else {
                         $('#question_'+qkey).css('display', 'none');
                        $('#question_'+new_key).css('display', 'block');
                        $('#question_number').text(new_key);
                        $('.mockup_result_id').val(res);
                        return true;
                    }

                }
            })
        });

    });


    var actual_time = $('#time').html(); 
    var rtime = actual_time.split(":");
    var secondssss = (+rtime[0]) * 60 * 60 + (+rtime[1]) * 60 + (+rtime[2]); 

    var Clock = {
        totalSeconds: parseInt(secondssss),

        start: function () {
            var self = this;

            this.interval = setInterval(function () {
                self.totalSeconds += 1;

                // Time calculations for days, hours, minutes and seconds
                var hours = Math.floor(self.totalSeconds / 3600);
                var minutes = Math.floor(self.totalSeconds / 60 % 60);
                var seconds = Math.floor(self.totalSeconds % 60);
                document.getElementById("time").innerHTML = pad(hours, 2) + ":"+ pad(minutes, 2) + ":" + pad(seconds, 2);

            }, 1000);
        },

        pause: function () {
            clearInterval(this.interval);
            delete this.interval;
        },

        resume: function () {
            if (!this.interval) this.start();
        }
    };

    function pad (str, max) {
      str = str.toString();
      return str.length < max ? pad("0" + str, max) : str;
    }

</script>
