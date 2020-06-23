@extends('admin::layout')
@section('title')Course Sub Topic @stop 
@section('breadcrum')Edit Course Sub Topic @stop

@section('script')
<!-- Theme JS files -->
<script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/form_inputs.js')}}"></script>
<script src="{{ asset('admin/validation/coursesubtopic.js')}}"></script>
<!-- /theme JS files -->

@stop @section('content')

<!-- Form inputs -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Edit Course Sub Topic</h5>
        <div class="header-elements">

        </div>
    </div>

    <div class="card-body">

		 {!! Form::model($coursesubtopic,['method'=>'PUT','route'=>['coursesubtopic.update',$coursesubtopic->id],'class'=>'form-horizontal','id'=>'coursesubtopic_submit','role'=>'form','files'=>true]) !!} @include('coursecontent::coursesubtopic.partial.action',['btnType'=>'Update']) {!! Form::close() !!}

    </div>
</div>
<!-- /form inputs -->

@stop