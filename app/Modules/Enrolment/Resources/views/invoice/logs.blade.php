@extends('admin::layout')
@section('title') Invoice History @stop
@section('breadcrum') Invoice History @stop
@section('script')
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>

<script>
    $(document).ready(function () {
        $('.select-search').select2();
    })

</script>
@stop
@section('content')

{{--@include('enrolment::enrolment.partial.filter')--}}

<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">List of Invoices</h5>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr class="bg-slate"> 
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Subject</th>
                    <th>Description</th>
                    <th>Invoice File</th>
                    {{--<th>Status</th>--}}
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($invoice_logs->total() != 0)
                @foreach($invoice_logs as $key => $value)
                <tr>
                    <td>{{$invoice_logs->firstItem() +$key}}</td>
                    <td>{{ $value->full_name }}</td>
                    <td>{{ $value->subject  }}</td>
                    <td>{{ $value->description  }}</td>
                    <td>{{ $value->invoice_file }}</td>
                    {{--<td class="{{ ($value->status == '1') ? 'text-success font-weight-bold' :'text-danger font-weight-bold' }}">
                        {{ ($value->status == '1') ? 'Sent' :'Not Sent' }}
                    </td>--}}
                    <td>
                        <a href="{{route('invoice.send', $value->id)}}" class="btn bg-danger-400 btn-icon rounded-round update_status"
                            data-popup="tooltip" data-original-title="Send Invoice"
                            data-placement="bottom"><i class="icon-envelope"></i>
                        </a>
                    </td>

                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6">No Data Found !!!</td>
                </tr>
                @endif
            </tbody>

        </table>
    </div>
    <div class="col-12">
        <span class="float-right pagination align-self-end mt-3">
            {{ $invoice_logs->links() }}
        </span>
    </div>
</div>

@endsection
