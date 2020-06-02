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
        $(document).ready(function(){
            $('.form-check-input-styled').uniform();
        });
    </script>


@stop
@section('content')

    <!-- Form inputs -->
    <div class="card">
        <div class="card-header bg-teal-400 header-elements-inline">
            <h5 class="card-title">Setting</h5>
            <div class="header-elements">

            </div>
        </div>

        <div class="card-body">

            {!! Form::open(['route'=>'setting.store','method'=>'POST','id'=>'setting_submit','class'=>'form-horizontal','role'=>'form','files' => true]) !!}

            <ul class="nav nav-tabs nav-tabs-solid bg-teal border-0 nav-justified rounded">
                <li class="nav-item"><a href="#basic" class="nav-link rounded-left active tab_1" data-toggle="tab">Basic
                        Setting</a></li>
                <li class="nav-item"><a href="#color" class="nav-link rounded-left tab_2" data-toggle="tab">Color Setting</a>
                </li>
                <li class="nav-item"><a href="#finance" class="nav-link rounded-left tab_3" data-toggle="tab">Finance
                        Setting</a></li>
                <li class="nav-item"><a href="#other" class="nav-link rounded-left tab_4" data-toggle="tab">Other Setting</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="basic">
                    @include('setting::setting.partial.basic')
                    <div class="text-right">
                        <a class="btn bg-teal-400" onclick="$('.tab_2').trigger('click')"><i class="icon-arrow-right7"></i> Next</a>
                    </div>
                </div>
                <div class="tab-pane fade show " id="color">
                    @include('setting::setting.partial.color')
                    <div class="text-right">
                        <a  class="btn bg-teal-400" onclick="$('.tab_1').trigger('click')"><i class="icon-arrow-left7"></i> Previous</a>
                        <a class="btn bg-teal-400" onclick="$('.tab_3').trigger('click')"><i class="icon-arrow-right7"></i> Next</a>
                    </div>
                </div>
                <div class="tab-pane fade show " id="finance">
                    @include('setting::setting.partial.finance')
                    <div class="text-right">
                        <a  class="btn bg-teal-400" onclick="$('.tab_2').trigger('click')"><i class="icon-arrow-left7"></i> Previous</a>
                        <a class="btn bg-teal-400" onclick="$('.tab_4').trigger('click')"><i class="icon-arrow-right7"></i> Next</a>
                    </div>
                </div>
                <div class="tab-pane fade show " id="other">
                    @include('setting::setting.partial.other',['btnType'=>'Save'])
                    <div class="text-right">
                        <a  class="btn bg-teal-400" onclick="$('.tab_3').trigger('click')"><i class="icon-arrow-left7"></i> Previous</a>
                        <button type="submit" class="btn bg-teal-400"><i class="icon-database-insert"></i> Save Setting </button>
                    </div>
                </div>
            </div>


            {!! Form::close() !!}
        </div>

    </div>
    <!-- /form inputs -->

@stop
