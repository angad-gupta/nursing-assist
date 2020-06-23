<div class="appendCourseIntake">
    <div class="form-group row">

        <div class="col-lg-4">
            <div class="row">
                <label class="col-form-label col-lg-3">Month:</label>
                <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-list3"></i>
                            </span>
                        </span>
                    {!! Form::select('month_id[]',$month, $value = null, ['id'=>'month_id','class'=>'month_id form-control','placeholder'=>'Select Course']) !!}

                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="row">
                <label class="col-form-label col-lg-3">Intake Date Range:</label>
                <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-list3"></i>
                            </span>
                        </span>
                        {!! Form::text('intake_date[]', $value = null, ['id'=>'intake_date','placeholder'=>'Enter Intake Date Range','class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-2">
           <div class="row">
                   <button type="button" class="ml-2 remove_intake btn bg-danger-800 btn-labeled btn-labeled-left"><b><i class="icon-pen-plus"></i></b> Remove</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){ 

        $('.remove_intake').on('click',function(){ 
            $(this).parent().parent().parent().remove();
        });
        
    });
</script>



