<div class="form-group row " id="hrconfig" style="display: none;">
    <label class="col-form-label col-lg-3">HR Configuration:</label>
    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
        <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-instagram"></i></span>
                        </span>
{{--            @if($is_edit)--}}
{{--                {!! Form::text('instagram_link', $setting->instagram_link, ['id'=>'instagram_link','class'=>'form-control']) !!}--}}
{{--            @else--}}
{{--                {!! Form::text('instagram_link', $value = null, ['id'=>'instagram_link','class'=>'form-control']) !!}--}}
{{--            @endif--}}
            <span class="text-danger">{{ $errors->first('instagram_link') }}</span>
        </div>
    </div>
</div>
<div class="form-group row " id="salesconfig" style="display: none;">
    <label class="col-form-label col-lg-3">Sales Configuration:</label>
    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
        <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-shopping-cart"></i></span>
                        </span>
{{--            @if($is_edit)--}}
{{--                {!! Form::text('salestitle', $setting->instagram_link, ['id'=>'instagram_link','class'=>'form-control']) !!}--}}
{{--            @else--}}
{{--                {!! Form::text('salestitle', $value = null, ['id'=>'instagram_link','class'=>'form-control']) !!}--}}
{{--            @endif--}}
            <span class="text-danger">{{ $errors->first('instagram_link') }}</span>
        </div>
    </div>
</div>
<div class="form-group row " id="constructionconfig" style="display: none;">
    <label class="col-form-label col-lg-3">Construction Configuration:</label>
    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
        <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-setting"></i></span>
{{--                        </span>--}}
{{--            @if($is_edit)--}}
{{--                {!! Form::text('salestitle', $setting->instagram_link, ['id'=>'instagram_link','class'=>'form-control']) !!}--}}
{{--            @else--}}
{{--                {!! Form::text('salestitle', $value = null, ['id'=>'instagram_link','class'=>'form-control']) !!}--}}
{{--            @endif--}}
            <span class="text-danger">{{ $errors->first('instagram_link') }}</span>
        </div>
    </div>
</div>
