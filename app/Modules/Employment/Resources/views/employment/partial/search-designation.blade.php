<div class="form-group row">
    <div class="col-lg-9">
         {!! Form::select('designation_id',$designation, $value = null, ['id'=>'designation_id','placeholder'=>'Select Designation','class'=>'form-control']) !!}
    </div>
    <div class="col-lg-3">
        <button type="submit" class="btn bg-teal-400"><i class="icon-search4"></i></button>
    </div>
</div>
