
<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>


          <div class="form-group row">
                 <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Video Title:<span class="text-danger">*</span></label>
                            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-hat"></i></span>
                                </span>
                                {!! Form::text('video_title', $value = null, ['id'=>'video_title','placeholder'=>'Enter Video Title','class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Status:<span class="text-danger">*</span></label>
                            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-stack"></i></span>
                                </span>
                                {!! Form::select('status',[ '1'=>'Active','2'=>'In-Active'], null, ['id'=>'status','placeholder'=>'--Select Status--','class'=>'form-control']) !!}
                                </div>
                            </div>
                    </div>
                </div>
            </div>


            <div class="form-group row">
                <div class="col-lg-6">
                    <div class="row">
                       <label class="col-form-label col-lg-3">Short Content:</label>
                            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                    {!! Form::textarea('short_content', null, ['id' => 'short_content','placeholder'=>'Enter Short Content', 'class' =>'form-control simple_textarea_description']) !!}
                                </div>
                            </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Content:</label>
                            <div class="col-lg-9">
                               <div class="input-group">
                                    {!! Form::textarea('content', null, ['id' => 'content','placeholder'=>'Enter Content', 'class' =>'form-control simple_textarea_description']) !!}
                                </div>
                            </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">

                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Thumbnaiil Image:</label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-images3"></i></span>
                                </span>
                                {!! Form::file('thumbnail_image', ['id'=>'thumbnail_image','class'=>'form-control']) !!}
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
                                     $image = ($video_info->thumbnail_image) ? asset($video_info->file_full_path).'/'.$video_info->thumbnail_image : asset('admin/image.png');
                                @endphp

                                <img id="thumbnail_image" src="{{$image}}" alt="your image" class="preview-image" style="height: 100px;width: auto;" />
                                @else
                                <img id="thumbnail_image" src="{{ asset('admin/image.png') }}" alt="your image" class="preview-image" style="height: 100px; width: auto;" />
                                @endif
                        </div>

                    </div>
                </div>

            </div>

                @php
                  if($is_edit){
                        $youtubeSection = ($video_info->is_youtube_image == '1') ? 'style=display:block;' : 'style=display:none;';
                        $videoType = ($video_info->is_youtube_image == '2') ? 'style=display:block;' : 'style=display:none;';
                    }else{
                        $youtubeSection = 'style=display:none;';
                        $videoType = 'style=display:none;';
                    }
                @endphp


            <div class="form-group row">
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Is Youtube Video ?:<span class="text-danger">*</span></label>
                            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-stack"></i></span>
                                </span>
                                {!! Form::select('is_youtube_image',[ '1'=>'Yes','2'=>'No'], null, ['id'=>'is_youtube_image','placeholder'=>'--Select Is Youtube Video--','class'=>'form-control']) !!}
                                </div>
                            </div>
                    </div>
                </div>
                    <div class="col-lg-6 youtube_section" {{$youtubeSection}}>
                        <div class="row">
                            <label class="col-form-label col-lg-3">Youtube Id:</label>
                                <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                    <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-hat"></i></span>
                                    </span>
                                    {!! Form::text('youtube_id', $value = null, ['id'=>'youtube_id','placeholder'=>'Enter Youtube Id','class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="form-group row">

                <div class="col-lg-6 video_section" {{$videoType}}>
                    <div class="row">
                        <label class="col-form-label col-lg-3">Video:</label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-images3"></i></span>
                                </span>
                                {!! Form::file('video_path', ['id'=>'video_path','class'=>'form-control']) !!}    
                            </div>
                            <br>
                            <br>
                            <span class="text-success font-weight-bold font-italic">Note :: The recommended Video Type is Mp4. </span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 video_section" {{$videoType}}>
                    <div class="row">
                         <label class="col-form-label col-lg-3"></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            @if($is_edit)
                                @php
                                     $video = ($video_info->video_path) ? asset($video_info->file_full_path).'/'.$video_info->video_path : asset('admin/video.jpeg');
                                @endphp
                                <video width="auto" height="100px" controls>
                                      <source src="{{$image}}" type="video/mp4">
                                      Your browser does not support the video tag.
                                    </video>
                                @else
                                <img id="video_path" src="{{ asset('admin/video.jpeg') }}" alt="your image" class="preview-image" style="height: 100px; width: auto;" />
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
                        <h4 class="text-purple">Banner Image Size is Greater Than 2Mb. Please Upload Below 2Mb.</h4>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Thank You !!!</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
<!-- /warning modal -->



<script type="text/javascript">
    
    $(document).ready(function(){

        $('#is_youtube_image').on('change',function(){
            var type = $(this).val();

            if(type == '1'){
                $('.youtube_section').show();
                $('.video_section').hide();
            }else{
                $('.video_section').show();
                $('.youtube_section').hide();
            }
        });

         $('#thumbnail_image').bind('change', function() {
            var a=(this.files[0].size);

            if(a > 2000000) {
               $('#modal_image_size').modal('show');
               $('#thumbnail_image').val('');
            };
        });

    });

</script>

