@extends('admin::layout')
@section('title')Resource Management @stop
@section('breadcrum')Edit Resource Information @stop

@section('script')
<!-- Theme JS files -->
<script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/form_inputs.js')}}"></script>
<script src="{{ asset('admin/validation/resource.js')}}"></script>
<!-- /theme JS files -->

@stop 
@section('content')

<!-- Form inputs -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Edit Resource Information</h5>
        <div class="header-elements">

        </div>
    </div>

    <div class="card-body">

        {!! Form::model($resource,['method'=>'PATCH','route'=>['resource.update',$resource->id],'class'=>'form-horizontal','id'=>'resource_submit','role'=>'form','files'=>true]) !!} 
            @include('resource::resource.partial.action',['btnType'=>'Update']) 
        {!! Form::close() !!}

    </div>
</div>
<!-- /form inputs -->

@stop
