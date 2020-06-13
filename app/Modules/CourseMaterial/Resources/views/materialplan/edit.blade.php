@extends('admin::layout')
@section('title')Course Material Plan @stop 
@section('breadcrum')Edit Course Material Plan @stop

@section('script')
<!-- Theme JS files -->
<script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/form_inputs.js')}}"></script>
<script src="{{ asset('admin/validation/materialplan.js')}}"></script>
<!-- /theme JS files -->

@stop @section('content')

<!-- Form inputs -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Edit Course Material Plan</h5>
        <div class="header-elements">

        </div>
    </div>

    <div class="card-body">

		 {!! Form::model($materialplan,['method'=>'PUT','route'=>['materialplan.update',$materialplan->id],'class'=>'form-horizontal','id'=>'materialplan_submit','role'=>'form','files'=>true]) !!} @include('coursematerial::materialplan.partial.action',['btnType'=>'Update']) {!! Form::close() !!}

    </div>
</div>
<!-- /form inputs -->

@stop