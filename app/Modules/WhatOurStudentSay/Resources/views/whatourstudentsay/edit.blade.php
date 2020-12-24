@extends('admin::layout')
@section('title')What Our Students Say @stop 
@section('breadcrum')Update What Our Students Say @stop

@section('script')
<!-- Theme JS files -->
<script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/form_inputs.js')}}"></script>
<script src="{{ asset('admin/validation/whatourstudentsay.js')}}"></script>

<!-- /theme JS files -->

@stop @section('content')

<!-- Form inputs -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Edit What Our Students Say</h5>
        <div class="header-elements">

        </div>
    </div>

    <div class="card-body">

        {!! Form::model($whatourstudentsay_info,['method'=>'PUT','route'=>['whatourstudentsay.update',$whatourstudentsay_info->id],'class'=>'form-horizontal','id'=>'whatourstudentsay_submit','role'=>'form','files'=>true]) !!} 
        	
        	@include('whatourstudentsay::whatourstudentsay.partial.action',['btnType'=>'Update']) 
        
        {!! Form::close() !!}
    </div>
</div>
<!-- /form inputs -->

@stop