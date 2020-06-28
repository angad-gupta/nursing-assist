
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

			<p>Here are the answer sheets</p> 
			<div class="row answer-sheet b-line"> 

				
				@if(sizeof($quiz_history)>0)
                    @foreach($quiz_history as $keys => $answer)
                    @php
                     $keys = $keys +1; 
                     if (preg_match('/[\[\]\'^£$%&*()}{@#~?><>,|=_+¬-]/', $answer->answer))
						{
							$multipl_ans = json_decode($answer->answer);
                    		$prefix = $option_val = '';
                    		foreach($multipl_ans as $key => $ans){
                    		 	$value = explode("_", $ans);
                    			$answer_list = $value[0].' '.$value[1];  

                    			$option_val .= $prefix . ucwords($answer_list);
								$prefix = ', ';
                    		}

						}else{
							$option_val= $answer->answer; 
						}
                     
                    @endphp
					
					<div class="col-sm-4"> 
						<span>Q{{$keys}}. {{ $option_val }}</span> 
					</div> 

					@endforeach
				@endif

			</div> 
		</div>

	<div class="col-sm-6 neta-about">
    	 <button class="enrol-cpd" id="show-btn"><a href="{{ route('student-courses') }}">Back To Course</a></button>
 	</div>


	</div>


</section>


<section class="section-padding"></section>
@include('home::layouts.footer')