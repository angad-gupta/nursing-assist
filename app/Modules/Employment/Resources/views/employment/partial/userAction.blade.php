<script src="{{ asset('admin/global/js/plugins/pickers/daterangepicker.js')}}"></script>

<script src="{{ asset('admin/global/js/plugins/pickers/pickadate/picker.js')}}"></script>
<script src="{{ asset('admin/global/js/plugins/pickers/pickadate/picker.date.js')}}"></script>

<script src="{{ asset('admin/global/js/demo_pages/picker_date.js')}}"></script>


<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold">Employment Detail</legend>
    
    <div class="form-group row">
        <label class="col-form-label col-lg-3">First Name:<span class="text-danger">*</span></label>
        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-user"></i></span>
                </span>
                {!! Form::text('first_name', $value = null, ['id'=>'first_name','placeholder'=>'Enter First Name','class'=>'form-control']) !!}
                <span class="text-danger">{{ $errors->first('first_name') }}</span>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-lg-3">Last Name:<span class="text-danger">*</span></label>
        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-user"></i></span>
                </span>
                {!! Form::text('last_name', $value = null, ['id'=>'last_name','placeholder'=>'Enter Last Name','class'=>'form-control']) !!}
                <span class="text-danger">{{ $errors->first('last_name') }}</span>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-lg-3">Phone No.:<span class="text-danger">*</span></label>
        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-phone"></i></span>
                </span>
                {!! Form::text('phone', $value = null, ['id'=>'phone','placeholder'=>'Enter Phone Number','class'=>'form-control numeric']) !!}
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-lg-3">Address:<span class="text-danger">*</span></label>
        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-home2"></i></span>
                </span>
                {!! Form::text('address', $value = null, ['id'=>'address','placeholder'=>'Enter Address','class'=>'form-control']) !!}
            </div>
        </div>
    </div>
</fieldset>

<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold">Personal Detail</legend>

    <div class="form-group row">
        <label class="col-form-label col-lg-3">Gender:<span class="text-danger">*</span></label>
        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-man-woman"></i></span>
                </span>
                {!! Form::select('gender',[ '1'=>'Male','0'=>'Female'], $value = null, ['id'=>'gender','class'=>'form-control']) !!}
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-lg-3">Martial Status:</label>
        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
            {!! Form::select('martial_status',[ '0'=>'Single','1'=>'Married'], $value = null, ['id'=>'martial_status','class'=>'form-control']) !!}
        </div>
    </div>


    <div class="form-group row">
        <label class="col-form-label col-lg-3">DOB:<span class="text-danger">*</span></label>
        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-calendar22"></i></span>
                </span>
                {!! Form::text('dob', $value = null, ['id'=>'dob','placeholder'=>'Enter DOB','class'=>'form-control pickadate-accessibility']) !!}
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-lg-3">City/Suburb:<span class="text-danger">*</span></label>
        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-pencil"></i></span>
                </span>
                {!! Form::text('city', $value = null, ['id'=>'city','placeholder'=>'Enter City','class'=>'form-control']) !!}
            </div>
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-form-label col-lg-3">State/Province:<span class="text-danger">*</span></label>
        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-pencil"></i></span>
                </span>
                {!! Form::text('state', $value = null, ['id'=>'state','placeholder'=>'Enter State','class'=>'form-control']) !!}
            </div>
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-form-label col-lg-3">Country:<span class="text-danger">*</span></label>
        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-pencil"></i></span>
                </span>
                {!! Form::select('country_id',$countries, $value = null, ['id'=>'country_id','placeholder'=>'Select Country','class'=>'form-control']) !!}
            </div>
        </div>
    </div>
    
     <div class="form-group row">
        <label class="col-form-label col-lg-3">Personal Email:<span class="text-danger">*</span></label>
        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-envelop2"></i></span>
                </span>
                {!! Form::text('personal_email', $value = null, ['id'=>'personal_email','placeholder'=>'Enter Personal Email','class'=>'form-control']) !!}
            </div>
        </div>
    </div>

</fieldset>

<div class="text-right">
    <button type="submit" class="btn bg-teal-400">{{ $btnType }} <i class="icon-database-insert"></i></button>
</div>
