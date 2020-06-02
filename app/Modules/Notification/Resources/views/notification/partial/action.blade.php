<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>

    <div class="row">

        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-4"> Title:<span class="text-danger">*</span></label>
                    <div class="col-lg-8">
                       <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-image2"></i></span>
                        </span>
                        {!! Form::text('title', $value = null, ['placeholder'=>'Enter Information Title','class'=>'form-control']) !!}
                        </div>
                    </div>
            </div>
        </div>

         <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-4">Language:</label>
                    <div class="col-lg-8">
                       <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-pencil"></i></span>
                        </span>
                            {!! Form::select('lang_flag',[ 'eng'=>'English','nep'=>'Nepali'], $value = null, ['id'=>'lang_flag','class'=>'form-control' ]) !!}                        
                        </div>
                    </div>
            </div>
        </div>

</div>

    <div class="row">
        
             <div class="col-lg-6">
                <div class="row">
                  <label class="col-form-label col-lg-4">Upload Image:</label>
                 <div class="col-lg-8 form-group-feedback form-group-feedback-right">
                       <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-image5"></i></span>
                            </span>
                            <input type="file" name="image_path" id="image_path" class='form-control' />
                            <span class="text-danger">{{ $errors->first('image_path') }}</span>
                        </div>
                 </div>
                </div>
            </div>


            <div class="col-lg-6">
                <div class="row">
                  <label class="col-form-label col-lg-4">Upload Pdf:</label>
                 <div class="col-lg-8 form-group-feedback form-group-feedback-right">
                       <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-image5"></i></span>
                            </span>
                            <input type="file" name="pdf_path" id="pdf_path" class='form-control' />
                            <span class="text-danger">{{ $errors->first('pdf_path') }}</span>
                        </div>
                 </div>
                </div>
            </div>

    </div>

    <div class="row mt-2 mb-2">
        
            <div class="col-lg-6">
                <div class="row">
                 <label class="col-form-label col-lg-4"></label>
                 <div class="col-lg-8 form-group-feedback form-group-feedback-right">
                        @if($is_edit AND $tipsinformation->image_path !== NULL)
                         <img id="bannerImage" src="{{asset('uploads/tipsInfo/'.$tipsinformation->image_path)}}"
                            alt="your image" class="preview-image" style="height: 100px;width: auto;"/>
                        @else
                            <img id="bannerImage" src="{{ asset('admin/image.png') }}" alt="your image" class="preview-image"
                                style="height: 100px; width: auto;"/>
                        @endif
                 </div>
                </div>
            </div>


              @php
                $ext = ($is_edit AND $tipsinformation->pdf_path !== NULL) ? pathinfo($tipsinformation->pdf_path, PATHINFO_EXTENSION) : NULL; 

                if($ext == 'pdf'){
                    $image =  asset('admin/pdf.jpg');
                    $name = $tipsinformation->pdf_path;
                }else{
                    $image =  asset('admin/pdf.jpg');
                    $name = '';
                }
            @endphp


             <div class="col-lg-6">
                <div class="row">
                 <label class="col-form-label col-lg-4"></label>
                 <div class="col-lg-8 form-group-feedback form-group-feedback-right">
                       
                    <img id="bannerImage" src="{{ $image }}" alt="your image" class="preview-image" style="height: 100px; width: auto;"/>
                    <br>
                    <br>
                    <span class="text-success">{{$name}}</span>    
                </div>
                </div>
            </div>


    </div>

     <div class="row">
        
      <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-4">Short Content:</label>
                    <div class="col-lg-8">
                       <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-pencil"></i></span>
                        </span>
                        {!! Form::textarea('short_content', $value = null, ['placeholder'=>'Enter Short Content','class'=>'form-control']) !!}
                     
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

        $('#pdf_path').bind('change', function() {
            var a=(this.files[0].size);

            if(a > 1000000) {
               $('#modal_image_size').modal('show');
               $('#pdf_path').val('');
            };
        });

    });

</script>
