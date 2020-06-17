@extends('admin::layout')
@section('title')Announcement @stop 
@section('breadcrum')Update Announcement @stop

@section('script')
<!-- Theme JS files -->
<script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/form_inputs.js')}}"></script>
<script src="{{ asset('admin/validation/announcement.js')}}"></script>

<!-- /theme JS files -->

@stop @section('content')

<!-- Form inputs -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Edit Announcement</h5>
        <div class="header-elements">

        </div>
    </div>

    <div class="card-body">

        {!! Form::model($announcement,['method'=>'PUT','route'=>['announcement.update',$announcement->id],'class'=>'form-horizontal','id'=>'announcement_submit','role'=>'form','files'=>true]) !!} 
        	
        	@include('announcement::announcement.partial.action',['btnType'=>'Update']) 
        
        {!! Form::close() !!}
    </div>
</div>
<!-- /form inputs -->

@stop