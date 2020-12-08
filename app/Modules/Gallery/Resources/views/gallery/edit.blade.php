@extends('admin::layout')
@section('title')Album @stop 
@section('breadcrum')Edit Album @stop

@section('script')
<!-- Theme JS files -->
<script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/form_inputs.js')}}"></script>
<!-- /theme JS files -->
@stop @section('content')

<!-- Form inputs -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Edit Album</h5>
        <div class="header-elements">

        </div>
    </div>

    <div class="card-body">

        {!! Form::model($gallery, ['route'=>['gallery.update', $gallery->id],'method'=>'patch','class'=>'form-horizontal','id'=>'gallery_submit','role'=>'form','files' => true]) !!}
        
            @include('gallery::gallery.partial.action',['btnType'=>'Update']) 
        
        {!! Form::close() !!}
    </div>
</div>
<!-- /form inputs -->

@stop