
<script src="{{asset('admin/global/js/plugins/ui/fab.min.js')}}"></script>

<script src="{{asset('admin/global/js/plugins/ui/sticky.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/ui/prism.min.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/extra_fab.js')}}"></script>

<!-- Top right menu -->
<ul class="fab-menu fab-menu-absolute fab-menu-top-right" data-fab-toggle="hover" id="fab-menu-affixed-demo-right">
    <li>
        <button type="submit" class="fab-menu-btn btn bg-success-300 btn-float rounded-round btn-icon"><i class="icon-paperplane" data-popup="tooltip" data-placement="bottom" data-original-title="{{ $btnType }}"></i></button>
    </li>
</ul>
<!-- /top right menu -->

<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>

        <div class="form-group row">
            <div class="col-lg-12">
                <div class="row">
                    <label class="col-form-label col-lg-2">Subject:<span class="text-danger">*</span></label>
                    <div class="col-lg-10 form-group-feedback form-group-feedback-right">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-hat"></i>
                                </span>
                            </span>
                            {!! Form::text('subject', $value = null, ['id'=>'subject','placeholder'=>'Enter Subject','class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">

                        <div class="col-lg-12">
                            <h5>Message Template</h5>
                            <div class="input-group">
                           
                             {!! Form::textarea('message', null, ['id' => 'message','placeholder'=>'Enter Message', 'class' =>'form-control textarea_description']) !!}

                            </div>
                        </div>

                </div>
            </div>
        </div>

            <div class="form-group row">

                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Upload PDF:</label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-images3"></i></span>
                                </span>
                                {!! Form::file('attached_pdf', ['id'=>'attached_pdf','class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="col-lg-6">
                    <div class="row">
                         <label class="col-form-label col-lg-3"></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <img id="attached_pdf" src="{{ asset('admin/pdf.jpg') }}" alt="your image" class="preview-image" style="height: 100px; width: auto;" />
                        </div>

                    </div>
                </div>

            </div>


</fieldset>


   <fieldset>
            <div class="row">
                <div class="col-md-12">
                    <h5>Select Select To Send Mail</h5>
                    <div class="card card-body">

                        <div class="panel-footer">
                            <a href="javascript:void(0)" onclick="selectAllCheckBoxes('newsletter_form', 'student_id[]', true);" class="btn bg-success-400"><i class="icon-checkmark-circle2"></i> Select All</a>

                            <a href="javascript:void(0)" onclick="selectAllCheckBoxes('newsletter_form', 'student_id[]', false);" class="btn bg-danger-400"><i class="icon-eraser2"></i> Clear All </a>

                        </div>
                        <hr>

                        <div class="table-responsive">

                            <table class='table table-striped mb30' id='table1' cellspacing='0' width='100%'>
                                <tbody>
                                    <tr style="font-size:small;">

                                        <?php
                                        $counter=0;
                                        if (!empty($student)) { 
                                            foreach ($student as $key): 
                                                ++$counter;
                                    
                                                ?>

                                                <td width="1%"><input name="student_id[]" type="checkbox" id="student_id[]" value="{{ $key->id }}" /></td>
                                                <td>{{ $key->full_name .'::'. $key->email }}</td>
                                                
                                                <?php  if($counter%4==0)echo '</tr><tr style="font-size:small;">'; ?>
                                                
                                                <?php
                                            endforeach;
                                        } else {
                                            ?>
                                        </tr>
                                        <tr>
                                            <td colspan="8">
                                                <center>No Student Found !!!</center>
                                            </td>
                                        </tr>
                                    <?php } ?>


                                </tbody>
                            </table>

                        </div>
                        <!-- table-responsive -->
                    </div>
                    <!-- col-md-6 -->
                </div>
                
            </div>

        </fieldset>


<div class="text-right">
    <button type="submit" class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i class="icon-paperplane"></i></b> {{ $btnType }}</button>
</div>


<script type="text/javascript">
    
function selectAllCheckBoxes(FormName, FieldName, CheckValue) {
    if (!document.forms[FormName])
        return;
    var objCheckBoxes = document.forms[FormName].elements[FieldName];
    if (!objCheckBoxes)
        return;
    var countCheckBoxes = objCheckBoxes.length;
    if (!countCheckBoxes)
        objCheckBoxes.checked = CheckValue;
    else
// set the check value for all check boxes
for (var i = 0; i < countCheckBoxes; i++)
    objCheckBoxes[i].checked = CheckValue;
}



</script>