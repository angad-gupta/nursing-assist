
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
                        <label class="col-form-label col-lg-3">Mode Of Delivery:<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                               <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-coin-dollar "></i></span>
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
                        <label class="col-form-label col-lg-3">Course Duration :<span class="text-danger">*</span></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                 {!! Form::text('course_duration', $value = null, ['placeholder'=>'Enter Course Duration','class'=>'course_duration form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>

            <div class="col-md-6">
                <div class="row">
                    <label class="col-form-label col-lg-3">Tuition Fee:<span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                           <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-coin-dollar "></i></span>
                            </span>
                            {!! Form::text('tuition_fee', $value = null, ['placeholder'=>'Enter Tuition Fee','class'=>'tuition_fee form-control']) !!}
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
                    <label class="col-form-label col-lg-3">Course Information:</label>
                    <div class="col-lg-9">
                        <div class="input-group">
                            {!! Form::textarea('course_information', null, ['id' => 'course_information','placeholder'=>'Enter Course Information', 'class' =>'form-control simple_full_description']) !!}                     
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

    });

</script>

