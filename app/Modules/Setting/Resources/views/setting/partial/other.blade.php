<fieldset class="mb-1">
    <legend class="text-uppercase font-size-sm font-weight-bold">Other Setting</legend>
    <div class="form-group row">
        <label class="col-form-label col-lg-2"> Normal Holiday Overtime Rate:</label>
        <div class="col-lg-4 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                {!! Form::text('normal_holiday_ot_rate',$value = 1.5, ['id'=>'normal_holiday_ot_rate','placeholder'=>'Enter Normal Holiday OT Rate','class'=>'form-control numeric']) !!}
                <span class="input-group-prepend"><span class="input-group-text">Per Day</span></span>
                <span class="text-danger">{{ $errors->first('normal_holiday_ot_rate') }}</span>
            </div>
        </div>
        <label class="col-form-label col-lg-2"> Special Holiday Overtime Rate:</label>
        <div class="col-lg-4 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                {!! Form::text('special_holiday_ot_rate',$value = 2.0, ['id'=>'special_holiday_ot_rate','placeholder'=>'Enter Special Holiday OT Rate','class'=>'form-control numeric']) !!}
                <span class="input-group-prepend"><span class="input-group-text">Per Day</span></span>
                <span class="text-danger">{{ $errors->first('special_holiday_ot_rate') }}</span>
            </div>
        </div>
    </div>
</fieldset>