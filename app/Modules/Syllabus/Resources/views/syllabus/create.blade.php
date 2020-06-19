@extends('admin::layout')
@section('title')Team @stop 
@section('breadcrum')Create Team @stop

@section('script')
<!-- Theme JS files -->
<script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/form_inputs.js')}}"></script>
<script src="{{asset('admin/validation/syllabus.js')}}"></script>

<!-- /theme JS files -->

@stop @section('content')

<!-- Form inputs -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Create Team</h5>
        <div class="header-elements">

        </div>
    </div>

    <div class="card-body">

        {!! Form::open(['route'=>'syllabus.store','method'=>'POST','id'=>'syllabus_submit','class'=>'form-horizontal','role'=>'form','files' => true]) !!}
         	@include('syllabus::syllabus.partial.action',['btnType'=>'Save']) 
         {!! Form::close() !!}
    </div>
</div>
<!-- /form inputs -->

@stop