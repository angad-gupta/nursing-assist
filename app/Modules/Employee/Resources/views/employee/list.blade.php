@extends('admin::layout')
@section('title')Employee @stop
@section('breadcrum')Employee @stop

@section('script')
<script src="{{asset('admin/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
<script src="{{ asset('admin/global/js/plugins/pickers/daterangepicker.js')}}"></script>
<script src="{{ asset('admin/global/js/demo_pages/picker_date.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/selects/bootstrap_multiselect.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/form_multiselect.js')}}"></script>
@stop

@section('content')
@include('employee::employee.partial.search')
<div class="card card-body" id="employee-list-card">
    <div class="d-flex justify-content-between">
        <h4>Employee List</h4>
    </div>
    @include('employee::employee.advance-search')
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr class="bg-slate">
                    <th>#</th>
                    <th>Employee Name</th>
                    <th>Designation</th>
                    <th>Contact Number</th>
                    <th>Basic Salary</th>
                    <th>Daily Allowance</th>
                    <th>Other Allowance</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                <tr>
                    <td>{{ ++$loop->index }}</td>
                    <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                    <td>{{ optional($employee->designation)->dropvalue }}</td>
                    <td>{{ $employee->mobile }}</td>
                    <td>Rs.{{ number_format($employee->salary,2) }}</td>
                    <td>Rs.{{ ($employee->daily_allowance) ? number_format($employee->daily_allowance,2) : 0 }}</td>
                    <td>Rs.{{ ($employee->other_allowance) ? number_format($employee->other_allowance,2) : 0 }}</td>
                    <td>{{ $employee->personal_email }}</td>
                    <td>
                        @if($employee->status == '1')
                        <a href="javascript:void(0)" class="btn btn-outline bg-success btn-icon text-success border-success border-2 rounded-round" data-popup="tooltip" data-placement="bottom" data-original-title="Active Employer">
                            <i class="icon-checkmark4"></i>
                        </a>
                        @else
                        <a href="javascript:void(0)" class="btn btn-outline bg-danger btn-icon text-danger border-danger border-2 rounded-round" data-popup="tooltip" data-placement="bottom" data-original-title="In-Active Employer">
                            <i class="icon-cross2"></i>
                        </a>
                        @endif
                    </td>
                    <td class="text-right">
                        <div class="dropdown">
                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                <i class="icon-more2"></i>
                            </a>
                            <div class="dropdown-menu bd-card dropdown-menu-right">
                                <a data-toggle="modal" data-target="#modal_view_employee" class="dropdown-item view_employee" employee_id="{{ $employee->id }}">
                                    <i class="icon-eye"></i> View Detail
                                </a>
                                <a class="dropdown-item view_employee" href="{{ route('employee.print', $employee->id) }}" target="_blank">
                                    <i class="icon-printer2"></i> Print / Download Detail
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <span style="margin: 5px;float: right;">
            @if($employees->total() != 0) 
            {{ $employees->appends(request()->all())->links() }}
            @endif
        </span>
    </div>
</div>

{{-- view employee details modal --}}
<div id="modal_view_employee" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h6 class="modal-title">View Detail of Employee</h6>
            </div>
            <div class="modal-body">
                <div class="table-responsive result_view_detail">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-teal-400" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready( function () {
        $('.view_employee').click( function () {
            var employee_id = $(this).attr('employee_id');
            $.ajax({
                type: 'GET',
                url: '/admin/employee/view',
                data: {
                    id: employee_id
                },

                success: function(response) {
                    $('.result_view_detail').html(response);
                }
            });
        });
    });

</script>
<script>
    function exportTableToExcel(tableID, filename = ''){
        var downloadLink;
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

// Specify file name
filename = filename ? filename+'.xlsx':'excel_data.xlsx';

// Create download link element
downloadLink = document.createElement("a");

document.body.appendChild(downloadLink);

if(navigator.msSaveOrOpenBlob){
    var blob = new Blob(['\ufeff', tableHTML], {
        type: dataType
    });
    navigator.msSaveOrOpenBlob( blob, filename);
}else{
// Create a link to the file
downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

// Setting the file name
downloadLink.download = filename;

//triggering the function
downloadLink.click();
}
}
</script>
@endsection
