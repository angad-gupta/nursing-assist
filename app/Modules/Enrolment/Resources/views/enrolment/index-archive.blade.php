@extends('admin::layout')
@section('title') Enrolment Detail @stop
@section('breadcrum') Enrolment Detail @stop
@section('script')
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
<script src="{{asset('admin/validation/updateEnrollStatus.js')}}"></script>

<script>
    $(document).ready(function () {
        $('.select-search').select2();

        $('.update_status').on('click', function () {
            var enrolment_id = $(this).attr('enrolment_id');
            $('.enrolment_id').val(enrolment_id);
        });

        $('.delete_recommend').on('click', function () {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });

        $('.view_detail').on('click', function () {
            var enrolment_id = $(this).attr('enrolment_id');


            $.ajax({
                type: 'GET',
                // dataType: 'HTML',
                url: '/admin/enrolment/viewUser',
                data: {
                    id: enrolment_id
                },

                success: function (data) {
                    $('.result_view_recommend_detail').html(data.options);
                }
            });

        });

    })

</script>
@stop
@section('content')

@include('enrolment::enrolment.partial.filter-archive')

<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">List of Enrolment Detail</h5>
        <div class="text-right">
            <a href="{{ route('enrolment.index') }}" class="btn bg-warning">
                <b>Active Enrolments</b>
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr class="bg-slate">
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Email</th>
                    <th>Mobile No.</th>
                    <th>Intake Date</th>
                    <th>Agent</th>
                    <th>Payment Status</th>
                    <th>Enrollment Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($enrolment->total() != 0)
                @foreach($enrolment as $key => $value)
                <tr>
                    <td>{{$enrolment->firstItem() +$key}}</td>
                    <td>{{ optional($value->student)->full_name }}</td>
                    <td>{{ optional($value->student)->email }}</td>
                    <td>{{ optional($value->student)->phone_no }}</td>
                    <td>{{ $value->intake_date }}</td>
                    <td>{{ optional($value->agent)->agent_name ?? 'None' }}</td>
                    <td class="{{ ($value->payment_status == '1') ? 'text-success font-weight-bold' :'text-danger font-weight-bold' }}">
                        {{ ($value->payment_status == '1') ? 'Paid' :'Payment Pending' }}
                    </td>
                    <td>{{ $value->status }}</td>
                    <td>
                        <a data-toggle="modal" data-target="#modal_theme_view_info"
                            class="btn bg-danger-400 btn-icon rounded-round view_detail" enrolment_id="{{$value->id}}"
                            data-popup="tooltip" data-original-title="View Detail" data-placement="bottom"><i
                                class="icon-eye"></i></a>
                       
                        <a data-toggle="modal" data-target="#modal_theme_status"
                            class="btn bg-success-400 btn-icon rounded-round update_status"
                            enrolment_id="{{ $value->id}}" data-popup="tooltip" data-original-title="Status Update"
                            data-placement="bottom"><i class="icon-flip-horizontal2"></i></a>
                     
                    </td>

                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6">No Enrolment Found !!!</td>
                </tr>
                @endif
            </tbody>

        </table>
    </div>
    <div class="col-12">
        <span class="float-right pagination align-self-end mt-3">
            {{ $enrolment->links() }}
        </span>
    </div>
</div>


<!-- Warning modal -->
<div id="modal_theme_view_info" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <div class="modal-header bg-teal">
                <h6 class="modal-title">View Enrolment Detail</h6>
            </div>

            <div class="modal-body">
                <div class="table-responsive result_view_recommend_detail">

                </div><!-- table-responsive -->
            </div>

            <div class="modal-footer">
                <button type="button" class="btn bg-teal-400" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- warning modal -->

<!-- Warning modal -->
<div id="modal_theme_status" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title">Enrolment Status</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route'=>'enrolment.updateStatus','method'=>'POST','id'=>'enroll_submit','class'=>'form-horizontal','role'=>'form']) !!}
                <div class="form-group row">
                    <label class="col-form-label col-lg-3">Select Status: <span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                        {!! Form::select('status',['Pending'=> 'Pending', 'Approved'=>'Approve', 'Disapproved'=>'Disapprove'], $value = null,
                        ['id'=>'status','class'=>'form-control','placeholder'=>'--Select Enrollment Status--']) !!}
                    </div>

                    {{ Form::hidden('enrolment_id', '',['class'=>'enrolment_id']) }}

                </div>
                <div class="text-right">
                    <button type="submit" class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i
                                class="icon-database-insert"></i></b> Update</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!-- /warning modal -->

@endsection
