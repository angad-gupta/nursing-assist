@extends('admin::layout')
@section('title')Student Purchase @stop
@section('breadcrum')Student Purchase @stop

@section('script')
<script src="{{asset('admin/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
<script src="{{ asset('admin/global/js/plugins/pickers/daterangepicker.js')}}"></script>
<script src="{{ asset('admin/global/js/demo_pages/picker_date.js')}}"></script>

<script type="text/javascript">
    $('document').ready(function () {

        $('.update_status').on('click', function () {
            var student_id = $(this).attr('student_id');
            var payment_id = $(this).attr('payment_id');
            $('.student_id').val(student_id);
            $('.payment_id').val(payment_id);
        });

        $('.add_coursestart_status').on('click', function() {
            var student_id = $(this).attr('student_id');
            var payment_id = $(this).attr('payment_id');
            $('.student_id').val(student_id);
            $('.payment_id').val(payment_id);
        })

        $('.delete_purchase').on('click', function () {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });

    });

</script>
@stop

@section('content')

<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">List of Student Purchase</h5>
        <div class="text-right">

            <a href="{{ route('student.index') }}" class="btn bg-warning">
                <b><i class="icon-esc"></i></b>
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr class="bg-slate">
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Course</th>
                    <th>Course Fee</th>
                    <th>Status</th>
                    <th>Enabled Course</th>
                    <th>Amount Paid</th>
                    <th>Amount Left</th>
                    <th>Date</th>
                    <th>Course Start Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($student_purchase->total() != 0)
                @foreach($student_purchase as $key => $value)

                <tr>
                    <td>{{$student_purchase->firstItem() +$key}}</td>
                    <td>{{ optional($value->studentInfo)->full_name }}</td>
                    <td>{{ optional($value->courseInfo)->course_program_title }}</td>
                    <td>${{ optional($value->courseInfo)->course_fee }}</td>
                    <td class="text-pink"><b>{{ ucfirst($value->status) }}</b></td>
                    <td class="{{ ($value->moved_to_student == '1') ? 'text-success font-weight-bold' :'text-warning font-weight-bold' }}">
                        {{ ($value->moved_to_student == '1') ? 'Move To Student Course' :'Still Pending' }}
                    </td>
                    <td>${{ $value->amount_paid }}</td>
                    <td>${{ $value->amount_left }}</td>
                    <td>{{ date('d M, Y',strtotime($value->created_at)) }}</td>
                    <td>{{ !empty($value->course_start_date) ? date('d M, Y',strtotime($value->course_start_date)) : '-' }}</td>
                    <td>

                        <a data-toggle="modal" data-target="#modal_theme_view_info" class="btn bg-primary-400 btn-icon rounded-round view_detail" student_payment_id="{{$value->id}}" data-popup="tooltip" data-original-title="View Payment History Detail" data-placement="bottom"><i class="icon-history"></i></a>
                        @php
                        $modal = 'modal';
                        @endphp

                        @if($value->amount_left !== '0')
                        <a data-toggle="{{$modal}}" data-target="#modal_payment_status"
                            class="btn bg-danger-400 btn-icon rounded-round update_status"
                            student_id="{{ $student_id }}" payment_id="{{$value->id}}" data-popup="tooltip"
                            data-original-title="Course Payment" data-placement="bottom"><i
                                class="icon-color-sampler"></i></a>
                        @endif

                        <a data-toggle="{{$modal}}" data-target="#modal_theme_status"
                            class="btn bg-success-400 btn-icon rounded-round update_status"
                            student_id="{{ $student_id }}" payment_id="{{$value->id}}" data-popup="tooltip"
                            data-original-title="Course Move Update" data-placement="bottom"><i
                                class="icon-flip-horizontal2"></i></a>
                        
                        @if(empty($value->course_start_date)) 
                            <a data-toggle="modal" data-target="#modal_coursestart_status" student_id="{{ $student_id }}" payment_id="{{$value->id}}"  data-popup="tooltip"
                            data-original-title=" Add Course Start Date" data-placement="bottom"
                            class="btn bg-info-400 btn-icon rounded-round add_coursestart_status"><i class="icon-calendar22"></i></a>
                        @endif
                        <a data-toggle="modal" data-target="#modal_theme_warning"
                            class="btn bg-danger-400 btn-icon rounded-round delete_purchase"
                            link="{{route('studentpurchase.delete', ['id' => $value->id, 'student_id' => $student_id])}}" data-popup="tooltip"
                            data-original-title="Delete" data-placement="bottom"><i class="icon-bin"></i></a>

                    </td>

                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6">No Student Purchase Found !!!</td>
                </tr>
                @endif
            </tbody>

        </table>

        <span style="margin: 5px;float: right;">
            @if($student_purchase->total() != 0)
            {{ $student_purchase->links() }}
            @endif
        </span>
    </div>
</div>


<!-- Warning modal -->
<div id="modal_theme_view_info" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-teal">
                <h6 class="modal-title">View Student Purchase History Detail</h6>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title">Move Course To Student</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route'=>'student.purchaseupdate','method'=>'POST','id'=>'team_submit','class'=>'form-horizontal','role'=>'form','files'=> true]) !!}
                <div class="form-group row">
                    <label class="col-form-label col-lg-3">Select Status:</label>
                    <div class="col-lg-9">
                        {!! Form::select('moved_to_student',[ '1'=>'Move To Student','0'=>'Pending'], $value = null,
                        ['id'=>'moved_to_student','class'=>'form-control','placeholder'=>'--Select Status--','required']) !!}
                    </div>

                    {{ Form::hidden('student_id', '',['class'=>'student_id']) }}
                    {{ Form::hidden('payment_id', '',['class'=>'payment_id']) }}

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


<!-- Warning modal -->
<div id="modal_payment_status" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title">Installment Course Fee</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route'=>'student.courseinstallment','method'=>'POST','id'=>'team_submit','class'=>'form-horizontal','role'=>'form','files'=> true]) !!}
                <div class="form-group row">
                    <label class="col-form-label col-lg-3">Amount Paid:</label>
                    <div class="col-lg-9">
                        {!! Form::text('amount_paid', $value = null, ['id'=>'amount_paid','placeholder'=>'Enter Amount','class'=>'form-control numeric','required']) !!}
                    </div>
                </div>

                {{ Form::hidden('student_id', '',['class'=>'student_id']) }}
                {{ Form::hidden('payment_id', '',['class'=>'payment_id']) }}

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


<!-- Warning modal -->
<div id="modal_theme_warning" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <center>
                    <i class="icon-alert text-danger icon-3x"></i>
                </center>
                <br>
                <center>
                    <h2>Are You Sure Want To Delete ?</h2>
                    <a class="btn btn-success get_link" href="">Yes, Delete It!</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </center>
            </div>
        </div>
    </div>
</div>
<!-- /warning modal -->


<!-- Warning modal -->
<div id="modal_coursestart_status" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title">Add Course Start Date</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route'=>'student.saveCourseDate','method'=>'POST','id'=>'coursedate_submit','class'=>'form-horizontal','role'=>'form']) !!}
                <div class="form-group row">
                    <label class="col-form-label col-lg-3">Course Start Date: <span class="text-danger">*</span></label>
                    <div class="col-lg-9">
                        {!! Form::text('course_start_date', $value = null, ['id'=>'course_start_date','placeholder'=>'Enter Course Start Date','class'=>'form-control daterange-single','required']) !!}
                    </div>
                </div>

                {{ Form::hidden('student_id', '',['class'=>'student_id']) }}
                {{ Form::hidden('payment_id', '',['class'=>'payment_id']) }}

                <div class="text-right">
                    <button type="submit" class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i
                                class="icon-database-insert"></i></b> Save</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!-- /warning modal -->

<script>
    $(document).ready(function () {
 
        $('.view_detail').on('click', function () {
            var student_payment_id = $(this).attr('student_payment_id');

            $.ajax({
                type: 'GET',
                url: '/admin/student/viewPaymentHistory',
                data: {
                    student_payment_id: student_payment_id
                },

                success: function (data) {
                    $('.result_view_recommend_detail').html(data.options);
                }
            });

        });

    })

</script>

@endsection
