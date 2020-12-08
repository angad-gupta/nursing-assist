<script src="{{ asset('admin/validation/vehicle_servicing.js')}}"></script>
<script src="{{ asset('admin/global/js/plugins/pickers/daterangepicker.js')}}"></script>
<script src="{{ asset('admin/global/js/demo_pages/picker_date.js')}}"></script>
<script src="{{ asset('admin/global/js/plugins/uploaders/fileinput/fileinput.min.js')}}"></script>
<script src="{{ asset('admin/global/js/demo_pages/uploader_bootstrap.js')}}"></script>

<script src="{{ asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
<script src="{{ asset('admin/global/js/demo_pages/form_select2.js')}}"></script>

<script src="{{ asset('admin/validation/gallery.js')}}"></script>

<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>

            <div class="form-group row">
                 <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-4">Album Title:<span class="text-danger">*</span></label>
                            <div class="col-lg-8 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-hat"></i></span>
                                </span>
                                {!! Form::text('album_title', $value = null, ['id'=>'album_title','placeholder'=>'Enter Album Title','class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-4">Status:<span class="text-danger">*</span></label>
                            <div class="col-lg-8 form-group-feedback form-group-feedback-right">
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
                       <label class="col-form-label col-lg-4">Short Content:</label>
                            <div class="col-lg-8 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                    {!! Form::textarea('short_content', null, ['id' => 'short_content','placeholder'=>'Enter Short Content', 'class' =>'form-control simple_textarea_description']) !!}
                                </div>
                            </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-form-label col-lg-4">Content:</label>
                            <div class="col-lg-8">
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
                        <label class="col-form-label col-lg-3">Thumbnail Image:</label>
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
                                     $image = ($gallery->thumbnail_image) ? asset($gallery->file_full_path).'/'.$gallery->thumbnail_image : asset('admin/image.png');
                                @endphp

                                <img id="thumbnail_image" src="{{$image}}" alt="your image" class="preview-image" style="height: 100px;width: auto;" />
                                @else
                                <img id="thumbnail_image" src="{{ asset('admin/image.png') }}" alt="your image" class="preview-image" style="height: 100px; width: auto;" />
                                @endif
                        </div>

                    </div>
                </div>

            </div>


</fieldset>

<div class="text-right">
    @if($is_edit)
    <button type="submit" id="add_album_image" class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i class="icon-database-insert"></i></b>{{$btnType}}</button>
    @else
    <span id="add_album_image" class="ml-2 btn bg-teal-600 btn-labeled btn-labeled-left"><b><i class="icon-images3"></i></b>Add Album Images</span>
    <button type="submit" class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i class="icon-database-insert"></i></b>{{$btnType}}</button>
    @endif
</div>

<fieldset class="mb-3 album_images" @if(!$is_edit) style="display: none;" @endif>
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>

        <div class="card">
    <div class="card-body">

        <fieldset class="mb-12">
            <legend class="text-uppercase font-size-sm font-weight-bold"></legend> 


            <div class="card">
                <div class="card-header bg-teal d-flex justify-content-between">
                    <h6 class="card-title">Upload Album Images</h6>
                </div>
                <div class="card-header">
                    <div class="header-elements">
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <input type="file" name="album_image[]" class="file-input" multiple="multiple" data-fouc>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </fieldset>
    </div>
</div>

@if($is_edit)
<div class="card">
    <div class="card-body d-sm-flex align-items-sm-center justify-content-sm-between flex-sm-wrap">
        <span style="font-size: x-large;"><i
            class="icon-stack2 icon-1x text-pink-400 border-pink-400 border-3 rounded-round p-2 mb-1 mt-1"></i>
            List of Album Images :: </span>

        </div>
    </div>

    <div class="card">
        <div class="card-header header-elements-inline">
            <div class="table-responsive">
                <table class='table table-striped' id='table1' cellspacing='0' width='100%'>
                    <tbody>
                        <tr style="font-size:small;">
                            <?php
                            $counter = 0;
                            if ($is_edit) {

                                foreach ($gallery_image as $key):

                                    ++$counter;
                                        $file_icon = asset('admin/image.png');
                                
                                    ?>

                                    <td width="1%"><a href="{{ asset('uploads') }}/Gallery/Album/{{$key->image_path}}" target="_blank"><img src="{{ $file_icon }}" height="30px" width="30px"></a></td>
                                        <td>
                                            <a href="{{ asset('uploads') }}/Gallery/Album/{{$key->image_path}}" target="_blank">{{ $key->image_path}}</a></td>

                                            <td><a data-toggle="modal" data-target="#modal_image_delete" class="btn bg-danger-400 btn-icon rounded-round delete_document_file" link="{{route('gallery.deleteAlbumImage',['image_id'=>$key->id])}}"><i class="icon-bin"></i></a>
                                            </td>    

                                                <?php  if ($counter % 2 == 0) echo '</tr><tr style="font-size:small;">'; ?>

                                                    <?php
                                                endforeach;
                                            } else {
                                                ?>
                                            </tr>
                                            <tr>
                                                <td colspan="8">
                                                    <center>No Images Found !!!</center>
                                                </td>
                                            </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endif

                    
    </legend>
</fieldset>



<!-- Warning modal -->
    <div id="modal_image_delete" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                 <div class="modal-body">
                    <center>
                        <i class="icon-alert text-danger icon-3x"></i>
                    </center>
                    <br>
                    <center>
                        <h2>Are You Sure Want To Delete ?</h2>
                        <a class="btn btn-success get_link" href="">Yes, Delete It!</a>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
<!-- warning modal -->

<script type="text/javascript">
    $('document').ready(function() {

        $('#add_album_image').on('click',function(){

            var album_title = $('#album_title').val();

            if(album_title !== ''){
                $('.album_images').show();
            }else{
                 $('#album_title').parent().find('span .input-group-text').addClass("alpha-danger text-danger border-danger ").removeClass("alpha-success text-success border-success");
                $('#album_title').addClass("border-danger").removeClass("border-success");
                $('#album_title').parent().parent().addClass("text-danger").removeClass("text-success");
                $('#album_title').next('div .form-control-feedback').find('i').addClass("icon-cross2 text-danger").removeClass("icon-checkmark4 text-success");
            }
        });

        $('.delete_document_file').on('click', function() {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        }); 


    });
</script>

