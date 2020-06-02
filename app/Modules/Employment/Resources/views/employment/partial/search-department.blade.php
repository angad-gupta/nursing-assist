<div class="form-group row">
    <div class="col-lg-9">
         {!! Form::select('department_id',$department, $value = null, ['id'=>'department_id','placeholder'=>'Select Department','class'=>'form-control']) !!}
    </div>
    <div class="col-lg-3">
        <button type="submit" class="btn bg-teal-400"><i class="icon-search4"></i></button>
    </div>
</div>
