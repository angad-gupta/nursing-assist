@extends('admin::layout')
@section('title')Newsletter @stop 
@section('breadcrum')Create Newsletter @stop

@section('script')
<!-- Theme JS files -->
<script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/form_inputs.js')}}"></script>
<script src="{{asset('admin/validation/newsletter.js')}}"></script>

<!-- /theme JS files -->

@stop @section('content')

<!-- Form inputs -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Create Newsletter</h5>
        <div class="header-elements">

        </div>
    </div>

    <div class="card-body">

        {!! Form::open(['route'=>'newsletter.store','method'=>'POST','name'=>'newsletter_form','id'=>'newsletter_submit','class'=>'form-horizontal','role'=>'form','files' => true]) !!}
         	@include('newsletter::newsletter.partial.action',['btnType'=>'Send Bulk Email']) 
         {!! Form::close() !!}
    </div>
</div>
<!-- /form inputs -->

@stop