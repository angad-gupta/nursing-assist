
<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>

     

            <div class="form-group row">

                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Title:<span class="text-danger">*</span></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-pencil"></i>
                                    </span>
                                </span>
                                 @if($is_edit)

                                    {!! Form::text('title', $value = null, ['id'=>'title','class'=>'form-control','readonly']) !!}
                                  
                                  @else

                                    {!! Form::select('title',['About Us'=>'About Us','We Offer'=>'What we Offer','Contact Us'=>'Contact Us','Terms and Conditions'=>'Terms & Conditions','Privacy Policy'=>'Privacy Policy','Terms of Use' => 'Terms of Use','Refund Policy'=>'Refund Policy','User Agreement'=> 'User Agreement', 'Fee and Payment Plan' => 'Fee & Payment Plan'], $value = null, ['id'=>'title','class'=>'form-control' ]) !!}    

                                  @endif    
                            </div>
                        </div>
                    </div>
                </div>

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

            </div>

             <div class="form-group row">

                  <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Short Content:<span class="text-danger">*</span></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                {!! Form::textarea('short_content', $value = null, ['placeholder'=>'Enter Short Content','class'=>'form-control simple_textarea_description']) !!}
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
                                     $image = ($page->image) ? asset($page->file_full_path).'/'.$page->image : asset('admin/image.png');
                                @endphp

                                <img id="image" src="{{$image}}" alt="your image" class="preview-image" style="height: 100px;width: auto;" />
                                @else
                                <img id="image" src="{{ asset('admin/image.png') }}" alt="your image" class="preview-image" style="height: 100px; width: auto;" />
                                @endif
                        </div>

                    </div>
                </div>
        </div>

         <div class="form-group row">

               <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Description:<span class="text-danger">*</span></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                {!! Form::textarea('description', $value = null, ['placeholder'=>'Enter Description','class'=>'form-control textarea_description']) !!}
                            </div>
                        </div>
                    </div>
                </div>

               <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">YouTube ID:</label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-play"></i></span>
                                </span>
                                    {!! Form::text('youtube_id', $value = null, ['id'=>'youtube_id','class'=>'form-control']) !!}
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
         $('#image').bind('change', function() {
            var a=(this.files[0].size);

            if(a > 1000000) {
               $('#modal_image_size').modal('show');
               $('#image').val('');
            };
        });

    });

</script>

