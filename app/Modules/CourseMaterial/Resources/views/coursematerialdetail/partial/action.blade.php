<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>

    <div class="row">

        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-3">Course Topic :<span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                       <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-pen2"></i></span>
                        </span>
                        {!! Form::text('material_topic', $value = null, ['placeholder'=>'Enter Course Topic','class'=>'material_topic form-control']) !!}

                        </div>
                    </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-3">Course Schedule[Week/s]:<span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                       <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-bookmarks"></i></span>
                        </span>
                        {!! Form::text('course_schedule', $value = null, ['placeholder'=>'Enter Course Schedule[week/s]','class'=>'course_schedule form-control']) !!}
                        </div>
                    </div>
            </div>
        </div>

    </div>

        <div class="row">

        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-3">Topic Summary:</label>
                    <div class="col-lg-9">
                       <div class="input-group">
                        
                        {!! Form::textarea('topic_summary', null, ['id' => 'topic_summary','placeholder'=>'Enter Sumary', 'class' =>'form-control simple_textarea_description']) !!}
                        </div>
                    </div>
            </div>
        </div>

    </div>

      {{ Form::hidden('couse_material_id', $material_id) }}


</fieldset>


<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold">Session Setup</legend>

     @if($is_edit)
        @foreach($coursematerialdetail->coursematerialsession as $key => $session_val) 
                             
            <div class="appendSession">
                <div class="form-group row">

                      <div class="col-lg-4">
                        <div class="row">
                            <label class="col-form-label col-lg-3">Session Title:</label>
                            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-list3"></i>
                                        </span>
                                    </span>
                                    {!! Form::text('session_title[]', $value = $session_val->session_title, ['id'=>'session_title','placeholder'=>'Enter Session Title','class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                     <div class="col-lg-4">
                        <div class="row">
                            <label class="col-form-label col-lg-3">Session Content:</label>
                            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-list3"></i>
                                        </span>
                                    </span>
                                    {!! Form::text('session_content[]', $value = $session_val->session_content, ['id'=>'session_content','placeholder'=>'Enter Session Content','class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-2">
                       <div class="row">
                             <button type="button" class="ml-2 remove_session btn bg-danger-800 btn-labeled btn-labeled-left"><b><i class="icon-pen-plus"></i></b> Remove</button>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    @endif

        <div class="appendSession">
                <div class="form-group row">

                    <div class="col-lg-4">
                        <div class="row">
                            <label class="col-form-label col-lg-3">Session Title:</label>
                            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-list3"></i>
                                        </span>
                                    </span>
                                    {!! Form::text('session_title[]', $value = null, ['id'=>'session_title','placeholder'=>'Enter Session Title','class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                     <div class="col-lg-4">
                        <div class="row">
                            <label class="col-form-label col-lg-3">Session Content:</label>
                            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-list3"></i>
                                        </span>
                                    </span>
                                    {!! Form::text('session_content[]', $value = null, ['id'=>'session_content','placeholder'=>'Enter Session Content','class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2">
                       <div class="row">
                                <button type="button" class="ml-2 add_session btn bg-success-800 btn-labeled btn-labeled-left"><b><i class="icon-pen-plus"></i></b> Add More</button>
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

          $('.add_session').on('click',function(){
            $.ajax({
                    type: 'GET',
                    url: '/admin/coursematerialdetail/appendSession',
                    success: function (data) {
                        $('.appendSession').last().append(data.options); 
                    }
                });
        }); 

        $('.remove_session').on('click',function(){ 
            $(this).parent().parent().parent().remove();
        });

    });



 </script>

