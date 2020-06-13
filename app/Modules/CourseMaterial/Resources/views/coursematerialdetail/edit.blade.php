@extends('admin::layout')
@section('title')Course Material Detail @stop 
@section('breadcrum')Edit Course Material Detail @stop

@section('script')
<!-- Theme JS files -->
<script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/form_inputs.js')}}"></script>
<script src="{{ asset('admin/validation/coursematerialdetail.js')}}"></script>
<!-- /theme JS files -->

@stop @section('content')

<!-- Form inputs -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Edit Course Material Detail</h5>
        <div class="header-elements">

        </div>
    </div>

    <div class="card-body">

		 {!! Form::model($coursematerialdetail,['method'=>'PUT','route'=>['coursematerialdetail.update',$coursematerialdetail->id],'class'=>'form-horizontal','id'=>'coursematerialdetail_submit','role'=>'form','files'=>true]) !!} @include('coursematerial::coursematerialdetail.partial.action',['btnType'=>'Update']) {!! Form::close() !!}

    </div>
</div>
<!-- /form inputs -->

@stop