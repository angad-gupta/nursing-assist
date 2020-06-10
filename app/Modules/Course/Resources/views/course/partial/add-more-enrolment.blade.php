<div class="appendenrolment">
                <div class="form-group row">

                    <div class="col-lg-3">
                        <div class="row">
                            <label class="col-form-label col-lg-3">Enrolment Title:</label>
                            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-list3"></i>
                                        </span>
                                    </span>
                                    {!! Form::text('enrol_title[]', $value = null, ['id'=>'enrol_title','placeholder'=>'Enter Enrolment Title','class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                            <div class="col-lg-3">
                            <div class="row">
                                <label class="col-form-label col-lg-3">Course Fee:</label>
                                <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-list3"></i>
                                            </span>
                                        </span>
                                        {!! Form::text('course_fee[]', $value = null, ['id'=>'course_fee','placeholder'=>'Enter Course Fee','class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="row">
                                <label class="col-form-label col-lg-3">Payment Mode:</label>
                                <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-list3"></i>
                                            </span>
                                        </span>
                                        {!! Form::text('payment_mode[]', $value = null, ['id'=>'payment_mode','placeholder'=>'Enter Payment Mode','class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>


                    <div class="col-lg-2">
                       <div class="row">
                             <button type="button" class="ml-2 remove_enrolment btn bg-danger-800 btn-labeled btn-labeled-left"><b><i class="icon-pen-plus"></i></b> Remove</button>
                        </div>
                    </div>
                </div>
            </div>

<script type="text/javascript">
    $(document).ready(function(){ 

        $('.remove_enrolment').on('click',function(){ 
            $(this).parent().parent().parent().remove();
        });
        
    });
</script>



