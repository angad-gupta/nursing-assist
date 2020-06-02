<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold">Employee Details Form</legend>

    <div class="form-group row">
        <div class="col-lg-6">
            <div class="row">
                <label class="col-form-label col-lg-3">Employee ID:</label>
                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-key"></i>
                                </span>
                            </span>
                    {!! Form::text('employee_id', $value = null, ['id'=>'employee_id','placeholder'=>'Enter Employee ID','class'=>'form-control']) !!}
                        </div>
                    </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="row">
                <label class="col-form-label col-lg-3">Salutation:<span class="text-danger">*</span></label>
                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-hat"></i>
                                </span>
                            </span>
                    {!! Form::select('salutation_title',['1'=>'Mr.', '0'=>'Ms.'], $value = null, ['id'=>'salutation_title','placeholder'=>'Select Salutation','class'=>'form-control']) !!}
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            <div class="row">
                <label class="col-form-label col-lg-3">First Name:<span class="text-danger">*</span></label>
                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-pencil"></i>
                                </span>
                            </span>
                    {!! Form::text('first_name', $value = null, ['id'=>'first_name','placeholder'=>'Enter First Name','class'=>'form-control']) !!}
                        </div>
                    </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="row">
                <label class="col-form-label col-lg-3">Middle Name:</label>
                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-pencil"></i>
                                </span>
                            </span>
                        {!! Form::text('middle_name', $value = null, ['id'=>'middle_name','placeholder'=>'Enter Middle Name','class'=>'form-control']) !!}
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            <div class="row">
                <label class="col-form-label col-lg-3">Last Name:<span class="text-danger">*</span></label>
                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-pencil"></i>
                                </span>
                            </span>
                    {!! Form::text('last_name', $value = null, ['id'=>'last_name','placeholder'=>'Enter Last Name','class'=>'form-control']) !!}
                        </div>
                    </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="row">
                <label class="col-form-label col-lg-3">Gender:<span class="text-danger">*</span></label>
                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-man-woman"></i>
                                </span>
                            </span>
                        {!! Form::select('gender',[ '1'=>'Male','0'=>'Female'], $value = null, ['id'=>'gender','placeholder'=>'Select Gender','class'=>'form-control gender']) !!}
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            <div class="row">
                <label class="col-form-label col-lg-3">DOB:<span class="text-danger">*</span></label>
                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-calendar3"></i>
                                </span>
                            </span>
                    {!! Form::text('dob', $value = null, ['id'=>'anytime-month-numeric','placeholder'=>'Enter DOB','class'=>'form-control']) !!}
                        </div>
                    </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="row">
                <label class="col-form-label col-lg-3">Joining Date:<span class="text-danger">*</span></label>
                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-calendar3"></i>
                                </span>
                            </span>
                        {!! Form::text('join_date', $value =null , ['id'=>'join_date','placeholder'=>'Enter given Date','class'=>'form-control daterange-single']) !!}
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            <div class="row">
                <label class="col-form-label col-lg-3">Phone:</label>
                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-phone"></i>
                                </span>
                            </span>
                     {!! Form::text('phone', $value = null, ['id'=>'phone','placeholder'=>'Enter Employee Phone','class'=>'form-control numeric', 'maxlength'=>10]) !!}
                        </div>
                    </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="row">
                <label class="col-form-label col-lg-3">Mobile 1:<span class="text-danger">*</span></label>
                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-mobile"></i>
                                </span>
                            </span>
                        {!! Form::text('mobile', $value = null, ['id'=>'mobile','placeholder'=>'Enter Employee Mobile 1','class'=>'form-control numeric', 'maxlength'=>10]) !!}
                        </div>
                    </div>
            </div>
        </div>
    </div>

     <div class="form-group row">
        <div class="col-lg-6">
            <div class="row">
                <label class="col-form-label col-lg-3">Mobile 2:</label>
                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-mobile2"></i>
                                </span>
                            </span>
                     {!! Form::text('mobile_2', $value = null, ['id'=>'mobile_2','placeholder'=>'Enter Employee mobile 2','class'=>'form-control numeric', 'maxlength'=>10]) !!}
                        </div>
                    </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="row">
                <label class="col-form-label col-lg-3">Personal Email:<span class="text-danger">*</span></label>
                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-envelope"></i>
                                </span>
                            </span>
                        {!! Form::email('personal_email', $value = null, ['id'=>'personal_email','placeholder'=>'Enter Employee Personal Email','class'=>'form-control']) !!}
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            <div class="row">
                <label class="col-form-label col-lg-3">Designation:<span class="text-danger">*</span></label>
                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-user-tie"></i>
                                </span>
                            </span>
                    {!! Form::select('designation_id',$designation, $value = null, ['id'=>'designation_id','placeholder'=>'Select Designation','class'=>'form-control']) !!}
                        </div>
                    </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="row">
                <label class="col-form-label col-lg-3">Department:<span class="text-danger">*</span></label>
                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-office"></i>
                                </span>
                            </span>
                        {!! Form::select('department_id',$department, $value = null, ['id'=>'department_id','placeholder'=>'Select Department','class'=>'form-control']) !!}
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            <div class="row">
                <label class="col-form-label col-lg-3">Address:<span class="text-danger">*</span></label>
                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-map4"></i>
                                </span>
                            </span>
                     {!! Form::text('address', $value = null, ['id'=>'address','placeholder'=>'Enter Address','class'=>'form-control']) !!}
                        </div>
                    </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="row">
                <label class="col-form-label col-lg-3">Country:</label>
                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-compass4"></i>
                                </span>
                            </span>
                        {!! Form::select('country_id', $countries, $value = 156, ['id'=>'country_id','placeholder'=>'Please Select Country','class'=>'form-control']) !!}
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            <div class="row">
                <label class="col-form-label col-lg-3">Blood Group:</label>
                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-droplet"></i>
                                </span>
                            </span>
                     {!! Form::select('blood_group',$blood_group, $value = null, ['id'=>'blood_group','placeholder'=>'Select Blood Group','class'=>'form-control']) !!}
                        </div>
                    </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="row">
                <label class="col-form-label col-lg-3">Martial Status:</label>
                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-heart6"></i>
                                </span>
                            </span>
                        {!! Form::select('martial_status',[ '0'=>'Single','1'=>'Married'], $value = null, ['id'=>'martial_status','class'=>'form-control']) !!}
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-lg-6">
            <div class="row">
                <label class="col-form-label col-lg-3">Religion:<span class="text-danger">*</span></label>
                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-atom2"></i>
                                </span>
                            </span>
                     {!! Form::select('religion',$religion, $value = null, ['id'=>'religion','placeholder'=>'Select Religion','class'=>'form-control']) !!}
                        </div>
                    </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="row">
                <label class="col-form-label col-lg-3">Ethnicity:<span class="text-danger">*</span></label>
                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-people"></i>
                                </span>
                            </span>
                        {!! Form::select('cast_ethnic',$ethnic, $value = null, ['id'=>'cast_ethnic','placeholder'=>'Select Ethnicity','class'=>'form-control']) !!}
                        </div>
                    </div>
            </div>
        </div>
    </div>

</fieldset>



<script type="text/javascript">

    $(document).ready(function () {

        $('#personal_email').keyup(function() {
        var personal_email = $(this).val();
        $.ajax({
            type:"GET",
            url:"{{route('employment.checkAvailability')}}",
            data: "email="+personal_email,
            success:function(res) {
                if(res == 1) {
                    $('#email_unique').removeClass('text-success');
                    $('#email_unique').find('.form-control-feedback').remove();
                    $('#personal_email').removeClass('border-success');
                    $('#email_unique').addClass('text-danger');
                    $('#email_unique').append('<em id="personal_email-error" class="error help-block">Email Already Exists</em>');
                } else {
                    $('#email_unique').removeClass('text-danger');
                    $('#personal_email-error').html('');
                    $('#email_unique').addClass('text-success');
                    $('#personal_email').addClass('border-success');
                }
            }
        });
    });


        $(document).on('change', '#salutation_title', function () {
            var salutation_title = $(this).val();

            if (salutation_title === '0') {
                $(".gender").val('0');
            } else
            {
                $(".gender").val('1');
            }
        });
        $('.select-search').select2();
    });


</script>
