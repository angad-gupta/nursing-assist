<fieldset class="mb-1">
    <legend class="text-uppercase font-size-sm font-weight-bold">Basic Company Information</legend>
    <div class="form-group row">
        <label class="col-form-label col-lg-3">Company Name:<span
                    class="text-danger">*</span></label>
        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-pencil5"></i></span>
                </span>
                @if($is_edit)
                    {!! Form::text('company_name',$setting->company_name, ['id'=>'company_name','placeholder'=>'Company Name','class'=>'form-control']) !!}
                @else
                    {!! Form::text('company_name',$value = null, ['id'=>'company_name','placeholder'=>'Company Name','class'=>'form-control']) !!}
                @endif
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
                @if($is_edit)
                {!! Form::text('website',$setting->website, ['id'=>'website','placeholder'=>'Enter Company Website','class'=>'form-control']) !!}
                @else
                    {!! Form::text('website',$value = null, ['id'=>'website','placeholder'=>'Enter Company Website','class'=>'form-control']) !!}
                @endif
                <span class="text-danger">{{ $errors->first('website') }}</span>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-lg-3">Company Logo:<span
                    class="text-danger">*</span></label>
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
                <img id="bannerImage" src="{{ asset('admin/default.png') }}" alt="your image"
                     class="preview-image"
                     style="height: 100px; width: auto;"/>
            @endif
        </div>
    </div>
    @if($is_edit)
    <div class="form-group row">
        <label class="col-form-label col-lg-3">Company Address:</label>
        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-location4"></i></span>
                </span>
                @if($is_edit)
                    {!! Form::text('permanent_address',$setting->permanent_address, ['id'=>'permanent_address','placeholder'=>'Enter Province number','class'=>'form-control']) !!}
                @else
                    {!! Form::text('permanent_address',$value = null, ['id'=>'permanent_address','placeholder'=>'Enter Province number','class'=>'form-control']) !!}
                @endif
                    <span class="text-danger">{{ $errors->first('permanent_address') }}</span>
            </div>
        </div>
    </div>
    @endif
    <div class="form-group row">
        <label class="col-form-label col-lg-3">Province No:<span
                    class="text-danger">*</span></label>
        <div class="col-lg-3 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-location4"></i></span>
                </span>
                @if($is_edit)
                    {!! Form::text('province_no',$setting->province_no, ['id'=>'province_no','placeholder'=>'Enter Province number','class'=>'form-control']) !!}
                @else
                    {!! Form::text('province_no',$value = null, ['id'=>'province_no','placeholder'=>'Enter Province number','class'=>'form-control']) !!}
                @endif
                    <span class="text-danger">{{ $errors->first('province_no') }}</span>
            </div>
        </div>
        <label class="col-form-label col-lg-3">District :</label>
        <div class="col-lg-3 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-location4"></i></span>
                </span>
                @if($is_edit)
                    {!! Form::text('district',$setting->district, ['id'=>'district','placeholder'=>'Enter District','class'=>'form-control']) !!}
                @else
                    {!! Form::text('district',$value = null, ['id'=>'district','placeholder'=>'Enter District','class'=>'form-control']) !!}
                @endif
                    <span class="text-danger">{{ $errors->first('district') }}</span>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-lg-3">Suburb:<span
                class="text-danger">*</span></label>
        <div class="col-lg-3 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-location4"></i></span>
                </span>
                @if($is_edit)
                {!! Form::text('suburb',$setting->suburb, ['id'=>'suburb','placeholder'=>'Enter suburb','class'=>'form-control']) !!}
                @else
                    {!! Form::text('suburb',$value = null, ['id'=>'suburb','placeholder'=>'Enter suburb','class'=>'form-control']) !!}
               @endif
                <span class="text-danger">{{ $errors->first('suburb') }}</span>
            </div>
        </div>
        <label class="col-form-label col-lg-3">Ward No :</label>
        <div class="col-lg-3 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-location4"></i></span>
                </span>
                @if($is_edit)
                {!! Form::text('ward_no',$setting->ward_no, ['id'=>'ward_no','placeholder'=>'Enter ward number','class'=>'form-control numeric']) !!}
               @else
                {!! Form::text('ward_no',$value = null, ['id'=>'ward_no','placeholder'=>'Enter ward number','class'=>'form-control numeric']) !!}
                    @endif
                <span class="text-danger">{{ $errors->first('district') }}</span>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-lg-3">Contact No 1:<span
                    class="text-danger">*</span></label>
        <div class="col-lg-3 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-phone"></i></span>
                </span>
                @if($is_edit)
                {!! Form::text('contact_no1',$setting->contact_no1, ['id'=>'contact_no1','placeholder'=>'Enter contact number','class'=>'form-control numeric']) !!}
               @else
                {!! Form::text('contact_no1',$value = null, ['id'=>'contact_no1','placeholder'=>'Enter contact number','class'=>'form-control numeric']) !!}
                @endif
                    <span class="text-danger">{{ $errors->first('contact_no1') }}</span>
            </div>
        </div>
        <label class="col-form-label col-lg-3">Contact No 2</label>
        <div class="col-lg-3 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-phone"></i></span>
                </span>
                @if($is_edit)
                {!! Form::text('contact_no2',$setting->contact_no2, ['id'=>'contact_no2','placeholder'=>'Enter contact number 2','class'=>'form-control numeric']) !!}
               @else
                {!! Form::text('contact_no2',$value = null, ['id'=>'contact_no2','placeholder'=>'Enter contact number 2','class'=>'form-control numeric']) !!}
               @endif
                <span class="text-danger">{{ $errors->first('contact_no2') }}</span>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-lg-3">Phone No 1:<span
                class="text-danger">*</span></label>
        <div class="col-lg-3 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-iphone"></i></span>
                </span>
                @if($is_edit)
                {!! Form::text('phone1',$setting->phone1, ['id'=>'phone1','placeholder'=>'Enter phone1','class'=>'form-control numeric']) !!}
                @else
                {!! Form::text('phone1',$value = null, ['id'=>'phone1','placeholder'=>'Enter phone1','class'=>'form-control numeric']) !!}
                @endif
                <span class="text-danger">{{ $errors->first('phone1') }}</span>
            </div>
        </div>
        <label class="col-form-label col-lg-3">Phone No 2</label>
        <div class="col-lg-3 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-iphone"></i></span>
                </span>
                @if($is_edit)
                {!! Form::text('phone2',$setting->phone2, ['id'=>'phone2','placeholder'=>'Enter phone2','class'=>'form-control numeric']) !!}
                @else
                    {!! Form::text('phone2',$value = null, ['id'=>'phone2','placeholder'=>'Enter phone2','class'=>'form-control numeric']) !!}
               @endif
                <span class="text-danger">{{ $errors->first('phone2') }}</span>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-lg-3">Company Email Address:<span
                    class="text-danger">*</span></label>
        <div class="col-lg-3 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-mention"></i></span>
                </span>
                @if($is_edit)
                {!! Form::email('email',$setting->email, ['id'=>'email','placeholder'=>'Enter Email','class'=>'form-control']) !!}
                @else
                    {!! Form::email('email',$value = null, ['id'=>'email','placeholder'=>'Enter Email','class'=>'form-control']) !!}
                @endif
                <span class="text-danger">{{ $errors->first('email') }}</span>
            </div>
        </div>
{{--        <label class="col-form-label col-lg-3">Software Type:<span--}}
{{--                class="text-danger">*</span></label>--}}
{{--        <div class="col-lg-3 form-group-feedback form-group-feedback-right">--}}
{{--            <div class="input-group">--}}
{{--                <span class="input-group-prepend">--}}
{{--                    <span class="input-group-text"><i class="icon-windows"></i></span>--}}
{{--                </span>--}}
{{--                @if($is_edit)--}}
{{--                {!! Form::select('software_type',[ 'Hr'=>'HR','sales'=>'Sales','construction'=>'Construction'], ['id'=>'software_type','class'=>'form-control']) !!}--}}
{{--                @else--}}
{{--                    {!! Form::select('software_type',[ 'Hr'=>'HR','sales'=>'Sales','construction'=>'Construction'], null, ['id'=>'software_type','class'=>'form-control']) !!}--}}
{{--                @endif--}}
{{--                <span class="text-danger">{{ $errors->first('software_type') }}</span>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
    @include('setting::setting.partial.configuration')

    <div class="form-group row ">
        <label class="col-form-label col-lg-3">Instagram URL:</label>
        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-instagram"></i></span>
                        </span>
                @if($is_edit)
                {!! Form::text('instagram_link', $setting->instagram_link, ['id'=>'instagram_link','class'=>'form-control']) !!}
                @else
                    {!! Form::text('instagram_link', $value = null, ['id'=>'instagram_link','class'=>'form-control']) !!}
                @endif
                <span class="text-danger">{{ $errors->first('instagram_link') }}</span>
            </div>
        </div>
    </div>
    <div class="form-group row ">
        <label class="col-form-label col-lg-3">Facebook URL:</label>
        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-facebook2"></i></span>
                        </span>
                @if($is_edit)
                {!! Form::text('facebook_link', $setting->facebook_link, ['id'=>'facebook_link','class'=>'form-control']) !!}
                @else
                    {!! Form::text('facebook_link', $value = null, ['id'=>'facebook_link','class'=>'form-control']) !!}
                @endif
                <span class="text-danger">{{ $errors->first('facebook_link') }}</span>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-lg-3">LinkedIn URL:</label>
        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-linkedin"></i></span>
                        </span>
                @if($is_edit)
                {!! Form::text('linkin_link', $setting->linkin_link, ['id'=>'linkin_link','class'=>'form-control']) !!}
                @else
                    {!! Form::text('linkin_link', $value = null, ['id'=>'linkin_link','class'=>'form-control']) !!}
                @endif
                <span class="text-danger">{{ $errors->first('linkin_link') }}</span>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-lg-3">Twitter URL:</label>
        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-twitter"></i></span>
                        </span>
                @if($is_edit)
                {!! Form::text('twitter_link', $setting->twitter_link, ['id'=>'twitter_link','class'=>'form-control']) !!}
                @else
                    {!! Form::text('twitter_link', $value = null, ['id'=>'twitter_link','class'=>'form-control']) !!}
                @endif
                <span class="text-danger">{{ $errors->first('twitter_link') }}</span>
            </div>
        </div>
    </div>
</fieldset>
<script type="text/javascript">
    $('document').ready(function () {
        $('#software_type').on('change', function () {
            var value = $(this).val();
            console.log(value);
            if (value == 'HR') {
                $('.hrconfig').show();
            } else if (value=='sales'){
                $('.salesconfig').show();
            }else{
                $('.constructionconfig').show();
            }

        });
    });

</script>
