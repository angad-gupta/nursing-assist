<script src="{{ asset('admin/global/js/plugins/pickers/daterangepicker.js')}}"></script>
<script src="{{ asset('admin/global/js/demo_pages/picker_date.js')}}"></script>
<script type="text/javascript" src="{{ asset('admin/validation/_reminder.js') }}"></script>
<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-4">Title:<span class="text-danger">*</span></label>
                <div class="col-lg-8 form-group-feedback form-group-feedback-right">
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-pencil5"></i></span>
                        </span>
                        {!! Form::text('title', null, ['placeholder'=>'Enter Reminder Title','class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-4">Reminder Type:<span class="text-danger">*</span></label>
                <div class="col-lg-8 form-group-feedback form-group-feedback-right">
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-reminder"></i></span>
                        </span>
                        {!! Form::select('reminder_type', $reminderTypes, null, ['placeholder'=>'--Select Reminder Type--','class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-lg-2">Notes:</label>
        <div class="col-lg-10 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-notebook"></i></span>
                </span>
                {!! Form::textarea('note', null, ['class'=>'form-control', 'rows' => 10]) !!}
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-lg-2">Additional Notes:</label>
        <div class="col-lg-10 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-notebook"></i></span>
                </span>
                {!! Form::textarea('additional_notes', null, ['class'=>'form-control', 'rows' => 10]) !!}
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-4">Remind  Date:<span class="text-danger">*</span></label>
                <div class="col-lg-8 form-group-feedback form-group-feedback-right">
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-calendar"></i></span>
                        </span>
                        {!! Form::text('remind_date', null, ['class'=>'form-control daterange-single']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-4">Repeat Type:<span class="text-danger">*</span></label>
                <div class="col-lg-8 form-group-feedback form-group-feedback-right">
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-menu-open"></i></span>
                        </span>
                        {!! Form::select('repeat_type',$repeatTypes, null, ['class'=>'form-control', 'placeholder' => '--Select Remind Repeat Type--']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-4">Select Reminder Range</label>
                <div class="col-lg-8 form-group-feedback form-group-feedback-right">
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-menu-open"></i></span>
                        </span>
                        {!! Form::select('is_remind_range',['0' => 'No','1' => 'Yes'], null, ['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="remind-from-to">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-4">Remind  Me From:<span class="text-danger">*</span></label>
                <div class="col-lg-8 form-group-feedback form-group-feedback-right">
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-drag-left"></i></span>
                        </span>
                        {!! Form::text('remind_from', null, ['class'=>'form-control daterange-single']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-4">Remind  Me To:</label>
                <div class="col-lg-8 form-group-feedback form-group-feedback-right">
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-drag-right"></i></span>
                        </span>
                        {!! Form::text('remind_to', null, ['class'=>'form-control daterange-single']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6" id="remind-me-before">
            <div class="form-group row">
                <label class="col-form-label col-lg-4">Remind  Me Before:<span class="text-danger">*</span></label>
                <div class="col-lg-8 form-group-feedback form-group-feedback-right">
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-calendar"></i></span>
                        </span>
                        {!! Form::number('remind_before', null, ['placeholder' => 'Remind Before Days', 'class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-4">Priority:</label>
                <div class="col-lg-8 form-group-feedback form-group-feedback-right">
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-select2"></i></span>
                        </span>
                        {!! Form::select('priority', $priorities, null, ['class'=>'form-control', '--Select Priority--']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</fieldset>
<div class="text-right">
    <button type="submit" class="btn bg-teal-400">{{ $btnType }} <i class="icon-database-insert"></i></button>
</div>

<script type="text/javascript">
    $(document).ready( function () {
        var value = $('select[name=is_remind_range]').val();
        toggle_remind_range(value);
        $('select[name=is_remind_range]').change(function () {
            var value = $(this).val();
            toggle_remind_range(value);
        });
    });

    function toggle_remind_range(value)
    {
        if (value == '1') {
            $('#remind-from-to').show();
            $('#remind-me-before').hide();

        } else {
           $('#remind-from-to').hide();
            $('#remind-me-before').show();
        }
   }
</script>
