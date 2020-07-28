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
                <h2 class="ttl-line">{{ ucfirst(str_replace('_',' ',$readline_title)) }}
                </h2>
                <p>Dear student,You are about to take a Computer Adaptive Test (CAT). Please make sure that you continue the test undisturbed. 
                    Please allot 4 hours to take the test.No calculators allowed No food and drinks allowed. The computer will ask you if you would like to take a break.</p>
                
                <div class="card card-body" id="ready_div">
                    <p class="text-center"><strong>Ready to begin the test?</strong></p><br>
                    <div class="col-sm-12 row">
                        <div class="col-sm-6">
                            <a id="begin_btn" 
                            class="btn bg-danger btn-icon rounded-round" data-popup="tooltip" 
                            data-placement="bottom">Yes&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;      </a>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{route('student-courses')}}" id="begin_btn" 
                                class="btn bg-danger btn-icon rounded-round" data-popup="tooltip" 
                                data-placement="bottom">Return to Learner's Portal</a>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="col-sm-12" style="display:none" id="readine_questions">
                <h6 class="p-0 mb-0"> <label id="question_number">1</label> out of {{$mockupInfo->count()}}</h6>
               
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
                                        {!! Form::hidden('question_id[]', $question->id) !!}
                                        {!! Form::hidden('title', $readline_title) !!}

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

                   {!! Form::hidden('start_time', null, ['id'=>'start_time']) !!}
                   {!! Form::hidden('result_id', null, ['id'=>'result_id']) !!}
                    <div class="col-sm-12 neta-about">
                        <button type="submit" class="enrol-cpd mockup_submit" id="show-btn">Submit Your Answer</button> 
                        <span class="text-center" id="loaderImg" style="display:none;">
                            <img src="{{asset('home/img/loader.gif')}}" alt="loader1"
                                style="margin-left: 330px; height:200px; width:auto;">
                            <h4>Please Wait..While Saving Your Answer</h4>
                        </span>
                    </div>

                    {!! Form::close() !!}


            </div>
        </div>
    </div>`
</section>
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" />
<section class="section-padding"></section>

 <!-- Warning modal -->
 <div id="modal_theme_warning" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                 <div class="modal-body">
                    <center>
                        <i class="icon-alert text-danger icon-3x"></i>
                    </center>
                    <br>
                    <center>
                        <h2>Are You Sure Want To Delete ?</h2>
                        <a class="btn btn-success get_link" href="">Yes, Delete It!</a>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
<!-- /warning modal -->
@include('home::layouts.footer')
<script src="{{asset('admin/global/js/plugins/notifications/bootbox.min.js')}}"></script>
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

        $('#begin_btn').on('click', function() {
            
            var dt = + new Date();

            setTimeout(function(){ 
                ConfirmDialog(dt);
            },3000);
          //7200000

            $.ajax({
                type:'GET',
                url:'{{route("readline-question.saveStartTime")}}',
                data: {
                    title: '{{$readline_title}}',
                },
                success: function(res) {
                    if(res.status == 1) {
                        $('#readine_questions').css('display', '');
                        $('#ready_div').css('display', 'none');
                        $('#start_time').val(res.start_time);
                        $('#result_id').val(res.result_id);
                    } else {
                        alert('Error!');
                    }
                }
            })
          
        })

    });

    function ConfirmDialog(dt) 
    {
        bootbox.dialog({
            title: 'Take A Break Confirmation',
            message: 'You have completed two hours of the test,would you like to take a break?',
            buttons: {
                ok: {
                    label: 'Yes',
                    className: 'btn-primary',
                    callback: function(){
                        //console.log('Custom ok clicked');
                        $('#readine_questions').css('display', 'none');
                        var new_dt = dt + 60000;
                        var exceed_dt = dt + 90000;
                        var four_dt = dt + (4.5*60*60*1000);

                        var result_id = $('#result_id').val();
                        $.ajax({
                            type:'GET',
                            url:'{{route("readline-question.saveBreakTime")}}',
                            data: {
                                result_id: result_id,
                            },
                            success: function(res) {
                                if($res == 1) {
                                    alert('Enjoy your break. You have half an hour for your break');
                                } else {
                                    alert('Error!');
                                }
                            }
                        })                       
                        
                        //show questions after 30 minutes
                        setTimeout(function(){ 
                            $('#readine_questions').css('display', '');
                        }, 60000);
                        
                        // cancel test if not appear after 31 minutes
                        var time = new Date().getTime();
                        $(document.body).bind("mousemove keypress", function(e) {
                            time = new Date().getTime(); 
                        });

                        function refresh() {
                            if(new Date().getTime() - time >= 90000) 
                                window.location = '{{route("student-courses")}}';
                            else 
                                setTimeout(refresh, 10000);
                        }

                        setTimeout(refresh, 10000);

                        //auto form submit on time crosses 4h + 30 minutes break
                        setTimeout(function(){ 
                            $('#studentmockup_submit').submit();
                        }, four_dt);
                        //900000
                    },
                },
                cancel: {
                    label: 'Cancel',
                    className: 'btn-link',
                    callback: function(){
                        var dt = + new Date(); 
                        var four_dt = dt + (4*60*60*1000);

                        setTimeout(function(){ 
                            $('#studentmockup_submit').submit();
                        }, four_dt);
                    },
                },
            }
        });
    }


</script>
