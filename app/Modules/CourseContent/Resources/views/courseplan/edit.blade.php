@extends('admin::layout')
@section('title')Course Plan @stop 
@section('breadcrum')Edit Course Plan @stop

@section('script')
<!-- Theme JS files -->
<script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/form_inputs.js')}}"></script>
<script src="{{ asset('admin/validation/courseplan.js')}}"></script>
<!-- /theme JS files -->

@stop @section('content')

<!-- Form inputs -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Edit Course Plan</h5>
        <div class="header-elements">

        </div>
    </div>

    <div class="card-body">

		 {!! Form::model($courseplan,['method'=>'PUT','route'=>['courseplan.update',$courseplan->id],'class'=>'form-horizontal','id'=>'courseplan_submit','role'=>'form','files'=>true]) !!} @include('coursecontent::courseplan.partial.action',['btnType'=>'Update']) {!! Form::close() !!}

    </div>
</div>
<!-- /form inputs -->

@stop