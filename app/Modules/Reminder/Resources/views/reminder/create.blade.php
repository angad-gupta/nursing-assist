@extends('admin::layout')
@section('title')Reminder Management @stop
@section('breadcrum')Reminder Management @stop

@section('script')
<script src="{{asset('admin/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
@stop

@section('content') 
<div class="card">
    <div class="card-header bg-orange-800 header-elements-inline">
        <h5 class="card-title">Create Reminder</h5>
        <div class="header-elements">

        </div>
    </div>

    <div class="card-body">

        {!! Form::open(['route'=>'reminder.store','method'=>'POST','class'=>'form-horizontal','id'=>'reminder_submit','role'=>'form','files' => true]) !!}
        
            @include('reminder::reminder.partial.action',['btnType'=>'Save']) 
        
        {!! Form::close() !!}
    </div>
</div>
@endsection