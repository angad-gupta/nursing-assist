@extends('admin::layout')
@section('title')Reminder Management @stop
@section('breadcrum')Reminder Management @stop

@section('script')
<script src="{{asset('admin/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
@stop

@section('content') 

<div class="card">
    <div class="card-body d-sm-flex align-items-sm-center justify-content-sm-between flex-sm-wrap row">
        <div class="col-md-4">
            <a href="{{ route('reminder.create') }}" class="btn bg-teal-400">
                <i class="icon-arrow-right16"></i>
                Create Reminder
            </a>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">List of Reminders</h5>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr class="bg-slate">
                    <th>View From Date</th>
                    <th>View To Date</th>
                    <th>Title</th>
                    <th>Reminder Type</th>
                    <th>Reminder Date</th>
                    <th>Start Before</th>
                    <th>Priority</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reminders as $reminder)
                    <tr>
                        <td>{{ Carbon::parse($reminder->remind_from)->toDateString() }}</td>
                        <td>{{ Carbon::parse($reminder->remind_to)->toDateString() }}</td>
                        <td>{{ $reminder->title }}</td>
                        <td>{{ optional($reminder->reminderType)->dropvalue }}</td>
                        <td>{{ $reminder->remind_date }}</td>
                        <td>{{ $reminder->remind_before ?? '0' }} Days</td>
                        <td>{{ $reminder->priority_name }}</td>
                        <td>
                            <a class="btn bg-{{ config('admin.color-class.edit') }} btn-icon rounded-round" href="{{ route('reminder.edit', $reminder->id) }}" data-popup="tooltip" data-placement="bottom" data-original-title="Edit Reminder">
                            <i class="icon-pencil"></i>
                        </a>
                        <a data-toggle="modal" data-target="#modal_theme_warning" class="btn bg-{{ config('admin.color-class.delete') }} btn-icon rounded-round delete-reminder" link="{{route('reminder.destroy',$reminder->id)}}" data-popup="tooltip" data-placement="bottom" data-original-title="Delete Reminder">
                        <i class="icon-bin"></i>
                    </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <span style="margin: 5px;float: right;">
            @if($reminders->total() != 0)
            {{ $reminders->links() }}
            @endif
        </span>
    </div>
</div>

<div id="modal_theme_warning" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h6 class="modal-title">Are you sure to Delete Reminder  ?</h6>
            </div>

            <div class="modal-body">
                <a class="btn btn-success get_link" href="">Yes</a> &nbsp; | &nbsp;
                <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('document').ready(function() {
        $('.delete-reminder').on('click', function() {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });
    });
</script>

@endsection