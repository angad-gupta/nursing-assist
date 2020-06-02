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
    <script src="{{asset('admin/global/js/plugins/forms/styling/switchery.min.js')}}"></script>
    <script src="{{asset('admin/global/js/demo_pages/picker_color.js')}}"></script>
    <script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script src="{{asset('admin/global/js/plugins/forms/styling/switch.min.js')}}"></script>
    {{--    <script src="{{asset('admin/global/js/demo_pages/form_checkboxes_radios.js')}}"></script>--}}
    <script src="{{asset('admin/global/js/plugins/forms/wizards/steps.min.js')}}"></script>
    {{--<script src="{{asset('admin/global/js/demo_pages/form_wizard.js')}}"></script>--}}
    <script>
        $(document).ready(function(){

            $(document).ready(function(){
                $('.form-check-input-styled').uniform();
            });
            $('.steps-basic').steps({
                headerTag: 'h6',
                bodyTag: 'fieldset',
                transitionEffect: 'fade',
                titleTemplate: '<span class="number">#index#</span> #title#',
                labels: {
                    previous: '<i class="icon-arrow-left13 mr-2" /> Previous',
                    next: 'Next <i class="icon-arrow-right14 ml-2" />',
                    finish: 'Submit form <i class="icon-arrow-right14 ml-2" />'
                },
                onFinished: function (event, currentIndex) {
                    $('.steps-basic').submit();
                }
            });
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
            {!! Form::open(['route'=>'setting.store','method'=>'POST','id'=>'setting_submit','class'=>'wizard-form steps-basic','data-fouc','files' => true]) !!}

            <h6>Basic Setting</h6>
            @include('setting::setting.partial.basic')
            <h6>Color Setting</h6>
            @include('setting::setting.partial.color')
            <h6>Finance Setting</h6>
            @include('setting::setting.partial.finance')
            <h6>Other Setting</h6>
            @include('setting::setting.partial.other')
            {!! Form::close() !!}
        </div>
    </div>




@stop
