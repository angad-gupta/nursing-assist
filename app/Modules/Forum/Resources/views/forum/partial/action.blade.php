
<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>


            <div class="form-group row">
                <div class="col-lg-12">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Forum Title:<span class="text-danger">*</span></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-hat"></i>
                                    </span>
                                </span>
                                {!! Form::text('forum_title', $value = null, ['id'=>'forum_title','placeholder'=>'Enter Forum Title','class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-12">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Description:<span class="text-danger">*</span></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                {!! Form::textarea('forum_description', null, ['id' => 'forum_description','placeholder'=>'Enter Forum Content', 'class' =>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">

                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Is Top Topic ?:</label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-pencil"></i>
                                    </span>
                                </span>
                               {!! Form::select('is_top_topic',[ '1'=>'Yes','0'=>'No'], $value = null, ['id'=>'is_top_topic','class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>


                 <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Is Featured Topic ?:</label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-pencil"></i>
                                    </span>
                                </span>
                               {!! Form::select('is_featured_topic',[ '1'=>'Yes','0'=>'No'], $value = null, ['id'=>'is_featured_topic','class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>


</fieldset>


<div class="text-right">
    <button type="submit" class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i class="icon-database-insert"></i></b> {{ $btnType }}</button>
</div>

