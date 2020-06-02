@extends('admin::layout')
@section('title')Course Information @stop 
@section('breadcrum')Edit Course Information @stop

@section('script')
<!-- Theme JS files -->
<script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/form_inputs.js')}}"></script>
<script src="{{ asset('admin/validation/courseinfo.js')}}"></script>
<!-- /theme JS files -->

@stop @section('content')

<!-- Form inputs -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Edit Course Information</h5>
        <div class="header-elements">

        </div>
    </div>

    <div class="card-body">

		 {!! Form::model($courseinfo,['method'=>'PUT','route'=>['courseinfo.update',$courseinfo->id],'class'=>'form-horizontal','id'=>'courseinfo_submit','role'=>'form','files'=>true]) !!} @include('courseinfo::courseinfo.partial.action',['btnType'=>'Update']) {!! Form::close() !!}

    </div>
</div>
<!-- /form inputs -->

@stop