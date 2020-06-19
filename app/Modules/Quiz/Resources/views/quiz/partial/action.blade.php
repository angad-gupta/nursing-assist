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

          <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-4">Select Quiz Section:<span class="text-danger">*</span></label>
                    <div class="col-lg-8">
                       <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-toggle"></i></span>
                        </span>
                          {!! Form::select('quiz_section',[ 'Mockup'=>'Mockup','Practise'=>'Practise'], $value = null, ['placeholder'=>'Select Quiz Section','id'=>'quiz_section','class'=>'form-control' ]) !!}   

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
            <label class="col-form-label col-lg-3">Option 1:</label>
            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-list2"></i>
                        </span>
                    </span>
                    {!! Form::text('option_1', $value = null, ['id'=>'option_1','placeholder'=>'Enter Option 1','class'=>'form-control']) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="row">
            <label class="col-form-label col-lg-3">Option 2:</label>
            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-list2"></i>
                        </span>
                    </span>
                    {!! Form::text('option_2', $value = null, ['id'=>'option_2','placeholder'=>'Enter Option 2','class'=>'form-control']) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="row">
            <label class="col-form-label col-lg-3">Option 3:</label>
            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-list2"></i>
                        </span>
                    </span>
                    {!! Form::text('option_3', $value = null, ['id'=>'option_3','placeholder'=>'Enter Option 3','class'=>'form-control']) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="row">
            <label class="col-form-label col-lg-3">Option 4:</label>
            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-list2"></i>
                        </span>
                    </span>
                    {!! Form::text('option_4', $value = null, ['id'=>'option_4','placeholder'=>'Enter Option 4','class'=>'form-control']) !!}
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
                         {!! Form::select('multiple_correct_option',[ 'option_1'=>'Option 1','option_2'=>'Option 2','option_3'=>'Option 3','option_4'=>'Option 4'], $value = $multiple_value, ['placeholder'=>'Select Correct Answer','id'=>'correct_option','class'=>'form-control' ]) !!}  
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

    });

 </script>


   