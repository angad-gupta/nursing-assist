<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>

    <div class="row">

        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-3">Course Topic/Session:<span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                       <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-bookmarks"></i></span>
                        </span>
                        {!! Form::text('course_session', $value = null, ['placeholder'=>'Enter Course Topic/Session','class'=>'course_session form-control']) !!}
                        </div>
                    </div>
            </div>
        </div>

    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="form-group row">

                    <div class="col-lg-12">
                        <h5>Course Plan Description</h5>
                        <div class="input-group">
                       
                         {!! Form::textarea('plan_description', null, ['id' => 'plan_description','placeholder'=>'Enter Course Plan Description', 'class' =>'form-control simple_full_textarea_description']) !!}

                        </div>
                    </div>

            </div>
        </div>
    </div>

    {{ Form::hidden('course_content_id', $course_content_id) }}


  <div class="row">

        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-3">Select Course Type :</label>
                    <div class="col-lg-9">
                       <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-pen2"></i></span>
                        </span>
                               {!! Form::select('plan_type',['none'=>'None', 'pdf'=>'Pdf', 'video'=>'Video','link'=>'Link','ppt' => 'PPT'], $value = null, ['id'=>'plan_type','class'=>'plan_type form-control' ]) !!}   

                        </div>
                    </div>
            </div>
        </div>


        @php 

        $imageType = (($is_edit) && (($courseplan->plan_type == 'pdf') || ($courseplan->plan_type == 'ppt'))) ? 'style=display:block;' : 'style=display:none;';

        $videoType = (($is_edit) && ($courseplan->plan_type == 'video')) ? 'style=display:block;' : 'style=display:none;';
        $linkType = (($is_edit) && ($courseplan->plan_type == 'link')) ? 'style=display:block;' : 'style=display:none;';
   
        @endphp
        <div class="col-md-6 course_link" {{$linkType}}>
            <div class="form-group row">
                <label class="col-form-label col-lg-3">Course Path Link:</label>
                    <div class="col-lg-9">
                       <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-bookmarks"></i></span>
                        </span>
                        {!! Form::text('plan_path', $value = null, ['placeholder'=>'Enter Course Material Title','class'=>'plan_path form-control']) !!}
                        </div>
                    </div>
            </div>
        </div>

         <div class="col-md-6 course_video"  {{$videoType}}>
            <div class="form-group row">
                <label class="col-form-label col-lg-3">Course Youtube Id:</label>
                    <div class="col-lg-9">
                       <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-bookmarks"></i></span>
                        </span>
                        {!! Form::text('plan_path', $value = null, ['placeholder'=>'Enter Course Material Title','class'=>'plan_path form-control']) !!}
                        </div>
                    </div>
            </div>
        </div>

         <div class="col-lg-6 image_path" {{$imageType}}>
                <div class="row">
                    <label class="col-form-label col-lg-3">Upload PDF/PPT:</label>
                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-images3"></i></span>
                            </span>
                            {!! Form::file('content_image_path', ['id'=>'content_image_path','class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

    </div>


<div class="row image_path" {{$imageType}}>
    <div class="col-lg-6">
        <div class="row">
             <label class="col-form-label col-lg-3"></label>
            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                @if($is_edit)
                    @php


                    $icon = ($courseplan->plan_type == 'ppt') ? asset('admin/ppt.png') : asset('admin/pdf.jpg');
                    $path = asset($courseplan->file_full_path).'/'.$courseplan->plan_path;

                    @endphp

                    <a href="{{$path}}" target="_blank"><img id="content_image_path" src="{{ $icon }}" alt="your image" class="preview-image" style="height: 100px;width: auto;" />{{$courseplan->plan_path }}</a>
                    @else
                    <img id="content_image_path" src="{{ asset('admin/default.png') }}" alt="your image" class="preview-image" style="height: 100px; width: auto;" />
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
                        <h4 class="text-purple">Image Size is Greater Than 2Mb. Please Upload Below 2Mb.</h4>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Thank You !!!</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
<!-- /warning modal -->



<script type="text/javascript">
    
    $(document).ready(function(){
         $('#content_image_path').bind('change', function() {
            var a=(this.files[0].size);

            if(a > 2000000) {
               $('#modal_image_size').modal('show');
               $('#content_image_path').val('');
            };
        });

         
         $('.plan_type').on('change',function(){
            var type = $(this).val();

            if(type == 'pdf' || type == 'ppt'){
                $('.image_path').show();
                $('.course_video').hide();
                $('.course_link').hide();
                $('.content_path').val('');
            }else if(type == 'video'){
                $('.course_video').show();
                $('.image_path').hide();
                $('.course_link').hide();
                $('#content_image_path').val('');
            }else if(type == 'link'){
                $('.course_link').show();
                $('.course_video').hide();
                $('.image_path').hide();
                $('#content_image_path').val('');
            }else{
                $('.course_link').hide();
                $('.course_video').hide();
                $('.image_path').hide();
                $('.content_path').val('');
                $('#content_image_path').val('');
            }

         });
    });

</script>