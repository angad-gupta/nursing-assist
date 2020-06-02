<div class="form-group row">

        <div class="col-lg-12">
            <div class="row">
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
                    <span class="form-text text-muted">Citizenship Pic:</span>
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-image2"></i></span>
                            </span>
                        {!! Form::file('citizen_pic', ['id'=>'citizen_pic','class'=>'form-control']) !!}
                    </div>
                </div>

            <div class="col-md-4">
                <span class="form-text text-muted">CV Uploads:</span>
                <div class="input-group">
                    <div class="input-group">
                            <span class="input-group-prepend">
                                <span class="input-group-text"><i class="icon-profile"></i></span>
                            </span>
                        {!! Form::file('document_pic', ['id'=>'document_pic','class'=>'form-control']) !!}
                    </div>
                </div>
            </div>

            </div>

            <div class="row">
                 <div class="col-lg-4 form-group-feedback form-group-feedback-right">
                    @if($is_edit AND $employment->profile_pic !== NULL)
                        <img id="bannerImage" src="{{asset($employment->file_full_path)}}/{{ $employment->profile_pic}}"
                             alt="your image" class="preview-image" style="height: 100px;width: auto;"/>
                    @else
                        <img id="bannerImage" src="{{ asset('admin/default.png') }}" alt="your image" class="preview-image"
                             style="height: 100px; width: auto;"/>
                    @endif
                </div>

                <div class="col-lg-4 form-group-feedback form-group-feedback-right">
                    @if($is_edit AND $employment->citizen_pic !== NULL)
                        <img id="bannerImage" src="{{asset($employment->file_full_path)}}/citizen/{{ $employment->citizen_pic}}"
                             alt="your image" class="preview-image" style="height: 100px;width: auto;"/>
                    @else
                        <img id="bannerImage" src="{{ asset('admin/default.png') }}" alt="your image" class="preview-image"
                             style="height: 100px; width: auto;"/>
                    @endif
                </div>


             <div class="col-lg-4 form-group-feedback form-group-feedback-right">
                @if($is_edit AND $employment->document_pic !== NULL)
                    <img id="bannerImage" src="{{asset($employment->file_full_path)}}/document/{{ $employment->document_pic}}"
                         alt="your image" class="preview-image" style="height: 100px;width: auto;"/>
                @else
                    <img id="bannerImage" src="{{ asset('admin/default.png') }}" alt="your image" class="preview-image"
                         style="height: 100px; width: auto;"/>
                @endif
            </div>

            </div>

        </div>
    </div>
