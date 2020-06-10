@extends('admin::layout')
@section('title')Quiz Question @stop 
@section('breadcrum')Edit Quiz Question @stop

@section('script')
<!-- Theme JS files -->
<script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/form_inputs.js')}}"></script>
<script src="{{ asset('admin/validation/quiz.js')}}"></script>
<!-- /theme JS files -->

@stop @section('content')

<!-- Form inputs -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Edit Quiz Question</h5>
        <div class="header-elements">

        </div>
    </div>

    <div class="card-body">

		 {!! Form::model($quiz,['method'=>'PUT','route'=>['quiz.update',$quiz->id],'class'=>'form-horizontal','id'=>'courseinfo_submit','role'=>'form','files'=>true]) !!} @include('quiz::quiz.partial.action',['btnType'=>'Update']) {!! Form::close() !!}

    </div>
</div>
<!-- /form inputs -->

@stop