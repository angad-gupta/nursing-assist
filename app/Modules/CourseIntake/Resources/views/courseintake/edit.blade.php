@extends('admin::layout')
@section('title')Course Intake @stop 
@section('breadcrum')Edit Course Intake @stop

@section('script')
<!-- Theme JS files -->
<script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/form_inputs.js')}}"></script>
<script src="{{ asset('admin/validation/courseintake.js')}}"></script>
<!-- /theme JS files -->

@stop @section('content')

<!-- Form inputs -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Edit Course Intake</h5>
        <div class="header-elements">

        </div>
    </div>

    <div class="card-body">

		 {!! Form::model($courseintake,['method'=>'PUT','route'=>['courseintake.update',$courseintake->id],'class'=>'form-horizontal','id'=>'courseintake_submit','role'=>'form','files'=>true]) !!} @include('courseintake::courseintake.partial.action',['btnType'=>'Update']) {!! Form::close() !!}

    </div>
</div>
<!-- /form inputs -->

@stop