@extends('admin::layout')
@section('title')Course Material @stop 
@section('breadcrum')Create Course Material @stop

@section('script')
<!-- Theme JS files -->
<script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/form_inputs.js')}}"></script>
<script src="{{ asset('admin/validation/coursematerial.js')}}"></script>

<!-- /theme JS files -->

@stop @section('content')

<!-- Form inputs -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Create Course Material</h5>
        <div class="header-elements">

        </div>
    </div>
    
    <div class="card-body">

        {!! Form::open(['route'=>'coursematerial.store','method'=>'POST','class'=>'form-horizontal','role'=>'form','files' => true, 'id' => 'coursematerial_submit', 'enctype' => 'multipart/form-data']) !!}
        
            @include('coursematerial::coursematerial.partial.action',['btnType'=>'Save']) 
        
        {!! Form::close() !!}
    </div>
</div>
<!-- /form inputs -->

@stop