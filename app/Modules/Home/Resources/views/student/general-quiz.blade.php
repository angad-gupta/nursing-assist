@include('home::layouts.navbar-inner')

<section class="neta-ribbon">
    <img src="img/cc.jpg" class="img-fluid" alt="">
    <div class="container">
        <div class="row">
            <div class="neta-ribbon__content">
                <div class="col-sm-12">
                    <h1 class="mb-0">Practice Test</h1>
                    <ul class="list-unstyled d-flex">
                        <li> <a href="#">Home >> </a></li>
                        <li> <a href="#"> Practice Test</a></li>
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
                <h2 class="ttl-line">Practice Test
                </h2>
                <p>Comprehension, Analysis and Application level questions from all categories using the Related Courses. Complete the test in a quiet environment. </p>
            </div>

            <div class="col-sm-12">
                <div class="accordion" id="accordionExample">

                    <script src="{{ asset('admin/validation/generalquiz.js')}}"></script>
                    {!! Form::open(['route'=>'studentquiz.store','method'=>'POST','id'=>'generalquiz_submit','class'=>'form-horizontal','role'=>'form','files' => true]) !!}

                    @if($general_quiz->total() != 0)
                    @foreach($general_quiz as $key => $question)
                    @php $key = $key +1; @endphp

                    <div class="card">
                        <div class="card-header" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="true">     
                            <span class="title">{{$key}}. {{ $question->question }}</span>
                        </div> 
                        <div id="collapse{{$key}}" class="collapse show" data-parent="#accordionExample">
                            <div class="card-body demo-quiz neta-about">
                                <div class="">
                                     <div class="row">
                                        {{ Form::hidden('quiz_id[]', $question->id) }}

                                         @if($question->question_type == 'multiple')
                                         <div class="col-sm-6">
                                             <div class="e-input">
                                                 <input type="radio" name="question_option_{{$key}}[]" value="option_1" required />
                                                 <label for="">A. {{ $question->option_1 }}
                                                 </label>
                                             </div>
                                         </div>
                                         <div class="col-sm-6">
                                             <div class="e-input">
                                                 <input type="radio" name="question_option_{{$key}}[]" value="option_2" />
                                                 <label for="">B. {{ $question->option_2 }}
                                                 </label>
                                             </div>
                                         </div>
                                         <div class="col-sm-6">
                                             <div class="e-input">
                                                 <input type="radio" name="question_option_{{$key}}[]" value="option_3" />
                                                 <label for="">C. {{ $question->option_3 }}
                                                 </label>
                                             </div>
                                         </div>
                                         <div class="col-sm-6">
                                             <div class="e-input">
                                                 <input type="radio" name="question_option_{{$key}}[]" value="option_4" />
                                                 <label for="">D. {{ $question->option_4 }}
                                                 </label>
                                             </div>
                                         </div>

                                        @else

                                           <div class="col-sm-6">
                                                <div class="e-input">
                                                    <input type="radio" name="question_option_{{$key}}[]" value="true" required/>
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
   
                                     </div>
                 
                                 </div>
                            </div>
                        </div>
                    </div>

                        @endforeach
                    @else

                        <div class="card">
                            <div class="row">
                                <h4 class="text-danger">No Practice Question Added</h4>
                            </div>
                        </div>
                         <div class="col-sm-6 neta-about">
                             <button onclick="history.back();" class="enrol-cpd" id="show-btn">Go Back</button>
                        </div>
                    @endif

                    {{ Form::hidden('courseinfo_id', $courseinfoId) }}

                @if($general_quiz->total() != 0)
                     <div class="col-sm-6 neta-about">
                         <button type="submit" class="enrol-cpd" id="show-btn">Submit Your Answer</button>
                     </div>
                @endif

                {!! Form::close() !!}     

                </div>

            </div>
        </div>
    </div>
</section>

<section class="section-padding"></section>
@include('home::layouts.footer')