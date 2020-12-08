@extends('admin::layout')
@section('title')Email Log @stop
@section('breadcrum')Email Log @stop

@section('script')
<script src="{{asset('admin/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
@stop

@section('content') 


<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">List of Email Log</h5>

    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr class="bg-slate">
                    <th>#</th>
                    <th>Student</th>
                    <th>Action</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @if($email_log_info->total() != 0) 
                    @foreach($email_log_info as $key => $value)

                    <tr>
                        <td>{{$email_log_info->firstItem() +$key}}</td>
                         <td>{{ optional($value->studentInfo)->full_name }}</td>
                         <td>{{ $value->action }}</td>
                         <td>{{ $value->date }}</td>
                    </tr>
                    @endforeach
                @else
                <tr>
                    <td colspan="4">No Email Log Found !!!</td>
                </tr>
                @endif
            </tbody>

        </table>

        <span style="margin: 5px;float: right;">
            @if($email_log_info->total() != 0)
                {{ $email_log_info->links() }}
            @endif
            </span>
    </div>
</div>


@endsection