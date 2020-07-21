<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>

    <div class="row">

        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-3">Select Course:<span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                       <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-pen2"></i></span>
                        </span>
                        {!! Form::select('course_id',$course, $value = null, ['id'=>'course_id','class'=>'course_id form-control','placeholder'=>'Select Course']) !!}

                        </div>
                    </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-3">Course Program Title:<span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                       <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-bookmarks"></i></span>
                        </span>
                        {!! Form::text('course_program_title', $value = null, ['placeholder'=>'Enter Course Program Title','class'=>'course_program_title form-control']) !!}
                        </div>
                    </div>
            </div>
        </div>

    </div>

        <div class="row">

        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-3">Course Sub Title:<span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                       <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-pen2"></i></span>
                        </span>
                        {!! Form::text('course_program_sub_title', $value = null, ['placeholder'=>'Enter Course Sub Title','class'=>'course_program_sub_title form-control']) !!}

                        </div>
                    </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-3">Course Intake Title:<span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                       <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-pen2"></i></span>
                        </span>
                        {!! Form::text('course_intake_title', $value = null, ['placeholder'=>'Enter Course Intake Title','class'=>'course_intake_title form-control']) !!}

                        </div>
                    </div>
            </div>
        </div>


    </div>
        <div class="row">

        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-3">Course Duration Period:<span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                       <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-pen2"></i></span>
                        </span>
                        {!! Form::text('course_duration_period', $value = null, ['placeholder'=>'Enter Course Duration Period','class'=>'course_duration_period form-control']) !!}

                        </div>
                    </div>
            </div>
        </div>

          <div class="col-lg-6">
            <div class="row">
                <label class="col-form-label col-lg-3">Is Course Package:</label>
                <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                    <div class="input-group">
                         {!! Form::select('is_course_package',[ '0'=>'No','1'=>'Yes'], $value = null, ['id'=>'is_course_package','class'=>'form-control' ]) !!} 
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


    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-3">Type:</label>
                <div class="col-lg-9">
                    <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-sort-numeric-asc"></i></span>
                    </span>
                    {!! Form::select('type',[ 'image'=>'Image','video'=>'Video'], $value = null, ['placeholder'=>'Select Type','id'=>'type','class'=>'form-control' ]) !!}   

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-3">Status:</label>
                <div class="col-lg-9">
                    <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-sort-numeric-asc"></i></span>
                    </span>
                    {!! Form::select('status',['1'=>'Active','0'=>'In-active'], $value = null, ['id'=>'status','class'=>'form-control' ]) !!}   

                    </div>
                </div>
            </div>
        </div>
    </div>

    @php


    if($is_edit){
        $imageType = ($courseinfo->type == 'image') ? 'style=display:block;' : 'style=display:none;';
        $videoType = ($courseinfo->type == 'video') ? 'style=display:block;' : 'style=display:none;';
    }else{
        $imageType = 'style=display:none;';
        $videoType = 'style=display:none;';
    }
    @endphp

        <div class="row image_type" {{ $imageType }}>

             <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Image:</label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-images3"></i></span>
                                </span>
                                {!! Form::file('image_path', ['id'=>'image_path','class'=>'form-control']) !!}
                            </div>
                            @if($is_edit)
                                @php
                                    $image = ($courseinfo->image_path) ? asset($courseinfo->file_full_path).'/'.$courseinfo->image_path : asset('admin/default.png');
                                @endphp

                                <img id="image_path" src="{{$image}}" alt="your image" class="preview-image" style="height: 100px;width: auto;" />
                            @else
                                <img id="image_path" src="{{ asset('admin/default.png') }}" alt="your image" class="preview-image" style="height: 100px; width: auto;" />
                            @endif
                        </div>
                    </div>
                </div>

        
        </div>

            <div class="row video_type" {{ $videoType }}>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Youtube ID:<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                               <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-video-camera2 "></i></span>
                                </span>
                                {!! Form::text('youtube_id', $value = null, ['placeholder'=>'Enter Youtube ID','class'=>'youtube_id form-control']) !!}
                                </div>
                            </div>
                    </div>
                </div>
        </div>

</fieldset>

<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold">Course Enrolment</legend>

      <div class="form-group row">

        <div class="col-md-6">
            <div class="row">
                <label class="col-form-label col-lg-3">Enrolment Title:<span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                       <div class="input-group">
                         <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-quill4"></i></span>
                        </span>
                            {!! Form::text('enrol_title', $value = null, ['placeholder'=>'Enter Enrolment Title','class'=>'enrol_title form-control']) !!}                 
                        </div>
                    </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="row">
                <label class="col-form-label col-lg-3">Course Fee:<span class="text-danger">*</span></label>
                <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                    <div class="input-group">
                         <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-coin-dollar"></i></span>
                        </span>
                         {!! Form::text('course_fee', $value = null, ['placeholder'=>'Enter Course Fee','class'=>'course_fee form-control']) !!}
                    </div>
                </div>
            </div>
        </div>

        </div>

          <div class="form-group row">

            <div class="col-md-6">
                <div class="row">
                    <label class="col-form-label col-lg-3">Payment Mode:<span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                           <div class="input-group">
                             <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-wallet"></i></span>
                            </span>
                               {!! Form::text('payment_mode', $value = null, ['placeholder'=>'Enter Payment Mode','class'=>'payment_mode form-control']) !!}                 
                            </div>
                        </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row">
                    <label class="col-form-label col-lg-3">Students Per Intake:<span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                        <div class="input-group">
                            <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-wallet"></i></span>
                        </span>
                            {!! Form::text('students_per_intake', $value = null, ['id'=>'students_per_intake', 'placeholder'=>'Enter Payment Mode','class'=>'form-control numeric']) !!}                 
                        </div>
                    </div>
                </div>
            </div>
        </div>

</fieldset>


<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold">Mode Of Delivery</legend>

     @if($is_edit)
        @foreach($courseinfo->CourseModeOfDelivery as $key => $delivery) 
                             
            <div class="appendDelivery">
                <div class="form-group row">

                     <div class="col-lg-6">
                            <div class="row">
                                <label class="col-form-label col-lg-3">Mode Of Delivery Step:</label>
                                <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-list3"></i>
                                            </span>
                                        </span>
                                        {!! Form::text('delivery_title[]', $value = $delivery->delivery_title, ['id'=>'delivery_title','placeholder'=>'Enter Title','class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>


                    <div class="col-lg-2">
                       <div class="row">
                             <button type="button" class="ml-2 remove_delivery btn bg-danger-800 btn-labeled btn-labeled-left"><b><i class="icon-pen-plus"></i></b> Remove</button>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    @endif

        <div class="appendDelivery">
                <div class="form-group row">

                    <div class="col-lg-6">
                        <div class="row">
                            <label class="col-form-label col-lg-3">Mode Of Delivery Step:</label>
                            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-list3"></i>
                                        </span>
                                    </span>
                                    {!! Form::text('delivery_title[]', $value = null, ['id'=>'delivery_title','placeholder'=>'Enter Title','class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2">
                       <div class="row">
                                <button type="button" class="ml-2 add_delivery btn bg-success-800 btn-labeled btn-labeled-left"><b><i class="icon-pen-plus"></i></b> Add More</button>
                        </div>
                    </div>
                </div>
            </div>

</fieldset>


<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold">Course Structure</legend>

     @if($is_edit)
        @foreach($courseinfo->CourseStructure as $key => $structure)
                             
            <div class="appendStructure">
                <div class="form-group row">

                     <div class="col-lg-6">
                            <div class="row">
                                <label class="col-form-label col-lg-3">Structure Title:</label>
                                <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-list3"></i>
                                            </span>
                                        </span>
                                        {!! Form::text('structure_title[]', $value = $structure->structure_title, ['id'=>'structure_title','placeholder'=>'Enter Structure','class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>


                    <div class="col-lg-2">
                       <div class="row">
                             <button type="button" class="ml-2 remove_structure btn bg-danger-800 btn-labeled btn-labeled-left"><b><i class="icon-pen-plus"></i></b> Remove</button>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    @endif

        <div class="appendStructure">
                <div class="form-group row">

                    <div class="col-lg-6">
                        <div class="row">
                            <label class="col-form-label col-lg-3">Structure Title:</label>
                            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-list3"></i>
                                        </span>
                                    </span>
                                    {!! Form::text('structure_title[]', $value = null, ['id'=>'structure_title','placeholder'=>'Enter Structure','class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2">
                       <div class="row">
                                <button type="button" class="ml-2 add_structure btn bg-success-800 btn-labeled btn-labeled-left"><b><i class="icon-pen-plus"></i></b> Add Structure</button>
                        </div>
                    </div>
                </div>
            </div>

</fieldset>


<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold">Course Intake</legend>

     @if($is_edit)
        @foreach($courseinfo->CourseIntake as $key => $intake)
                             
            <div class="appendCourseIntake">
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
                                {!! Form::select('month_id[]',$month, $value = $intake->month_id, ['id'=>'month_id','class'=>'month_id form-control','placeholder'=>'Select Course']) !!}

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="row">
                            <label class="col-form-label col-lg-3">Intake Date Range:</label>
                            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-list3"></i>
                                        </span>
                                    </span>
                                    {!! Form::text('intake_date[]', $value =  $intake->intake_date, ['id'=>'intake_date','placeholder'=>'Enter Intake Date Range','class'=>'form-control']) !!}
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

        <div class="appendCourseIntake">
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
                                {!! Form::select('month_id[]',$month, $value = null, ['id'=>'month_id','class'=>'month_id form-control','placeholder'=>'Select Course']) !!}

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="row">
                            <label class="col-form-label col-lg-3">Intake Date Range:</label>
                            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-list3"></i>
                                        </span>
                                    </span>
                                    {!! Form::text('intake_date[]', $value = null, ['id'=>'intake_date','placeholder'=>'Enter Intake Date Range','class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2">
                       <div class="row">
                                <button type="button" class="ml-2 add_intake btn bg-success-800 btn-labeled btn-labeled-left"><b><i class="icon-pen-plus"></i></b> Add More</button>
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
                        <h4 class="text-purple">Image Size is Greater Than 1Mb. Please Upload Below 2Mb.</h4>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Thank You !!!</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
<!-- /warning modal -->



<script type="text/javascript">
    
    $(document).ready(function(){
         $('#image_path').bind('change', function() {
            var a=(this.files[0].size);

            if(a > 2000000) {
               $('#modal_image_size').modal('show');
               $('#image_path').val('');
            };
        });
    });

</script>


 <script type="text/javascript">
    $(document).ready(function(){ 

        $('#type').on('change',function(){
            var type = $(this).val();

            if(type == 'image'){
                $('.image_type').show();
                $('.video_type').hide();
            }else{
                $('.video_type').show();
                $('.image_type').hide();
            }
        });

          $('.add_delivery').on('click',function(){
            $.ajax({
                    type: 'GET',
                    url: '/admin/courseinfo/appendDelivery',
                    success: function (data) {
                        $('.appendDelivery').last().append(data.options); 
                    }
                });
        }); 


          $('.add_structure').on('click',function(){
            $.ajax({
                    type: 'GET',
                    url: '/admin/courseinfo/appendStructure',
                    success: function (data) {
                        $('.appendStructure').last().append(data.options); 
                    }
                });
        }); 

          $('.add_intake').on('click',function(){
            $.ajax({
                    type: 'GET',
                    url: '/admin/courseinfo/appendCourseIntake',
                    success: function (data) {
                        $('.appendCourseIntake').last().append(data.options); 
                    }
                });
        }); 

        $('.remove_delivery').on('click',function(){ 
            $(this).parent().parent().parent().remove();
        });
        
        $('.remove_structure').on('click',function(){ 
            $(this).parent().parent().parent().remove();
        });

        $('.remove_intake').on('click',function(){ 
            $(this).parent().parent().parent().remove();
        });

        
    });



 </script>

