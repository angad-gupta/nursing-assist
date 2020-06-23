 <fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>

    <div class="row">

        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-3">Daily Material Title :<span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                       <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-pen2"></i></span>
                        </span>
                        {!! Form::text('plan_title', $value = null, ['placeholder'=>'Enter Course Material Title','class'=>'plan_title form-control']) !!}

                        </div>
                    </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-3">Short Description:</label>
                    <div class="col-lg-9">
                       <div class="input-group">
                        {!! Form::textarea('plan_description', null, ['id' => 'plan_description','placeholder'=>'Enter Short Description', 'class' =>'form-control simple_textarea_description']) !!}
                        </div>
                    </div>
            </div>
        </div>

              {{ Form::hidden('material_id', $material_id) }}
              {{ Form::hidden('course_material_detail_id', $material_detail_id) }}

    </div>

</fieldset>

<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold">Daily Topic</legend>

 	@if($is_edit)
        @foreach($materialplan->DailyMaterialPlanDetail as $key => $planDetailVal) 

        @php 

        $imageType = ($planDetailVal->topic_type == 'pdf') ? 'style=display:block;' : 'style=display:none;';
        $videoType = ($planDetailVal->topic_type == 'video') ? 'style=display:block;' : 'style=display:none;';
   
        @endphp

        	<div class="appendDaily">
                <div class="form-group row">

                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-12 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-list3"></i>
                                        </span>
                                    </span>
                                    {!! Form::text('subject_title[]', $value = $planDetailVal->subject_title, ['id'=>'subject_title','placeholder'=>'Enter Subject Title','class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                     <div class="col-lg-2">
                        <div class="row">
                            <div class="col-lg-12 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-image-compare "></i>
                                        </span>
                                    </span>
                               {!! Form::select('topic_type[]',[ 'pdf'=>'Pdf','video'=>'Video'], $value = $planDetailVal->topic_type, ['placeholder'=>'Select Type','id'=>'topic_type','class'=>'topic_type form-control' ]) !!}   

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-2 topic_video" {{ $videoType }}>
                        <div class="row">
                            <div class="col-lg-12 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-play"></i>
                                        </span>
                                    </span>
                                    {!! Form::text('video_id[]', $value = $planDetailVal->video_id, ['id'=>'video_id','placeholder'=>'Enter Youtube Id','class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                     <div class="col-lg-2 topic_pdf" {{ $imageType }}>
                        <div class="row">
                            <div class="col-lg-12 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-list3"></i>
                                        </span>
                                    </span>
                      				  {!! Form::file('pdf_path[]', ['id'=>'pdf_path','class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 topic_pdf" {{ $imageType }}>
                        <div class="row">
                            <div class="col-lg-12 form-group-feedback form-group-feedback-right">
                                @if($is_edit)
			                        @php
			                             $image = ($planDetailVal->pdf_path) ? asset($planDetailVal->file_full_path).'/'.$planDetailVal->pdf_path : asset('admin/pdf.jpg');
			                        @endphp

			                        <img id="pdf_path" src="{{$image}}" alt="your image" class="preview-image" style="height: 100px;width: auto;" />
			                        @else
			                        <img id="pdf_path" src="{{ asset('admin/pdf.jpg') }}" alt="your image" class="preview-image" style="height: 100px; width: auto;" />
			                        @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2">
                       <div class="row">
            				<button type="button" class="ml-2 remove_plan btn bg-danger-800 btn-labeled btn-labeled-left"><b><i class="icon-pen-plus"></i></b> Remove</button>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    @endif


        <div class="appendDaily">
                <div class="form-group row">

                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-12 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-list3"></i>
                                        </span>
                                    </span>
                                    {!! Form::text('subject_title[]', $value = null, ['id'=>'subject_title','placeholder'=>'Enter Subject Title','class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                     <div class="col-lg-2">
                        <div class="row">
                            <div class="col-lg-12 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-image-compare "></i>
                                        </span>
                                    </span>
                               {!! Form::select('topic_type[]',[ 'pdf'=>'Pdf','video'=>'Video'], $value = null, ['placeholder'=>'Select Type','id'=>'topic_type','class'=>'topic_type form-control' ]) !!}   

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-2 topic_video" style="display: none">
                        <div class="row">
                            <div class="col-lg-12 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-play"></i>
                                        </span>
                                    </span>
                                    {!! Form::text('video_id[]', $value = null, ['id'=>'video_id','placeholder'=>'Enter Youtube Id','class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                     <div class="col-lg-2 topic_pdf" style="display: none">
                        <div class="row">
                            <div class="col-lg-12 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-list3"></i>
                                        </span>
                                    </span>
                      				  {!! Form::file('pdf_path[]', ['id'=>'pdf_path','class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 topic_pdf" style="display: none">
                        <div class="row">
                            <div class="col-lg-12 form-group-feedback form-group-feedback-right">
                           		<img id="pdf_path" src="{{ asset('admin/pdf.jpg') }}" alt="your image" class="preview-image" style="height: 100px; width: auto;" />
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2">
                       <div class="row">
                                <button type="button" class="ml-2 add_plan btn bg-success-800 btn-labeled btn-labeled-left"><b><i class="icon-pen-plus"></i></b> Add More</button>
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
         $('#material_image').bind('change', function() {
            var a=(this.files[0].size);

            if(a > 2000000) {
               $('#modal_image_size').modal('show');
               $('#material_image').val('');
            };
        });
    });

</script>


 <script type="text/javascript">
    $(document).ready(function(){ 


    	$('.topic_type').on('change',function(){
    		var type = $(this).val();

    		if(type == 'pdf'){
    			$(this).parent().parent().parent().parent().parent().find('.topic_pdf').show();
    			$(this).parent().parent().parent().parent().parent().find('.topic_video').hide();
    		}else{
    			$(this).parent().parent().parent().parent().parent().find('.topic_pdf').hide();
    			$(this).parent().parent().parent().parent().parent().find('.topic_video').show();
    		}

    	});	

          $('.add_plan').on('click',function(){
            $.ajax({
                    type: 'GET',
                    url: '/admin/materialplan/appendDaily',
                    success: function (data) {
                        $('.appendDaily').last().append(data.options); 
                    }
                });
        }); 

        $('.remove_plan').on('click',function(){ 
            $(this).parent().parent().parent().remove();
        });

    });



 </script>