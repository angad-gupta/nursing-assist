
<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>


        <div class="row">

        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-3">Announcement Title:<span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                       <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-pencil"></i></span>
                        </span>
                         {!! Form::text('title', $value = null, ['id'=>'title','placeholder'=>'Enter Announcement Title','class'=>'form-control']) !!}
                        </div>
                    </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label col-lg-3">Intake Date:</label>
                    <div class="col-lg-9">
                       <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-pencil"></i></span>
                        </span>
                         {!! Form::select('intake_date',$month, $value = null, ['id'=>'intake_date','class'=>'intake_date form-control']) !!}
                        </div>
                    </div>
            </div>
        </div>

    </div>

    <div class="form-group row">
        <label class="col-form-label col-lg-2">Content: </label>
        <div class="col-lg-10 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                {!! Form::textarea('content', $value = null, ['placeholder'=>'Enter Content','class'=>'form-control textarea_description']) !!}
            </div>
        </div>
    </div>

</fieldset>

<div class="text-right">
    <button type="submit" class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i class="icon-database-insert"></i></b> {{ $btnType }}</button>
</div>
