<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>

    <div class="row">

        <div class="col-md-6"> 
            <div class="form-group row">
                <label class="col-form-label col-lg-4">Select Mockup:<span class="text-danger">*</span></label>
                    <div class="col-lg-8">
                       <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-toggle"></i></span>
                        </span>
                          {{-- {!! Form::select('mockup_title',[ 'mockup_test_week_1'=>'Mockup Test Week 1','mockup_test_week_2'=>'Mockup Test Week 2','mockup_test_week_3'=>'Mockup Test Week 3','mockup_test_week_4'=>'Mockup Test Week 4','mockup_test_week_5'=>'Mockup Test Week 5','mockup_test_week_6'=>'Mockup Test Week 6','mockup_test_week_7'=>'Mockup Test Week 7','mockup_test_week_8'=>'Mockup Test Week 8', 'add_practice_test_1'=>'Additional Practice Tests 1', 'add_practice_test_2'=>'Additional Practice Tests 2', 'add_practice_test_3'=>'Additional Practice Tests 3'], $value = null, ['placeholder'=>'Select Mockup Week','id'=>'mockup_title','class'=>'form-control' ]) !!}    --}}
                          {!! Form::select('mockup_title',[ 'mockup_test_week_1'=>'Mockup Test 1','mockup_test_week_2'=>'Mockup Test 2','mockup_test_week_3'=>'Mockup Test 3','mockup_test_week_4'=>'Mockup Test 4','mockup_test_week_5'=>'Mockup Test 5','mockup_test_week_6'=>'Mockup Test 6','mockup_test_week_7'=>'Mockup Test 7','mockup_test_week_8'=>'Mockup Test 8', 'add_practice_test_1'=>'Mockup Test 9', 'add_practice_test_2'=>'Mockup Test 10', 'add_practice_test_3'=>'Mockup Test 11','management_of_care' =>'Management of Care','safety_and_infection_control' =>'Safety and Infection Control','health_promotion_and_maintenance' =>'Health Promotion and Maintenance','psychosocial_integrity'=>'Psychosocial Integrity','basic_care_and_comfort'=>'Basic Care and Comfort','pharmacological_and_parenteral_therapies'=>'Pharmacological and Parenteral Therapies','reduction_of_risk_potential'=>'Reduction of Risk Potential','physiological_adaptation'=>'Physiological Adaptation'], $value = null, ['placeholder'=>'Select Mockup','id'=>'mockup_title','class'=>'form-control' ]) !!}   

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

    </div>

 
    <div class="row">

         <div class="col-md-12">
            <div class="form-group row">
                <label class="col-form-label col-lg-2">Question:<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                       <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-bookmarks"></i></span>
                        </span>
                        {!! Form::text('question', $value = null, ['placeholder'=>'Enter Question','class'=>'question form-control']) !!}
                        </div>
                    </div>
            </div>
        </div>

      

    @php
         if($is_edit){
            $multiple = ($mockup->question_type == 'multiple') ? 'style=display:block;' : 'style=display:none;';
            $truefalse = ($mockup->question_type == 'true_false') ? 'style=display:block;' : 'style=display:none;';

            $multiple_value = $mockup->correct_option;
        }else{
            $multiple = 'style=display:none;';
            $truefalse = 'style=display:none;';
            $multiple_value = null;
        }
    @endphp


    </div>


    <div class="form-group row">

        <div class="col-lg-6">
            <div class="row">
                <label class="col-form-label col-lg-4">Additional Image:</label>
                    <div class="col-lg-8 form-group-feedback form-group-feedback-right">
                        <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-book3"></i></span>
                        </span>
                        {!! Form::file('additional_image', ['id'=>'additional_image','class'=>'form-control']) !!}
                        </div>
                    </div>
            </div>
        </div>
  
        <div class="col-lg-6">
            <div class="row">
                 <label class="col-form-label col-lg-4"></label>
                <div class="col-lg-8 form-group-feedback form-group-feedback-right">
                    @if($is_edit)
                        @php
                             $image = ($mockup->additional_image) ? asset($mockup->file_full_path).'/'.$mockup->additional_image : asset('admin/image.png');
                        @endphp

                        <img id="additional_image" src="{{$image}}" alt="your image" class="preview-image" style="height: 100px;width: auto;" />
                        @else
                        <img id="additional_image" src="{{ asset('admin/image.png') }}" alt="your image" class="preview-image" style="height: 100px; width: auto;" />
                        @endif
                </div>
            </div>
        </div>
    </div>

</fieldset>


<fieldset class="mb-3 multiple_choice" {{ $multiple }}>
    <legend class="text-uppercase font-size-sm font-weight-bold">Multiple Choice Option</legend>

 <div class="row">
    <div class="col-lg-4 mt-2">
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

    <div class="col-lg-4 mt-2">
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

    <div class="col-lg-4 mt-2">
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

    <div class="col-lg-4 mt-2">
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

    <div class="col-lg-4 mt-2">
        <div class="row">
            <label class="col-form-label col-lg-3">Option E:</label>
            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-list2"></i>
                        </span>
                    </span>
                    {!! Form::text('option_5', $value = null, ['id'=>'option_5','placeholder'=>'Enter Option E','class'=>'form-control']) !!}
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 mt-2">
        <div class="row">
            <label class="col-form-label col-lg-3">Option F:</label>
            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-list2"></i>
                        </span>
                    </span>
                    {!! Form::text('option_6', $value = null, ['id'=>'option_6','placeholder'=>'Enter Option F','class'=>'form-control']) !!}
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
                        $select_5 = "";
                        $select_6 = "";
                        @endphp

                        @if($is_edit)
                            @if(isset($mockup) AND ($mockup->question_type == 'multiple'))
                            @php
                                $correct_val = json_decode($mockup->correct_option);  
                                if($correct_val){
                                    $select_1 = (in_array('option_a',$correct_val)) ?  "selected='selected'" : "";
                                    $select_2 = (in_array('option_b',$correct_val)) ?  "selected='selected'" : "";
                                    $select_3 = (in_array('option_c',$correct_val)) ?  "selected='selected'" : "";
                                    $select_4 = (in_array('option_d',$correct_val)) ?  "selected='selected'" : "";
                                    $select_5 = (in_array('option_e',$correct_val)) ?  "selected='selected'" : "";
                                    $select_6 = (in_array('option_f',$correct_val)) ?  "selected='selected'" : "";
                                }
                            @endphp
                            @endif
                        @endif

                        <select class="form-control multiselect" name="multiple_correct_option[]" multiple='multiple' data-fouc>
                            <option value="option_a" {{$select_1}}>Option A</option>
                            <option value="option_b" {{$select_2}}>Option B</option>
                            <option value="option_c" {{$select_3}}>Option C</option>
                            <option value="option_d" {{$select_4}}>Option D</option>
                            <option value="option_e" {{$select_5}}>Option E</option>
                            <option value="option_f" {{$select_6}}>Option F</option>
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

        <div class="col-md-12">
        <div class="row">
            <label class="col-form-label col-lg-2">Correct Answer Reason:</label>
            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                <div class="input-group">
                    {!! Form::textarea('correct_answer_reason', null, ['id' => 'correct_answer_reason','placeholder'=>'Enter Correct Answer Reason', 'class' =>'form-control textarea_description']) !!}
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
