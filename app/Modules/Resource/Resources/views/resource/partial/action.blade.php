<style>
#mceu_13 {
    width:100%!important
}
</style>
<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>

    <div class="form-group row">
        <label class="col-form-label col-lg-3">Title:<span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-bookmarks"></i></span>
                </span>
                {!! Form::text('title', $value = null, ['id'=>'title', 'placeholder'=>'Enter Title','class'=>'form-control']) !!}
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-lg-3">Description:<span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <div class="input-group">
                {!! Form::textarea('description', null, ['id' => 'description','placeholder'=>'Enter Description',
                'class' =>'form-control simple_textarea_description']) !!}
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-lg-3">Status:<span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-sort-numeric-asc"></i></span>
                </span>
                {!! Form::select('status',['1'=>'Active','0'=>'In-active'], $value = null,
                ['id'=>'status','class'=>'form-control' ]) !!}

            </div>
        </div>
    </div>

    {{--<div class="form-group row">
        <label class="col-form-label col-lg-3">Type:<span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-sort-numeric-asc"></i></span>
                </span>
                {!! Form::select('type',[ 'image'=>'Image','video'=>'Video', 'word'=>'Word', 'pdf'=> 'PDF', 'powerpoint'=>'Powerpoint'], $value = null,
                ['placeholder'=>'Select Type','id'=>'type','class'=>'form-control' ]) !!}
            </div>
        </div>
    </div>--}}

    <div class="form-group row">
        <label class="col-form-label col-lg-3">Image/Video/Word/Pdf/Powerpoint:<span class="text-danger">*</span></label>
        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-images3"></i></span>
                </span>
                {!! Form::file('source_name', ['id'=>'source_name','class'=>'form-control']) !!}
            </div>
        </div>
         
    </div>

    <div class="form-group row">
        <label class="col-form-label col-lg-3"></label>
        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
            @if($is_edit)
                @if(strpos($resource->mime_type, 'image') !== false)
                    <img id="image_path" src="{{asset($resource->file_full_path).'/'.$resource->source_name}}"  class="preview-image"
                        style="height: 100px;width: auto;" />
                @elseif(strpos($resource->mime_type, 'video') !== false)
                    <iframe id="image_path" width="200" height="200" src="{{asset($resource->file_full_path).'/'.$resource->source_name}}" frameborder="0" allowtransparency="true" allowfullscreen></iframe>  
                @elseif(strpos($resource->mime_type, 'application') !== false || strpos($resource->mime_type, 'plain') !== false )
                    <a href="{{asset($resource->file_full_path).'/'.$resource->source_name}}" download><p>{{$resource->source_name}}</p> </a>
                @endif
            @endif
        </div>
    </div>
</fieldset>

<div class="text-right">
    <button type="submit" class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i
                class="icon-database-insert"></i></b> {{ $btnType }}</button>
</div>

<!-- Warning modal -->
{{--<div id="modal_image_size" class="modal fade" tabindex="-1">
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
</div>--}}
<!-- /warning modal -->

{{--<script type="text/javascript">
    $(document).ready(function () {
        $('#source_name').bind('change', function () {
            var a = (this.files[0].size);

            if (a > 2000000) {
                $('#modal_image_size').modal('show');
                $('#source_name').val('');
            };
        });
    });

</script>

<script type="text/javascript">
    $(document).ready(function () {

        $('#type').on('change', function () {
            var type = $(this).val();

            if (type == 'image') {
                $('.image_type').show();
                $('.video_type').hide();
            } else {
                $('.video_type').show();
                $('.image_type').hide();
            }
        });

    });

</script>--}}
