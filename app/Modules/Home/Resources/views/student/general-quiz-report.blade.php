
@include('home::layouts.navbar-inner')


<section class="neta-enrolment neta-quiz neta-contact  section-padding">
	<div class="container">
		<div class="form-card"> 
			<h2 class="fs-title mb-0">Result</h2>
			<p>You have successfully completed the practice test. Below is your result</p> 
			<div class="row b-line"> 
				<div class="col-sm-3 text-center"> 
					<div class="quiz-score"> 
						<h2>{{$correct_answer}}</h2> 
						<span>Correct Answer</span> 
					</div> 
				</div>

				<div class="col-sm-3 text-center"> 
					<div class="quiz-score"> 
						<h2>{{$incorrect_answer}}</h2> 
						<span>Incorrect Answer</span> 
					</div> 
				</div> 
				
				<div class="col-sm-3 text-center"> 
					<div class="quiz-score"> 
						<h2>{{$correct_percent}} %</h2> 
						<span>Correct Answer</span> 
					</div> 
				</div>

			</div> 

			<div class="neta-head text-center m-5">
				<h4 class="mb-0">Here are the answer sheets with Reason</h4>
			</div>

			 <div class="accordion" id="accordionExample">

			 	@foreach($quiz_history as $kys => $quiz)

			 @php 
            	if (preg_match('/[\[\]\'^£$%&*()}{@#~?><>,|=_+¬-]/', $quiz->quizInfo->correct_option))
						{
							$multipl_ans = json_decode($quiz->quizInfo->correct_option);
                    		$prefix = $option_val = '';
                    		foreach($multipl_ans as $key => $ans){
                    		 	$value = explode("_", $ans);
                    			$answer_list = $value[0].' '.$value[1];  

                    			$option_val .= $prefix . ucwords($answer_list);
								$prefix = ', ';
                    		}

						}else{
							$option_val= $quiz->quizInfo->correct_option; 
						}

				if (preg_match('/[\[\]\'^£$%&*()}{@#~?><>,|=_+¬-]/', $quiz->answer))
						{
							$multipl_my_ans = json_decode($quiz->answer);
                    		$mprefix = $moption_val = '';
                    		foreach($multipl_my_ans as $key => $myans){
                    		 	$mvalue = explode("_", $myans);
                    			$manswer_list = $mvalue[0].' '.$mvalue[1];  

                    			$moption_val .= $mprefix . ucwords($manswer_list);
								$mprefix = ', ';
                    		}

						}else{
							$moption_val= $quiz->answer; 
						}	

					$color_status = ($option_val == $moption_val) ? "text-success" : "text-danger";	
					$main_color_status = ($option_val == $moption_val) ? "bg-success" : "bg-danger";	

            	@endphp


                <div class="card">
                    <div class="card-header {{ $main_color_status }} " data-toggle="collapse"
                        data-target="#collapse_{{$kys}}" aria-expanded="true">
                        <span class="title">{{optional($quiz->quizInfo)->question}}</span>
                    </div>
                    <div id="collapse_{{$kys}}" class="collapse show"
                        data-parent="#accordionExample">
                        <div class="card-body">
                        	<p>Your Answer is <span class="{{$color_status}}"><b>{{ $moption_val }}</b></span></a>
                            <p>Correct Answer is <span class="text-success"><b>{{ $option_val }}</b></span></a>
                            </p>
                            <p>
                                <span class="text-success"><b>Reason</b></span>: {!! optional($quiz->quizInfo)->correct_answer_reason !!}
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