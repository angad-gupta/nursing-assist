
@include('home::layouts.navbar-inner')


<section class="neta-enrolment neta-quiz neta-contact  section-padding">
	<div class="container">
		<div class="form-card"> 
			<h2 class="fs-title mb-0">Mockup Result</h2>
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

			 	@foreach($mockup_history as $kys => $mockup)

                <div class="card">
                    <div class="card-header" data-toggle="collapse"
                        data-target="#collapse_{{$kys}}" aria-expanded="true">
                        <span class="title">{{optional($mockup->mockupInfo)->question}}</span>
                    </div>
                    <div id="collapse_{{$kys}}" class="collapse show"
                        data-parent="#accordionExample">
                        <div class="card-body">

                        	@php ;
                        	if (preg_match('/[\[\]\'^£$%&*()}{@#~?><>,|=_+¬-]/', $mockup->mockupInfo->correct_option))
									{
										$multipl_ans = json_decode($mockup->mockupInfo->correct_option);
			                    		$prefix = $option_val = '';
			                    		foreach($multipl_ans as $key => $ans){
			                    		 	$value = explode("_", $ans);
			                    			$answer_list = $value[0].' '.$value[1];  

			                    			$option_val .= $prefix . ucwords($answer_list);
											$prefix = ', ';
			                    		}

									}else{
										$option_val= $mockup->mockupInfo->correct_option; 
									}

                        	@endphp
                            <p>Correct Answer is <span class="text-success"><b>{{ $option_val }}</b></span></a>
                            </p>
                            <p>
                                <span class="text-success"><b>Reason</b></span>: {!! optional($mockup->mockupInfo)->correct_answer_reason !!}
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