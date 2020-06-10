 <div class="appendDelivery">
    <div class="form-group row">

        <div class="col-lg-6">
            <div class="row">
                <label class="col-form-label col-lg-3">Mode Of Delivery Step:</label>
                <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-list3"></i>
                            </span>
                        </span>
                        {!! Form::text('delivery_title[]', $value = null, ['id'=>'delivery_title','placeholder'=>'Enter Title','class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-2">
           <div class="row">
                <button type="button" class="ml-2 remove_delivery btn bg-danger-800 btn-labeled btn-labeled-left"><b><i class="icon-pen-plus"></i></b> Remove</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){ 

        $('.remove_delivery').on('click',function(){ 
            $(this).parent().parent().parent().remove();
        });
        
    });
</script>



