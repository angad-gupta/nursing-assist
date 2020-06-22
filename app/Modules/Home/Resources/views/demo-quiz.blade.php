@include('home::layouts.navbar-inner')

<section class="neta-ribbon">
    <img src="img/cc.jpg" class="img-fluid" alt="">
    <div class="container">
        <div class="row">
            <div class="neta-ribbon__content">
                <div class="col-sm-12">
                    <h1 class="mb-0">Demo Quiz</h1>
                    <ul class="list-unstyled d-flex">
                        <li> <a href="{{ route('home') }}">Home  >> </a></li>
                        <li>Demo Quiz</li>
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
                <h2 class="ttl-line"> Demo Quiz
                </h2>
                <p>Welcome to the Demo Quiz! Below, you will find numerous sample questions. This demo quiz is set up with questions and the question's answer with Answer reason.</p>
            </div>

            <div class="col-sm-12 demo-quiz neta-about">

            	 @if($demo_quiz->total() != 0)
                   	@foreach($demo_quiz as $key => $question)

		                <div class="form-card">
		                   <h6>{{ $question->question }}</h6>
		                    <div class="row">

		                    @if($question->question_type == 'multiple')
		                        
		                        <div class="col-sm-6">
		                            <div class="e-input">
		                                <input type="radio" name="rd" placeholder="Email Id" />
		                                <label for="">A. {{ $question->option_1 }}
		                                </label>
		                            </div>
		                        </div>
		                        <div class="col-sm-6">
		                            <div class="e-input">
		                                <input type="radio" name="rd" placeholder="Email Id" />
		                                <label for="">B. {{ $question->option_2 }}
		                                </label>
		                            </div>
		                        </div>
		                        <div class="col-sm-6">
		                            <div class="e-input">
		                                <input type="radio" name="rd" placeholder="Email Id" />
		                                <label for="">C. {{ $question->option_3 }}
		                                </label>
		                            </div>
		                        </div>
		                        <div class="col-sm-6">
		                            <div class="e-input">
		                                <input type="radio" name="rd" placeholder="Email Id" />
		                                <label for="">D. {{ $question->option_4 }}
		                                </label>
		                            </div>
		                        </div>

		                    @else

		                        <div class="col-sm-6">
		                            <div class="e-input">
		                                <input type="radio" name="rd" placeholder="Email Id" />
		                                <label for="">True
		                                </label>
		                            </div>
		                        </div>
		                         <div class="col-sm-6"></div>
		                        <div class="col-sm-6">
		                            <div class="e-input">
		                                <input type="radio" name="rd" placeholder="Email Id" />
		                                <label for="">False
		                                </label>
		                            </div>
		                        </div>
		                         <div class="col-sm-6"></div>

		                    @endif 

		                        <div class="col-sm-6">
		                            <button type="button" name="next" class="enrol-cpd show_answer" id="show-btn">Show Answer</button>
		                        </div>
		                       
		                        <div class="col-sm-12 correct_ans" style="display: none;">
		                        	@php
		                        	if($question->question_type =='multiple'){
		                        		$value = explode("_", $question->correct_option);
		                        		$answer = $value[0].' '.$value[1];
		                        	}
		                        	$correct_answer = ($question->question_type == 'true_false') ? ucfirst($question->correct_option) : $answer; 
		                        	@endphp
		                            <div class="demo-ans1">
		                              <p>Your Correct Answe is <span>{{ $correct_answer}}</span></p>
		                              <h6>Explanation</h6>
		                              <p>{!! $question->correct_answer_reason !!}</p>
		                            </div>
		                          </div>
		                        
		                    </div>

		                </div>

                	@endforeach
            	@endif

            </div>
        </div>
    </div>
</section>

<section class="section-padding"></section>



@include('home::layouts.footer')

<script type="text/javascript">
	
	$(document).ready(function(){

		$('.show_answer').on('click',function(){

			$(this).parent().next('.correct_ans').toggle();

		});
	});

</script>
