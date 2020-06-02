<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>

    <div class="row">

        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-4">Select Course Info:<span class="text-danger">*</span></label>
                    <div class="col-lg-8">
                       <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-pen2"></i></span>
                        </span>
                        {!! Form::select('course_info_id',$course_info, $value = null, ['id'=>'course_info_id','class'=>'course_info_id form-control','placeholder'=>'Select Course Info']) !!}

                        </div>
                    </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-4">Year:<span class="text-danger">*</span></label>
                    <div class="col-lg-8">
                       <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-bookmarks"></i></span>
                        </span>
                         {!! Form::select('year',$year, $value = null, ['id'=>'year','class'=>'year form-control','placeholder'=>'Select Year']) !!}
                        </div>
                    </div>
            </div>
        </div>

    </div>

</fieldset>

<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold">Course Intake Setup</legend>

        @if($is_edit)
        @foreach($courseintake->CourseIntakesetup as $key => $setup)
        
         <div class="appendIntakeSetup">
                <div class="form-group row">
                    <div class="col-lg-4">
                        <div class="row">
                            <label class="col-form-label col-lg-3">Month:</label>
                            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-list3"></i>
                                        </span>
                                    </span>
                                    {!! Form::text('month[]', $value = $setup->month, ['id'=>'month','placeholder'=>'Enter Intake Month Range','class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="row">
                            <label class="col-form-label col-lg-3">Intake Day:</label>
                            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-list3"></i>
                                        </span>
                                    </span>
                                    {!! Form::text('course_intake[]', $value = $setup->course_intake, ['id'=>'course_intake','placeholder'=>'Enter Intake Day ','class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                   <div class="col-lg-2">
                     <div class="row">
                     <button type="button" class="ml-2 remove_intake btn bg-danger-800 btn-labeled btn-labeled-left"><b><i class="icon-pen-plus"></i></b> Remove</button>
                    </div>
                 </div>
            </div>
        </div> 

        @endforeach
        @endif

        <div class="appendIntakeSetup">
                <div class="form-group row">

                    <div class="col-lg-4">
                        <div class="row">
                            <label class="col-form-label col-lg-3">Month:</label>
                            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-list3"></i>
                                        </span>
                                    </span>
                                    {!! Form::text('month[]', $value = null, ['id'=>'month','placeholder'=>'Enter Intake Month Range','class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="row">
                            <label class="col-form-label col-lg-3">Intake Day:</label>
                            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-list3"></i>
                                        </span>
                                    </span>
                                    {!! Form::text('course_intake[]', $value = null, ['id'=>'course_intake','placeholder'=>'Enter Intake Day ','class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2">
                       <div class="row">
                                <button type="button" class="ml-2 add_intake btn bg-success-800 btn-labeled btn-labeled-left"><b><i class="icon-pen-plus"></i></b> Add Setup</button>
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

          $('.add_intake').on('click',function(){
            $.ajax({
                    type: 'GET',
                    url: '/admin/courseintake/appendSetup',
                    success: function (data) {
                        $('.appendIntakeSetup').last().append(data.options); 
                    }
                });
        }); 

        $('.remove_intake').on('click',function(){ 
            $(this).parent().parent().parent().remove();
        });

        
    });



 </script>

