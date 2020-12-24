
<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>


            <div class="form-group row">
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Student Name:<span class="text-danger">*</span></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-hat"></i>
                                    </span>
                                </span>
                                {!! Form::text('student_name', $value = null, ['id'=>'student_name','placeholder'=>'Enter Student Name','class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Designation:<span class="text-danger">*</span></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-pencil"></i>
                                    </span>
                                </span>
                                {!! Form::text('designation', $value = null, ['id'=>'designation','placeholder'=>'Enter Designation','class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             <div class="form-group row">
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Profile Pic:</label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-images3"></i></span>
                                </span>
                                {!! Form::file('profile_pic', ['id'=>'profile_pic','class'=>'form-control']) !!}
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
                                        $image = ($whatourstudentsay_info->profile_pic) ? asset($whatourstudentsay_info->file_full_path).'/'.$whatourstudentsay_info->profile_pic : asset('admin/default.png');

                                    @endphp

                                    <img id="profile_pic" src="{{$image}}" alt="your image" class="preview-image" style="height: 100px;width: auto;" />
                                    @else
                                    <img id="profile_pic" src="{{ asset('admin/default.png') }}" alt="your image" class="preview-image" style="height: 100px; width: auto;" />
                                    @endif
                                    <br>
                                    <br>
                                    <span class="text-success font-weight-bold font-italic">Note :: The recommended dimensions is 450 X 450. </span>
                            </div>

                        </div>
                    </div>
        </div>

            <div class="form-group row">
                <div class="col-lg-12">
                    <div class="row">
                        <label class="col-form-label col-lg-1">Message:</label>
                        <div class="col-lg-11 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                 {!! Form::textarea('message', null, ['id' => 'message','placeholder'=>'Enter Message', 'class' =>'form-control simple_textarea_description']) !!}
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
         $('#profile_pic').bind('change', function() {
            var a=(this.files[0].size);

            if(a > 1000000) {
               $('#modal_image_size').modal('show');
               $('#profile_pic').val('');
            };
        });
    });

</script>
