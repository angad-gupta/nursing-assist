@extends('admin::layout')
@section('title')Notification @stop
@section('breadcrum')Create Notification @stop

@section('script')
<!-- Theme JS files -->
<script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/form_inputs.js')}}"></script>
<script src="{{ asset('admin/validation/tipinformation.js')}}"></script>

<!-- /theme JS files -->

@stop @section('content')

<!-- Form inputs -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Create Notification</h5>
        <div class="header-elements">

        </div>
    </div>

    <div class="card-body">

        {!! Form::open(['route'=>'tipsinformation.store','method'=>'POST','class'=>'form-horizontal','role'=>'form','files' => true, 'id' => 'tip_info_submit', 'enctype' => 'multipart/form-data']) !!}

            @include('tipsinformation::tipsinformation.partial.action',['btnType'=>'Save'])

        {!! Form::close() !!}
    </div>
</div>
<!-- /form inputs -->

@stop
