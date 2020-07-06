<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>

    <div class="row">

        <div class="col-md-6"> 
            <div class="form-group row">
                <label class="col-form-label col-lg-4">Select Category:<span class="text-danger">*</span></label>
                    <div class="col-lg-8">
                       <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-toggle"></i></span>
                        </span>
                          {!! Form::select('category',[ 'General'=>'General','Demo'=>'Demo'], $value = null, ['placeholder'=>'Select Category','id'=>'category','class'=>'form-control' ]) !!}   

                        </div>
                    </div>
            </div>
        </div>

          <div class="col-md-6 set_quiz_demo">
            <div class="form-group row">
                <label class="col-form-label col-lg-4">Select Quiz Section:<span class="text-danger">*</span></label>
                    <div class="col-lg-8">
                       <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-toggle"></i></span>
                        </span>
                          {!! Form::select('quiz_section',[ 'Mockup'=>'Mock Test','Practise'=>'Practise Test'], $value = null, ['placeholder'=>'Select Quiz Section','id'=>'quiz_section','class'=>'form-control' ]) !!}   

                        </div>
                    </div>
            </div>
        </div>
       

    </div>

    <div class="row">

        <div class="col-md-6"> 
            <div class="form-group row">
                <label class="col-form-label col-lg-4">Select Course Lesson:<span class="text-danger">*</span></label>
                    <div class="col-lg-8">
                       <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-toggle"></i></span>
                        </span>
                           {!! Form::select('course_content_id',$course_lesson, $value = null, ['id'=>'course_content_id','class'=>'course_content_id form-control','placeholder'=>'Select Course Lesson']) !!}

                        </div>
                    </div>
            </div>
        </div>

          <div class="col-md-6 set_quiz_demo">
            <div class="form-group row">
                <label class="col-form-label col-lg-4">Set Quiz For Demo:<span class="text-danger">*</span></label>
                    <div class="col-lg-8">
                       <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-toggle"></i></span>
                        </span>
                          {!! Form::select('set_for_demo',[ '1'=>'Yes','0'=>'No'], $value = null, ['placeholder'=>'Select Quiz Section','id'=>'set_for_demo','class'=>'form-control' ]) !!}   

                        </div>
                    </div>
            </div>
        </div>
       

    </div>

    <div class="row">

         <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-4">Question:<span class="text-danger">*</span></label>
                    <div class="col-lg-8">
                       <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-bookmarks"></i></span>
                        </span>
                        {!! Form::text('question', $value = null, ['placeholder'=>'Enter Question','class'=>'question form-control']) !!}
                        </div>
                    </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-4">Question Type:<span class="text-danger">*</span></label>
                    <div class="col-lg-8">
                       <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-toggle"></i></span>
                        </span>
                          {!! Form::select('question_type',[ 'multiple'=>'Multiple Choice Question','true_false'=>'True or False'], $value = null, ['placeholder'=>'Select Question Type','id'=>'question_type','class'=>'form-control' ]) !!}   

                        </div>
                    </div>
            </div>
        </div>

    @php
         if($is_edit){
            $multiple = ($quiz->question_type == 'multiple') ? 'style=display:block;' : 'style=display:none;';
            $truefalse = ($quiz->question_type == 'true_false') ? 'style=display:block;' : 'style=display:none;';

            $multiple_value = $quiz->correct_option;
        }else{
            $multiple = 'style=display:none;';
            $truefalse = 'style=display:none;';
            $multiple_value = null;
        }
    @endphp


    
          

    </div>

</fieldset>


<fieldset class="mb-3 multiple_choice" {{ $multiple }}>
    <legend class="text-uppercase font-size-sm font-weight-bold">Multiple Choice Option</legend>

 <div class="row">
    <div class="col-lg-3">
        <div class="row">
            <label class="col-form-label col-lg-3">Option A:</label>
            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-list2"></i>
                        </span>
                    </span>
                    {!! Form::text('option_1', $value = null, ['id'=>'option_1','placeholder'=>'Enter Option A','class'=>'form-control']) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="row">
            <label class="col-form-label col-lg-3">Option B:</label>
            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-list2"></i>
                        </span>
                    </span>
                    {!! Form::text('option_2', $value = null, ['id'=>'option_2','placeholder'=>'Enter Option B','class'=>'form-control']) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="row">
            <label class="col-form-label col-lg-3">Option C:</label>
            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-list2"></i>
                        </span>
                    </span>
                    {!! Form::text('option_3', $value = null, ['id'=>'option_3','placeholder'=>'Enter Option C','class'=>'form-control']) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="row">
            <label class="col-form-label col-lg-3">Option D:</label>
            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-list2"></i>
                        </span>
                    </span>
                    {!! Form::text('option_4', $value = null, ['id'=>'option_4','placeholder'=>'Enter Option D','class'=>'form-control']) !!}
                </div>
            </div>
        </div>
    </div>
</div>

</fieldset>

<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold">Correct Option With Reason</legend>

 <div class="row">

     <div class="col-md-6 multiple_option" {{ $multiple }}>
            <div class="form-group row">
                <label class="col-form-label col-lg-4">Correct Answer:</label>
                    <div class="col-lg-8">
                       <div class="input-group"> 
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-checkmark4"></i></span>
                        </span>


                        @php 
                        $select_1 = "";
                        $select_2 = "";
                        $select_3 = "";
                        $select_4 = "";
                        @endphp

                        @if($is_edit)
                            @if(isset($quiz))
                            @php
                                $correct_val = json_decode($quiz->correct_option);  
                                if($correct_val){
                                    $select_1 = (in_array('option_a',$correct_val)) ?  "selected='selected'" : "";
                                    $select_2 = (in_array('option_b',$correct_val)) ?  "selected='selected'" : "";
                                    $select_3 = (in_array('option_c',$correct_val)) ?  "selected='selected'" : "";
                                    $select_4 = (in_array('option_d',$correct_val)) ?  "selected='selected'" : "";
                                }
                            @endphp
                            @endif
                        @endif

                        <select class="form-control multiselect" name="multiple_correct_option[]" multiple='multiple' data-fouc>
                            <option value="option_a" {{$select_1}}>Option A</option>
                            <option value="option_b" {{$select_2}}>Option B</option>
                            <option value="option_c" {{$select_3}}>Option C</option>
                            <option value="option_d" {{$select_4}}>Option D</option>
                        </select>
                        </div>
                    </div>
            </div>
        </div>


        <div class="col-md-6 true_false_option" {{ $truefalse }}>
            <div class="form-group row">
                <label class="col-form-label col-lg-4">Correct Answer:</label>
                    <div class="col-lg-8">
                       <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-checkmark4"></i></span>
                        </span>
                         {!! Form::select('single_correct_option',[ 'true'=>'True','false'=>'False'], $value = $multiple_value, ['placeholder'=>'Select Correct Answer','id'=>'correct_option','class'=>'form-control' ]) !!}  
                        </div>
                    </div>
            </div>
        </div>

        <div class="col-md-6">
        <div class="row">
            <label class="col-form-label col-lg-3">Correct Answer Reason:</label>
            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                <div class="input-group">
                    {!! Form::textarea('correct_answer_reason', null, ['id' => 'correct_answer_reason','placeholder'=>'Enter Correct Answer Reason', 'class' =>'form-control simple_textarea_description']) !!}
                </div>
            </div>
        </div>
    </div>

 </div>
</fieldset>

<div class="text-right">
    <button type="submit" class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i class="icon-database-insert"></i></b> {{ $btnType }}</button>
</div>




 <script type="text/javascript">
    $(document).ready(function(){ 

        $('#question_type').on('change',function(){
            var question_type = $(this).val();

            if(question_type == 'multiple'){
                $('.multiple_choice').show();
                $('.multiple_option').show();
                $('.true_false_option').hide();
            }else{
                $('.multiple_choice').hide();
                $('.multiple_option').hide();
                $('.true_false_option').show();
            }
        });      

        $('#category').on('change',function(){

            var category = $(this).val();

            if(category == 'Demo'){
                $('.set_quiz_demo').hide();
                $('#quiz_section').val('');
                $('#set_for_demo').val(0);

            }else{
                $('.set_quiz_demo').show();
            }
        });

        $('#category').trigger('change');

    });

 </script>
