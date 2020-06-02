@extends('admin::layout')
@section('title')Setting @stop
@section('breadcrum')Create Setting @stop

@section('script')
    <!-- Theme JS files -->
    <script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script src="{{asset('admin/global/js/demo_pages/form_inputs.js')}}"></script>
    <!-- /theme JS files -->
    <script src="{{ asset('admin/validation/setting.js')}}"></script>
    <script src="{{asset('admin/global/js/plugins/pickers/color/spectrum.js')}}"></script>
    <script src="{{asset('admin/global/js/demo_pages/picker_color.js')}}"></script>
    <script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script src="{{asset('admin/global/js/plugins/forms/styling/switch.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.form-check-input-styled').uniform();
        });
    </script>


@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card bd-card">
                <div class="bg-white card-header header-elements-inline">
                    <h6 class="card-title">Setting</h6>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-highlight nav-justified"   >
                        <li class="nav-item">
                            <a href="#justified-top-icon-tab1" class="nav-link active" data-toggle="tab">
                                <div>
                                    <i class="icon-cog d-block mb-1 mt-1"></i>
                                    Basic Setting
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#justified-top-icon-tab2" class="nav-link" data-toggle="tab">
                                <div>
                                    <i class="icon-bucket d-block mb-1 mt-1"></i>
                                    Color Setting
                                </div>
                            </a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a href="#justified-top-icon-tab3" class="nav-link" data-toggle="tab">--}}
{{--                                <div>--}}
{{--                                    <i class="icon-cash d-block mb-1 mt-1"></i>--}}
{{--                                    Finance Setting--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="#justified-top-icon-tab4" class="nav-link" data-toggle="tab">--}}
{{--                                <div>--}}
{{--                                    <i class="icon-hammer-wrench d-block mb-1 mt-1"></i>--}}
{{--                                    Other Setting--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </li>--}}

                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="justified-top-icon-tab1">
                            <div style="margin-top: 64px;">
                                <form action="{{ route('setting.basicsetting') }}" method="post"
                                      enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    @include('setting::setting.partial.basic')
                                    <div class="text-right">
                                        <button type="submit" class="btn bg-teal-400"><i class="icon-plus-circle2"></i>
                                            Save Basic Setting
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="justified-top-icon-tab2">
                            <div style="margin-top: 64px;">
                                <form action="{{ route('setting.basicsetting') }}" method="post"
                                      enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    @include('setting::setting.partial.color')
                                    <div class="text-right">
                                        <button type="submit" class="btn bg-teal-400"><i class="icon-plus-circle2"></i>
                                            Save Color Setting
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>

{{--                        <div class="tab-pane fade" id="justified-top-icon-tab3">--}}
{{--                            <div style="margin-top: 64px;">--}}
{{--                                <form action="{{ route('setting.basicsetting') }}" method="post"--}}
{{--                                      enctype="multipart/form-data">--}}
{{--                                    {{ csrf_field() }}--}}
{{--                                    @include('setting::setting.partial.finance')--}}
{{--                                    <div class="text-right">--}}
{{--                                        <button type="submit" class="btn bg-teal-400"><i class="icon-plus-circle2"></i>--}}
{{--                                            Save Finance setting--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="tab-pane fade" id="justified-top-icon-tab4">--}}
{{--                            <div style="margin-top: 64px;">--}}
{{--                                <form action="{{ route('setting.basicsetting') }}" method="post"--}}
{{--                                      enctype="multipart/form-data">--}}
{{--                                    {{ csrf_field() }}--}}
{{--                                    @include('setting::setting.partial.other',['btnType'=>'Save'])--}}
{{--                                    <div class="text-right">--}}
{{--                                        <button type="submit" class="btn bg-teal-400"><i--}}
{{--                                                    class="icon-database-insert"></i> Save Setting--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--<div class="row">--}}
        {{--<div class="col-12">--}}
            {{--<div class="card bd-card">--}}
                {{--<div class="bg-white card-header header-elements-inline">--}}
                    {{--<h6 class="card-title">Setting</h6>--}}
                {{--</div>--}}
                {{--<div class="card-body wizard clearfix">--}}
                    {{--<div class="steps clearfix">--}}
                        {{--<ul role="tablist">--}}
                            {{--<li role="tab" aria-disabled="false" class="first current" aria-selected="true">--}}
                                {{--<a id="steps-uid-4-t-0" href="#steps-uid-4-h-0" aria-controls="steps-uid-4-p-0"><span class="current-info audible">current step: </span><span class="number">1</span> Personal data--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li role="tab" aria-disabled="false">--}}
                                {{--<a id="steps-uid-4-t-1" href="#steps-uid-4-h-1" aria-controls="steps-uid-4-p-1"><span class="number">2</span> Your education--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li role="tab" aria-disabled="false">--}}
                                {{--<a id="steps-uid-4-t-2" href="#steps-uid-4-h-2" aria-controls="steps-uid-4-p-2"><span class="number">3</span> Your experience--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li role="tab" aria-disabled="false" class="last">--}}
                                {{--<a id="steps-uid-4-t-3" href="#steps-uid-4-h-3" aria-controls="steps-uid-4-p-3"><span class="number">4</span> Additional info--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                    {{--<div class="content clearfix">--}}
                        {{--<h6 id="steps-uid-4-h-0" tabindex="-1" class="title current">Personal data</h6>--}}
                        {{--<fieldset id="steps-uid-4-p-0" role="tabpanel" aria-labelledby="steps-uid-4-h-0" class="body current" aria-hidden="false">--}}

                        {{--</fieldset>--}}

                        {{--<h6 id="steps-uid-4-h-1" tabindex="-1" class="title">Your education</h6>--}}
                        {{--<fieldset id="steps-uid-4-p-1" role="tabpanel" aria-labelledby="steps-uid-4-h-1" class="body" aria-hidden="true" style="display: none;">--}}

                        {{--</fieldset>--}}

                        {{--<h6 id="steps-uid-4-h-2" tabindex="-1" class="title">Your experience</h6>--}}
                        {{--<fieldset id="steps-uid-4-p-2" role="tabpanel" aria-labelledby="steps-uid-4-h-2" class="body" aria-hidden="true" style="display: none;">--}}

                        {{--</fieldset>--}}

                        {{--<h6 id="steps-uid-4-h-3" tabindex="-1" class="title">Additional info</h6>--}}
                        {{--<fieldset id="steps-uid-4-p-3" role="tabpanel" aria-labelledby="steps-uid-4-h-3" class="body" aria-hidden="true" style="display: none;">--}}

                        {{--</fieldset>--}}
                    {{--</div>--}}
                    {{--<div class="actions clearfix">--}}
                        {{--<ul role="menu" aria-label="Pagination">--}}
                            {{--<li class="disabled" aria-disabled="true">--}}
                                {{--<a href="#previous" class="btn btn-light disabled" role="menuitem"><i class="icon-arrow-left13 mr-2"></i> Previous--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li aria-hidden="false" aria-disabled="false">--}}
                                {{--<a href="#next" class="btn btn-primary" role="menuitem">Next <i class="icon-arrow-right14 ml-2"></i>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}




@stop
