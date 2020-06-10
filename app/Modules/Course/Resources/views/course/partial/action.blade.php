
<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>


            <div class="form-group row">

                    <div class="col-lg-6">
                        <div class="row">
                            <label class="col-form-label col-lg-3">Title:<span class="text-danger">*</span></label>
                            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-bookmarks"></i>
                                        </span>
                                    </span>
                                    {!! Form::text('title', $value = null, ['id'=>'title','placeholder'=>'Enter Title','class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>


                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Title of Training:<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                               <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-bookmarks "></i></span>
                                </span>
                                {!! Form::text('title_of_training', $value = null, ['placeholder'=>'Enter Title of Training','class'=>'title_of_training form-control']) !!}
                                </div>
                            </div>
                    </div>
                </div>


            </div>


              <div class="form-group row">

                    <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Course Duration :<span class="text-danger">*</span></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-hour-glass3"></i></span>
                                </span>
                                 {!! Form::text('course_duration', $value = null, ['placeholder'=>'Enter Course Duration','class'=>'course_duration form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Mode Of Delivery:<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                               <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-pen"></i></span>
                                </span>
                                {!! Form::text('mode_of_delivery', $value = null, ['placeholder'=>'Enter Mode of Delivery','class'=>'mode_of_delivery form-control']) !!}
                                </div>
                            </div>
                    </div>
                </div>


            </div>
 
                <div class="form-group row">

                 <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Intake Dates :<span class="text-danger">*</span></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-calendar"></i></span>
                                </span>
                                 {!! Form::text('intake_dates', $value = null, ['placeholder'=>'Enter Intake Dates','class'=>'intake_dates form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>

            <div class="col-md-6">
                <div class="row">
                    <label class="col-form-label col-lg-3">Course Fee:<span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                           <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-coin-dollar "></i></span>
                            </span>
                            {!! Form::text('course_fees', $value = null, ['placeholder'=>'Enter Course Fee','class'=>'course_fees form-control']) !!}
                            </div>
                        </div>
                </div>
            </div>
              
            </div>

             <div class="form-group row">

                    <div class="col-md-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Short Content:<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                               <div class="input-group">
                                    {!! Form::textarea('short_content', null, ['id' => 'short_content','placeholder'=>'Enter Short Content', 'class' =>'form-control simple_textarea_description']) !!}                     
                                </div>
                            </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Description:<span class="text-danger">*</span></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                 {!! Form::textarea('description', null, ['id' => 'description','placeholder'=>'Enter Description', 'class' =>'form-control simple_textarea_description']) !!}
                            </div>
                        </div>
                    </div>
                </div>
    
        </div>


     <div class="form-group row">

            <div class="col-lg-6">
                <div class="row">
                    <label class="col-form-label col-lg-3">Enrolment Process:</label>
                    <div class="col-lg-9">
                        <div class="input-group">
                            {!! Form::textarea('enrollment_process', null, ['id' => 'enrollment_process','placeholder'=>'Enter Enrolment Process', 'class' =>'form-control simple_full_description']) !!}                     
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="row">
                    <label class="col-form-label col-lg-3">Important of Course:</label>
                    <div class="col-lg-9">
                        <div class="input-group">
                            {!! Form::textarea('important_course', null, ['id' => 'important_course','placeholder'=>'Enter Important of Course', 'class' =>'form-control simple_full_description']) !!}                     
                        </div>
                    </div>
                </div>
            </div>

    </div>


    <div class="form-group row">
            <div class="col-lg-6">
            <div class="row">
                <label class="col-form-label col-lg-3">Image:</label>
                <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-images3"></i></span>
                        </span>
                        {!! Form::file('image', ['id'=>'image','class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>

          <div class="col-lg-6">
            <div class="row">
                 <label class="col-form-label col-lg-3"></label>
                <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                    @if($is_edit)
                        @php
                             $image = ($course->image) ? asset($course->file_full_path).'/'.$course->image : asset('admin/default.png');
                        @endphp

                        <img id="image" src="{{$image}}" alt="your image" class="preview-image" style="height: 100px;width: auto;" />
                        @else
                        <img id="image" src="{{ asset('admin/default.png') }}" alt="your image" class="preview-image" style="height: 100px; width: auto;" />
                        @endif
                </div>

            </div>
        </div>
    </div>


<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold">Course Enrolment</legend>

     @if($is_edit)
        @foreach($course->CourseEnrollment as $key => $enrolment)
                             
            <div class="appendenrolment">
                <div class="form-group row">

                     <div class="col-lg-3">
                            <div class="row">
                                <label class="col-form-label col-lg-3">Enrolment Title:</label>
                                <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-list3"></i>
                                            </span>
                                        </span>
                                        {!! Form::text('enrol_title[]', $value = $enrolment->enrol_title, ['id'=>'enrol_title','placeholder'=>'Enter Progrmme Step','class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="row">
                                <label class="col-form-label col-lg-3">Course Fee:</label>
                                <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-list3"></i>
                                            </span>
                                        </span>
                                        {!! Form::text('course_fee[]', $value = $enrolment->course_fee, ['id'=>'course_fee','placeholder'=>'Enter Progrmme Step','class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="row">
                                <label class="col-form-label col-lg-3">Payment Mode:</label>
                                <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-list3"></i>
                                            </span>
                                        </span>
                                        {!! Form::text('payment_mode[]', $value = $enrolment->payment_mode, ['id'=>'payment_mode','placeholder'=>'Enter Progrmme Step','class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="col-lg-2">
                       <div class="row">
                             <button type="button" class="ml-2 remove_enrolment btn bg-danger-800 btn-labeled btn-labeled-left"><b><i class="icon-pen-plus"></i></b> Remove</button>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    @endif

        <div class="appendenrolment">
                <div class="form-group row">

                    <div class="col-lg-3">
                        <div class="row">
                            <label class="col-form-label col-lg-3">Enrolment Title:</label>
                            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-list3"></i>
                                        </span>
                                    </span>
                                    {!! Form::text('enrol_title[]', $value = null, ['id'=>'enrol_title','placeholder'=>'Enter Enrolment Title','class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                            <div class="col-lg-3">
                            <div class="row">
                                <label class="col-form-label col-lg-3">Course Fee:</label>
                                <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-list3"></i>
                                            </span>
                                        </span>
                                        {!! Form::text('course_fee[]', $value = null, ['id'=>'course_fee','placeholder'=>'Enter Course Fee','class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="row">
                                <label class="col-form-label col-lg-3">Payment Mode:</label>
                                <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-list3"></i>
                                            </span>
                                        </span>
                                        {!! Form::text('payment_mode[]', $value = null, ['id'=>'payment_mode','placeholder'=>'Enter Payment Mode','class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>


                    <div class="col-lg-2">
                       <div class="row">
                                <button type="button" class="ml-2 add_enrolment btn bg-success-800 btn-labeled btn-labeled-left"><b><i class="icon-pen-plus"></i></b> Add Enrolment</button>
                        </div>
                    </div>
                </div>
            </div>

</fieldset>



</fieldset>


<div class="text-right">
    <button type="submit" class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i class="icon-database-insert"></i></b> {{ $btnType }}</button>
</div>



 <!-- Warning modal -->
    <div id="modal_image_size" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                 <div class="modal-body">
                    <center>
                        <i class="icon-alert text-warning icon-3x"></i>
                    </center>
                    <br>
                    <center>
                        <h4 class="text-purple">Image Size is Greater Than 1Mb. Please Upload Below 1Mb.</h4>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Thank You !!!</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
<!-- /warning modal -->



<script type="text/javascript">
    
    $(document).ready(function(){
         $('#image').bind('change', function() {
            var a=(this.files[0].size);

            if(a > 1000000) {
               $('#modal_image_size').modal('show');
               $('#image').val('');
            };
        });


            $('.add_enrolment').on('click',function(){
            $.ajax({
                    type: 'GET',
                    url: '/admin/course/appendEnrolment',
                    success: function (data) {
                        $('.appendenrolment').last().append(data.options); 
                    }
                });
        }); 

        $('.remove_enrolment').on('click',function(){ 
            $(this).parent().parent().parent().remove();
        });


    });

</script>

