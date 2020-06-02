@extends('admin::layout')
@section('title')Create Notification @stop
@section('breadcrum')Edit Notification@stop

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
        <h5 class="card-title">Edit Notification</h5>
        <div class="header-elements">

        </div>
    </div>

    <div class="card-body">

		{!! Form::model($tipsinformation,['method'=>'PUT','route'=>['tipsinformation.update',$tipsinformation->id],'class'=>'form-horizontal','id'=>'tip_info_submit','role'=>'form','files'=>true]) !!} @include('tipsinformation::tipsinformation.partial.action',['btnType'=>'Update']) {!! Form::close() !!}


    </div>
</div>
<!-- /form inputs -->

@stop
