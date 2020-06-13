@extends('admin::layout')
@section('title')Course Material Detail @stop 
@section('breadcrum')Create Course Material Detail @stop

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
        <h5 class="card-title">Create Course Material Detail</h5>
        <div class="header-elements">

        </div>
    </div>
    
    <div class="card-body">

        {!! Form::open(['route'=>'coursematerialdetail.store','method'=>'POST','class'=>'form-horizontal','role'=>'form','files' => true, 'id' => 'coursematerialdetail_submit', 'enctype' => 'multipart/form-data']) !!}
        
            @include('coursematerial::coursematerialdetail.partial.action',['btnType'=>'Save']) 
        
        {!! Form::close() !!}
    </div>
</div>
<!-- /form inputs -->

@stop