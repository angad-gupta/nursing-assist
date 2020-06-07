<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>

    <div class="row">

        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-4">Select Course:<span class="text-danger">*</span></label>
                    <div class="col-lg-8">
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
                <label class="col-form-label col-lg-4">Course Program Title:<span class="text-danger">*</span></label>
                    <div class="col-lg-8">
                       <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-bookmarks"></i></span>
                        </span>
                        {!! Form::text('course_program_title', $value = null, ['placeholder'=>'Enter Course Program Title','class'=>'title form-control']) !!}
                        </div>
                    </div>
            </div>
        </div>

    </div>

     <div class="row">

            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Description:<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <div class="input-group">
                            {!! Form::textarea('description', null, ['id' => 'description','placeholder'=>'Enter Description', 'class' =>'form-control simple_full_description']) !!}                     
                        </div>
                    </div>
                </div>
            </div>
    </div>


    <div class="row">

               

            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-form-label col-lg-4">Type:</label>
                    <div class="col-lg-8">
                        <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-sort-numeric-asc"></i></span>
                        </span>
                        {!! Form::select('type',[ 'image'=>'Image','video'=>'Video'], $value = null, ['placeholder'=>'Select Type','id'=>'type','class'=>'form-control' ]) !!}   

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
                        <label class="col-form-label col-lg-4">Image:</label>
                        <div class="col-lg-8 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-images3"></i></span>
                                </span>
                                {!! Form::file('image_path', ['id'=>'image_path','class'=>'form-control']) !!}
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
                        <label class="col-form-label col-lg-4">Youtube ID:<span class="text-danger">*</span></label>
                            <div class="col-lg-8">
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
    <legend class="text-uppercase font-size-sm font-weight-bold">Course Programme</legend>

     @if($is_edit)
        @foreach($courseinfo->CourseProgramme as $key => $programme)
                             
            <div class="appendProgramme">
                <div class="form-group row">

                     <div class="col-lg-6">
                            <div class="row">
                                <label class="col-form-label col-lg-3">Course Programme Step:</label>
                                <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-list3"></i>
                                            </span>
                                        </span>
                                        {!! Form::text('program_detail_title[]', $value = $programme->program_detail_title, ['id'=>'program_detail_title','placeholder'=>'Enter Progrmme Step','class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>


                    <div class="col-lg-2">
                       <div class="row">
                             <button type="button" class="ml-2 remove_programme btn bg-danger-800 btn-labeled btn-labeled-left"><b><i class="icon-pen-plus"></i></b> Remove</button>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    @endif

        <div class="appendProgramme">
                <div class="form-group row">

                    <div class="col-lg-6">
                        <div class="row">
                            <label class="col-form-label col-lg-3">Course Programme Step:</label>
                            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-list3"></i>
                                        </span>
                                    </span>
                                    {!! Form::text('program_detail_title[]', $value = null, ['id'=>'program_detail_title','placeholder'=>'Enter Progrmme Step','class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2">
                       <div class="row">
                                <button type="button" class="ml-2 add_programme btn bg-success-800 btn-labeled btn-labeled-left"><b><i class="icon-pen-plus"></i></b> Add Progrmme Step</button>
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
         $('#image_path').bind('change', function() {
            var a=(this.files[0].size);

            if(a > 1000000) {
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

          $('.add_programme').on('click',function(){
            $.ajax({
                    type: 'GET',
                    url: '/admin/courseinfo/appendProgramme',
                    success: function (data) {
                        $('.appendProgramme').last().append(data.options); 
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

        $('.remove_programme').on('click',function(){ 
            $(this).parent().parent().parent().remove();
        });
        
        $('.remove_structure').on('click',function(){ 
            $(this).parent().parent().parent().remove();
        });

        
    });



 </script>

