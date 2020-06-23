<div class="appendStructure">
<div class="form-group row">

     <div class="col-lg-6">
            <div class="row">
                <label class="col-form-label col-lg-3">Structure Title:</label>
                <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-list3"></i>
                            </span>
                        </span>
                        {!! Form::text('structure_title[]', $value = null, ['id'=>'structure_title','placeholder'=>'Enter Structure','class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>


    <div class="col-lg-2">
       <div class="row">
             <button type="button" class="ml-2 remove_structure btn bg-danger-800 btn-labeled btn-labeled-left"><b><i class="icon-pen-plus"></i></b> Remove</button>
        </div>
    </div>
</div>
</div>


<script type="text/javascript">
    $(document).ready(function(){ 

        $('.remove_structure').on('click',function(){ 
            $(this).parent().parent().parent().remove();
        });
        
    });
</script>