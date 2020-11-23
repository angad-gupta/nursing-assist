@extends('admin::layout')
@section('title')Blog @stop 
@section('breadcrum')Update Blog @stop

@section('script')
<!-- Theme JS files -->
<script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/form_inputs.js')}}"></script>
<script src="{{ asset('admin/validation/blog.js')}}"></script>

<!-- /theme JS files -->

@stop @section('content')

<!-- Form inputs -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Edit Blog</h5>
        <div class="header-elements">

        </div>
    </div>

    <div class="card-body">

        {!! Form::model($blog_info,['method'=>'PUT','route'=>['blog.update',$blog_info->id],'class'=>'form-horizontal','id'=>'blog_submit','role'=>'form','files'=>true]) !!} 
        	
        	@include('blog::blog.partial.action',['btnType'=>'Update']) 
        
        {!! Form::close() !!}
    </div>
</div>
<!-- /form inputs -->

@stop