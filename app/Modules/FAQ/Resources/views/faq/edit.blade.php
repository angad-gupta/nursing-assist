@extends('admin::layout')
@section('title')FAQ @stop 
@section('breadcrum')Update FAQ @stop

@section('script')
<!-- Theme JS files -->
<script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/form_inputs.js')}}"></script>
<script src="{{ asset('admin/validation/faq.js')}}"></script>

<!-- /theme JS files -->

@stop @section('content')

<!-- Form inputs -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Edit FAQ</h5>
        <div class="header-elements">

        </div>
    </div>

    <div class="card-body">

        {!! Form::model($faq,['method'=>'PUT','route'=>['faq.update',$faq->id],'class'=>'form-horizontal','id'=>'faq_submit','role'=>'form','files'=>true]) !!} 
        	
        	@include('faq::faq.partial.action',['btnType'=>'Update']) 
        
        {!! Form::close() !!}
    </div>
</div>
<!-- /form inputs -->

@stop