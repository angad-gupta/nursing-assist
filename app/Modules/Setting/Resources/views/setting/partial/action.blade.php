<fieldset class="mb-1">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>
    <div class="form-group row">
        <label class="col-form-label col-lg-2">Main Navbar Color:</label>
        <div class="col-lg-2 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-eyedropper2"></i></span>
                </span>
                {!! Form::text('main_navbar_color', $value = null, ['id'=>'main_navbar_color','class'=>'form-control colorpicker-show-input','data-preferred-format'=>'hex']) !!}
                <span class="text-danger">{{ $errors->first('main_navbar_color') }}</span>
            </div>
        </div>

        <label class="col-form-label col-lg-2">Secondary Navbar Color:</label>
        <div class="col-lg-2 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-eyedropper2"></i></span>
                </span>
                {!! Form::text('secondary_navbar_color', $value = null, ['id'=>'secondary_navbar_color','class'=>'form-control colorpicker-show-input','data-preferred-format'=>'hex']) !!}
                <span class="text-danger">{{ $errors->first('secondary_navbar_color') }}</span>
            </div>
        </div>

        <label class="col-form-label col-lg-2">Page Header Color:</label>
        <div class="col-lg-2 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-eyedropper2"></i></span>
                </span>
                {!! Form::text('page_header_color', $value = null, ['id'=>'page_header_color','class'=>'form-control colorpicker-show-input','data-preferred-format'=>'hex']) !!}
                <span class="text-danger">{{ $errors->first('page_header_color') }}</span>
            </div>
        </div>

    </div>
    <div class="form-group row">
        <label class="col-form-label col-lg-3">Company Name:</label>
        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-pencil5"></i></span>
                </span>
                {!! Form::text('company_name',$value = null, ['id'=>'company_name','placeholder'=>'Company Name','class'=>'form-control']) !!}
                <span class="text-danger">{{ $errors->first('company_name') }}</span>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-lg-3">Company Website:</label>
        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-chrome"></i></span>
                </span>
                {!! Form::text('website',$value = null, ['id'=>'website','placeholder'=>'Enter Company Website','class'=>'form-control']) !!}
                <span class="text-danger">{{ $errors->first('website') }}</span>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-lg-3">Company Logo:</label>
        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-image5"></i></span>
                </span>
                {!! Form::file('company_logo',$value = null, ['id'=>'company_logo', 'class'=>'form-control']) !!}
                <span class="text-danger">{{ $errors->first('company_logo') }}</span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3 form-group-feedback form-group-feedback-right">
        </div>
        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
            @if($is_edit AND $setting->company_logo !== NULL)
                <img id="bannerImage" src="{{asset('uploads/setting/'.$setting->company_logo)}}"
                     alt="your image" class="preview-image" style="height: 100px;width: auto;"/>
            @else
                <img id="bannerImage" src="{{ asset('admin/default.png') }}" alt="your image" class="preview-image"
                     style="height: 100px; width: auto;"/>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-lg-3">Company Address 1:</label>
        <div class="col-lg-3 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-location4"></i></span>
                </span>
                {!! Form::text('address_1',$value = null, ['id'=>'address_1','placeholder'=>'Enter Address 1','class'=>'form-control']) !!}
                <span class="text-danger">{{ $errors->first('address_1') }}</span>
            </div>
        </div>
        <label class="col-form-label col-lg-3">Company Address 2:</label>
        <div class="col-lg-3 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-location4"></i></span>
                </span>
                {!! Form::text('address_2',$value = null, ['id'=>'address_2','placeholder'=>'Enter Address 2','class'=>'form-control']) !!}
                <span class="text-danger">{{ $errors->first('address_2') }}</span>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-lg-3">Company Phone 1:</label>
        <div class="col-lg-3 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-phone"></i></span>
                </span>
                {!! Form::text('phone_1',$value = null, ['id'=>'phone_1','placeholder'=>'Enter Phone 1','class'=>'form-control numeric']) !!}
                <span class="text-danger">{{ $errors->first('phone_1') }}</span>
            </div>
        </div>
        <label class="col-form-label col-lg-3">Company Phone 2:</label>
        <div class="col-lg-3 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-phone"></i></span>
                </span>
                {!! Form::text('phone_2',$value = null, ['id'=>'phone_2','placeholder'=>'Enter Phone 2','class'=>'form-control numeric']) !!}
                <span class="text-danger">{{ $errors->first('phone_2') }}</span>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-lg-3">Company Mobile 1:</label>
        <div class="col-lg-3 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-iphone"></i></span>
                </span>
                {!! Form::text('mobile_1',$value = null, ['id'=>'mobile_1','placeholder'=>'Enter Mobile 1','class'=>'form-control numeric']) !!}
                <span class="text-danger">{{ $errors->first('mobile_1') }}</span>
            </div>
        </div>
        <label class="col-form-label col-lg-3">Company Mobile 2:</label>
        <div class="col-lg-3 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-iphone"></i></span>
                </span>
                {!! Form::text('mobile_2',$value = null, ['id'=>'mobile_2','placeholder'=>'Enter Mobile 2','class'=>'form-control numeric']) !!}
                <span class="text-danger">{{ $errors->first('mobile_2') }}</span>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-lg-3">Company Email 1:</label>
        <div class="col-lg-3 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-mention"></i></span>
                </span>
                {!! Form::email('email_1',$value = null, ['id'=>'email_1','placeholder'=>'Enter Email 1','class'=>'form-control']) !!}
                <span class="text-danger">{{ $errors->first('email_1') }}</span>
            </div>
        </div>
        <label class="col-form-label col-lg-3">Company Email 2:</label>
        <div class="col-lg-3 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-mention"></i></span>
                </span>
                {!! Form::email('email_2',$value = null, ['id'=>'email_2','placeholder'=>'Enter Email 2','class'=>'form-control']) !!}
                <span class="text-danger">{{ $errors->first('email_2') }}</span>
            </div>
        </div>
    </div>

    <div class="row ml-1 mr-1 mt-3 mb-0">
        <div class="col-xl-6 col-sm-6 ">
            <div class="form-group row ">
                <label class="col-form-label col-lg-6">Instagram Link:</label>
                <div class="col-lg-6 form-group-feedback form-group-feedback-right">
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-instagram"></i></span>
                        </span>
                        {!! Form::text('instagram_link', $value = null, ['id'=>'instagram_link','class'=>'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('instagram_link') }}</span>
                    </div>
                </div>
            </div>
            <div class="form-group row ">
                <label class="col-form-label col-lg-6">Facebook Link:</label>
                <div class="col-lg-6 form-group-feedback form-group-feedback-right">
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-facebook2"></i></span>
                        </span>
                        {!! Form::text('facebook_link', $value = null, ['id'=>'facebook_link','class'=>'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('facebook_link') }}</span>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-lg-6">LinkIn Link:</label>
                <div class="col-lg-6 form-group-feedback form-group-feedback-right">
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-linkedin"></i></span>
                        </span>
                        {!! Form::text('linkin_link', $value = null, ['id'=>'linkin_link','class'=>'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('linkin_link') }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-sm-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-6">PF Facility:</label>
                <div class="col-lg-6 form-group-feedback form-group-feedback-right">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            {!! Form::radio('pf', '1', false,['class'=>'form-check-input-styled','data-fouc']) !!}
                            Yes
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            {!! Form::radio('pf', '0', true,['class'=>'form-check-input-styled','data-fouc']) !!}
                            No
                        </label>
                    </div>
                    <span class="text-danger">{{ $errors->first('pf') }}</span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-lg-6">Gratuity Facility:</label>
                <div class="col-lg-6 form-group-feedback form-group-feedback-right">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            {!! Form::radio('gratuity', '1', false,['class'=>'form-check-input-styled','data-fouc']) !!}
                            Yes
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            {!! Form::radio('gratuity', '0', true,['class'=>'form-check-input-styled','data-fouc']) !!}
                            No
                        </label>
                    </div>
                    <span class="text-danger">{{ $errors->first('gratuity') }}</span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label col-lg-6">SSF Facility:</label>
                <div class="col-lg-6 form-group-feedback form-group-feedback-right">
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            {!! Form::radio('ssf', '1', false,['class'=>'form-check-input-styled ssf','data-fouc']) !!}
                            Yes
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            {!! Form::radio('ssf', '0', true,['class'=>'form-check-input-styled ssf','data-fouc']) !!}
                            No
                        </label>
                    </div>
                    <span class="text-danger">{{ $errors->first('ssf') }}</span>
                </div>
            </div>
            @php
                if($is_edit)
                {
                    if ($setting->ssf == 1)
                    {
                        $display="show";
                    }else{
                        $display="none";
                    }
                }else
                {
                    $display="none";
                }
            @endphp
            <div class="form-group row SSF_div" style="display: {{$display}};">
                <label class="col-form-label col-lg-6">SSF Taxable / Tax Exempted :</label>
                <div class="col-lg-6 form-group-feedback form-group-feedback-right text-right">
                    <div class="input-group">
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                {!! Form::radio('ssf_tax', '1', false,['class'=>'form-check-input-styled','data-fouc']) !!}
                                Yes
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                {!! Form::radio('ssf_tax', '0', true,['class'=>'form-check-input-styled','data-fouc']) !!}
                                No
                            </label>
                        </div>
                        <span class="text-danger">{{ $errors->first('ssf_tax') }}</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="form-group row">
        <label class="col-form-label col-lg-3"> Basic Salary Percentage:</label>
        <div class="col-lg-3 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-percent"></i></span>
                </span>
                {!! Form::text('basic_salary_percentage',$value = null, ['id'=>'basic_salary_percentage','placeholder'=>'Basic Salary Percentage','class'=>'form-control numeric']) !!}
                <span class="text-danger">{{ $errors->first('basic_salary_percentage') }}</span>
            </div>
        </div>

        <label class="col-form-label col-lg-3"> Currency:</label>
        <div class="col-lg-3 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                {!! Form::text('currency',$value = 'Rs.', ['id'=>'currency','placeholder'=>'Enter currency','class'=>'form-control']) !!}
                <span class="text-danger">{{ $errors->first('basic_salary_percentage') }}</span>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-lg-3"> Bank Name:</label>
        <div class="col-lg-3 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                {!! Form::text('bank_name',$value = null, ['id'=>'bank_name','placeholder'=>'Enter Bank Name','class'=>'form-control']) !!}
                <span class="text-danger">{{ $errors->first('bank_name') }}</span>
            </div>
        </div>
        <label class="col-form-label col-lg-3"> Bank Account No:</label>
        <div class="col-lg-3 form-group-feedback form-group-feedback-right">
            <div class="input-group">                           
                {!! Form::text('bank_account',$value = null, ['id'=>'bank_account','placeholder'=>'Enter Bank Account','class'=>'form-control']) !!}
                <span class="text-danger">{{ $errors->first('bank_account') }}</span>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-lg-3"> Normal Holiday Overtime Rate:</label>
        <div class="col-lg-3 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                {!! Form::text('normal_holiday_ot_rate',$value = 1.5, ['id'=>'normal_holiday_ot_rate','placeholder'=>'Enter Normal Holiday OT Rate','class'=>'form-control numeric']) !!}
                <span class="input-group-prepend">
                    <span class="input-group-text">Per Day</span>
                </span>
                <span class="text-danger">{{ $errors->first('normal_holiday_ot_rate') }}</span>
            </div>
        </div>     
        <label class="col-form-label col-lg-3"> Special Holiday Overtime Rate:</label>
        <div class="col-lg-3 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                {!! Form::text('special_holiday_ot_rate',$value = 2.0, ['id'=>'special_holiday_ot_rate','placeholder'=>'Enter Special Holiday OT Rate','class'=>'form-control numeric']) !!}
                <span class="input-group-prepend">
                    <span class="input-group-text">Per Day</span>
                </span>
                <span class="text-danger">{{ $errors->first('special_holiday_ot_rate') }}</span>
            </div>
        </div>
    </div>
    
<!--     <div class="form-group row">
        <label class="col-form-label col-lg-3"> General Overtime Rate:</label>
        <div class="col-lg-3 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                {!! Form::text('general_ot_rate',$value = 1.25, ['id'=>'general_ot_rate','placeholder'=>'Enter General OT Rate','class'=>'form-control numeric']) !!}
                <span class="input-group-prepend">
                    <span class="input-group-text">Per Hour</span>
                </span>
                <span class="text-danger">{{ $errors->first('general_ot_rate') }}</span>
            </div>
        </div>  
    </div> -->

    
</fieldset>
<div class="text-right">
    <button type="submit" class="btn bg-teal-400">{{ $btnType }} <i class="icon-database-insert"></i></button>
</div>

<script type="text/javascript">
    $('document').ready(function () {
        $('.ssf').on('change', function () {
            var value = $(this).val();
            if (value == 1) {
                console.log('leave');
                $('.SSF_div').show();
            } else {
                $('.SSF_div').hide();
            }
        });
    });

</script>







