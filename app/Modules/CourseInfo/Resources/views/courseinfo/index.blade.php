@extends('admin::layout')
@section('title')Course Information @stop
@section('breadcrum')Course Information @stop

@section('script')
<script src="{{ asset('admin/global/js/plugins/pickers/daterangepicker.js')}}"></script>
<script src="{{ asset('admin/global/js/demo_pages/picker_date.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
@stop

@section('content')


<div class="card card-body">
    <div class="d-flex justify-content-between">
        <h4>List of Course Information</h4>
        <a href="{{ route('courseinfo.create') }}" class="btn bg-blue">
            <i class="icon-plus2"></i> Add Course Information
        </a>
    </div>
    <div class="mb-3 mt-3"></div>
    <div class="table-responsive table-card">
        <table class="table table-striped">
            <thead>
                <tr class="bg-slate">
                    <th>#</th>
                    <th>Course</th>
                    <th>Course Program Title</th>
                    <th>Course Sub Title</th>
                    <th>Students Per Intake</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($courseinfo->total() != 0)
                @foreach($courseinfo as $key => $value)
                <tr>
                    <td>{{$courseinfo->firstItem() +$key}}</td>
                    <td>{{ optional($value->Course)->title }}</td>
                    <td>{{ $value->course_program_title }}</td>
                    <td>{{ $value->course_program_sub_title }}</td>
                    <td>{{ $value->students_per_intake }}</td>
                    <td
                        class="{{ ($value->status == 1) ? 'text-success font-weight-bold' :'text-danger font-weight-bold' }}">
                        {{ $value->status == 1 ? 'Active' :'In-Active' }}
                    </td>
                    <td>

                        <a class="btn bg-info btn-icon rounded-round" href="{{ route('courseinfo.edit',$value->id) }}" data-popup="tooltip" data-placement="bottom" data-original-title="Edit Course Info"><i class="icon-pencil"></i></a>

                        <a data-toggle="modal" data-target="#modal_theme_warning" class="btn bg-danger btn-icon rounded-round delete_courseinfo" link="{{route('courseinfo.delete',$value->id)}}" data-popup="tooltip" data-placement="bottom" data-original-title="Delete"><i class="icon-bin"></i></a>

                    </td>

            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="5">No Course Information Found !!!</td>
            </tr>
            @endif
        </tbody>

    </table>
</div>
<div class="col-12">
    <span class="float-right pagination align-self-end mt-3">
        {{ $courseinfo->links() }}
    </span>
</div>
</div>

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

<script type="text/javascript">
    $('document').ready(function() {

        $('.delete_courseinfo').on('click', function() {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });

    });

</script>

@endsection
