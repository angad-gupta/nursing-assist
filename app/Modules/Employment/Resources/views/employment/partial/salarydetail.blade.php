<div class="form-group row">

        <div class="col-lg-12">
            <div class="row">
                    <div class="col-md-4">
                        <span class="form-text text-muted">Basic Salary : <span class="text-danger">*</span></span>
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text">Rs.</span>
                            </span>
                            {!! Form::text('salary', $value = null, ['id'=>'salary','placeholder'=>'Enter Basic Salary','class'=>'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <span class="form-text text-muted">Daily Allowance :</span>
                        <div class="input-group">
                           <span class="input-group-prepend">
                                <span class="input-group-text">Rs.</span>
                            </span>
                            </span>
                            {!! Form::text('daily_allowance', $value = null, ['id'=>'daily_allowance','placeholder'=>'Enter Daily Allowance','class'=>'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <span class="form-text text-muted">Other :</span>
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text">Rs.</span>
                            </span>
                            </span>
                            {!! Form::text('other_allowance', $value = null, ['id'=>'other_allowance','placeholder'=>'Enter Other Allowance','class'=>'form-control']) !!}
                        </div>
                    </div>


                <div class="col-md-4">
                    <span class="form-text text-muted">Profile Pic:</span>
                    <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-image2"></i></span>
                            </span>
                        {!! Form::file('profile_pic', ['id'=>'profile_pic','class'=>'form-control']) !!}
                    </div>
               </div>

               <div class="col-md-4">
                        <span class="form-text text-muted">PAN NO :</span>
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-pencil"></i>
                                </span>
                            </span>
                            {!! Form::text('pan_no', $value = null, ['id'=>'pan_no','placeholder'=>'PAN NO','class'=>'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <span class="form-text text-muted">SSF NO :</span>
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-pencil"></i>
                                </span>
                            </span>
                            {!! Form::text('ss_no', $value = null, ['id'=>'ss_no','placeholder'=>'SSF NO','class'=>'form-control']) !!}
                        </div>
                    </div>
            </div>

        </div>
    </div>
