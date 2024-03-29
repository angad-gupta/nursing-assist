
@include('home::layouts.navbar-inner')

<section class="neta-ribbon"> 
    <img src="img/cc.jpg" class="img-fluid" alt="">
    <div class="container">
        <div class="row">
            <div class="neta-ribbon__content">
                <div class="col-sm-12">
                    <h1 class="mb-0">Readiness Exam History</h1>
                    <ul class="list-unstyled d-flex">
                        <li> <a href="{{ route('home') }}">Home >> </a></li>
                        <li> <a href="{{ route('student-courses') }}">Courses >></a></li>
                        <li>Readiness Exam History</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="neta-enrolment neta-quiz neta-contact  section-padding">
    <div class="container">
        <div class="form-card"> 
            <h2 class="fs-title mb-0">Readiness Exam Test History</h2>
            <div class="neta-head text-center m-5">
                <h4 class="mb-0">Here are the answer sheets with Reason</h4>
            </div>

             <div class="accordion" id="accordionExample">

                @foreach($readiness_history as $kys => $readiness)

                @php 
                if (preg_match('/[\[\]\'^£$%&*()}{@#~?><>,|=_+¬-]/', optional($readiness->readiness)->correct_option))
                        {
                            $multipl_ans = json_decode(optional($readiness->readiness)->correct_option);
                            $prefix = $option_val = '';
                            foreach($multipl_ans as $key => $ans){
                                $value = explode("_", $ans);
                                $answer_list = $value[0].' '.$value[1];  

                                $option_val .= $prefix . ucwords($answer_list);
                                $prefix = ', ';
                            }

                        }else{
                            $option_val= optional($readiness->readiness)->correct_option; 
                        }

                if (preg_match('/[\[\]\'^£$%&*()}{@#~?><>,|=_+¬-]/', $readiness->answer))
                        {
                            $multipl_my_ans = json_decode($readiness->answer);
                            $mprefix = $moption_val = '';
                            foreach($multipl_my_ans as $key => $myans){
                                $mvalue = explode("_", $myans);
                                $manswer_list = $mvalue[0].' '.$mvalue[1];  

                                $moption_val .= $mprefix . ucwords($manswer_list);
                                $mprefix = ', ';
                            }

                        }else{
                            $moption_val= $readiness->answer; 
                        }   

                    $color_status = ($option_val == $moption_val) ? "text-success" : "text-danger"; 
                    $main_color_status = ($option_val == $moption_val) ? "bg-success" : "bg-danger";    

                @endphp

                <div class="card">
                    <div class="card-header {{ $main_color_status }}" data-toggle="collapse"
                        data-target="#collapse_{{$kys}}" aria-expanded="true">
                        <span class="title">{{optional($readiness->readiness)->question}}</span>
                    </div>
                    <div id="collapse_{{$kys}}" class="collapse show"
                        data-parent="#accordionExample">
                        <div class="card-body">

                            
                            <p>Your Answer is <span class="{{$color_status}}"><b>{{ $moption_val }}</b></span></a>
                            <p>Correct Answer is <span class="text-success"><b>{{ $option_val }}</b></span></a>
                            </p>
                            <p>
                                <span class="text-success"><b>Reason</b></span>: {!! optional($readiness->readiness)->correct_answer_reason !!}
                            </p>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>

        </div>

    <div class="col-sm-6 neta-about">
         <button class="enrol-cpd" id="show-btn"><a href="{{ route('student-courses') }}">Back To Course</a></button>
    </div>


    </div>


</section>


<section class="section-padding"></section>
@include('home::layouts.footer')