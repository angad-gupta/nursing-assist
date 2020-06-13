<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>

    <div class="row">

        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-3">Select Course Info :<span class="text-danger">*</span></label>
                    <div class="col-lg-9">
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
                <label class="col-form-label col-lg-3">Course Material Title:<span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                       <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-bookmarks"></i></span>
                        </span>
                        {!! Form::text('material_title', $value = null, ['placeholder'=>'Enter Course Material Title','class'=>'material_title form-control']) !!}
                        </div>
                    </div>
            </div>
        </div>

    </div>

        <div class="row">

        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-3">Short Content:</label>
                    <div class="col-lg-9">
                       <div class="input-group">
                        
                        {!! Form::textarea('short_content', null, ['id' => 'short_content','placeholder'=>'Enter Description', 'class' =>'form-control simple_textarea_description']) !!}
                        </div>
                    </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-3">Description:</label>
                    <div class="col-lg-9">
                       <div class="input-group">
                       
                         {!! Form::textarea('description', null, ['id' => 'description','placeholder'=>'Enter Description', 'class' =>'form-control simple_textarea_description']) !!}
                        </div>
                    </div>
            </div>
        </div>
    </div>

        <div class="row">
           <div class="col-lg-6">
                <div class="row">
                    <label class="col-form-label col-lg-3">Image:</label>
                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-images3"></i></span>
                            </span>
                            {!! Form::file('material_image', ['id'=>'material_image','class'=>'form-control']) !!}
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
                                 $image = ($coursematerial->material_image) ? asset($coursematerial->file_full_path).'/'.$coursematerial->material_image : asset('admin/default.png');
                            @endphp

                            <img id="material_image" src="{{$image}}" alt="your image" class="preview-image" style="height: 100px;width: auto;" />
                            @else
                            <img id="material_image" src="{{ asset('admin/default.png') }}" alt="your image" class="preview-image" style="height: 100px; width: auto;" />
                            @endif
                    </div>
                </div>
            </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-3">Image Fade Backgroud:</label>
                <div class="col-lg-9">
                    <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-sort-numeric-asc"></i></span>
                    </span>
                    {!! Form::select('image_fade_color',[ 'img-fade1'=>'img-fade1','img-fade2'=>'img-fade2','img-fade3'=>'img-fade3'], $value = null, ['id'=>'image_fade_color','class'=>'form-control' ]) !!}   

                    </div>
                </div>
            </div>
        </div>

         <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-3">Image Icon:</label>
                <div class="col-lg-9">
                    <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-sort-numeric-asc"></i></span>
                    </span>
                    {!! Form::select('image_icon',[ 'ic1.png'=>'ic1.png','ic2.png'=>'ic2.png','ic3.png'=>'ic3.png'], $value = null, ['id'=>'image_icon','class'=>'form-control' ]) !!}   

                    </div>
                </div>
            </div>
        </div>
    </div>

      <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-3">Image Caption:</label>
                <div class="col-lg-9">
                    <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-sort-numeric-asc"></i></span>
                    </span>
                    {!! Form::text('image_caption', $value = null, ['placeholder'=>'Enter Image Caption','class'=>'image_caption form-control']) !!}
                    </div>
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