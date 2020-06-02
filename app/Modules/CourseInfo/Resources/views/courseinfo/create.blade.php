@extends('admin::layout')
@section('title')Course Information @stop 
@section('breadcrum')Create Course Information @stop

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
        <h5 class="card-title">Create Course Information</h5>
        <div class="header-elements">

        </div>
    </div>
    
    <div class="card-body">

        {!! Form::open(['route'=>'courseinfo.store','method'=>'POST','class'=>'form-horizontal','role'=>'form','files' => true, 'id' => 'courseinfo_submit', 'enctype' => 'multipart/form-data']) !!}
        
            @include('courseinfo::courseinfo.partial.action',['btnType'=>'Save']) 
        
        {!! Form::close() !!}
    </div>
</div>
<!-- /form inputs -->

@stop