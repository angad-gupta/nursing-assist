@extends('admin::layout')
@section('title')Course Material Detail @stop
@section('breadcrum')Course Material Detail @stop

@section('script')
<script src="{{ asset('admin/global/js/plugins/pickers/daterangepicker.js')}}"></script>
<script src="{{ asset('admin/global/js/demo_pages/picker_date.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
@stop

@section('content')


<div class="card card-body">
    <div class="d-flex justify-content-between">
        <h4>List of Course Material Detail</h4>
        <a href="{{ route('coursematerialdetail.create',['material_id'=>$material_id]) }}" class="btn bg-blue" style="margin-left: 900px;">
            <b><i class="icon-plus2"></i></b> Add Course Material Detail
        </a>
         <a href="{{ route('coursematerial.index') }}" class="btn bg-warning">
            <b><i class="icon-esc"></i></b> Back To Course Material
        </a>
    </div>

    <div class="mb-3 mt-3"></div>
    <div class="table-responsive table-card">
        <table class="table table-striped">
            <thead>
                <tr class="bg-slate">
                    <th>#</th>
                    <th>Course Info</th>
                    <th>Course Material Title</th>
                    <th>Course Topic</th>
                    <th>Course Schedule</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($coursematerialdetail->total() != 0)
                @foreach($coursematerialdetail as $key => $value)
                @php
                $material_id = optional($value->courseMaterial)->id;
                @endphp
                <tr>
                    <td>{{$coursematerialdetail->firstItem() +$key}}</td>
                    <td>{{ optional($value->courseMaterial->courseInfo)->course_program_title }}</td>
                    <td>{{ optional($value->courseMaterial)->material_title }}</td>
                    <td>{{ $value->material_topic }}</td>
                    <td>{!! $value->course_schedule !!}</td>
                    <td>

                         <a class="btn bg-success btn-icon rounded-round" href="{{ route('materialplan.index',['material_id'=>$material_id,'material_detail_id'=>$value->id]) }}" data-popup="tooltip" data-placement="bottom" data-original-title="Daily Material Plan"><i class="icon-stack-text"></i></a>

                        <a class="btn bg-info btn-icon rounded-round" href="{{ route('coursematerialdetail.edit',['material_id'=>$material_id,'material_detail_id'=>$value->id]) }}" data-popup="tooltip" data-placement="bottom" data-original-title="Edit Course Material Detail"><i class="icon-pencil"></i></a>

                        <a data-toggle="modal" data-target="#modal_theme_warning" class="btn bg-danger btn-icon rounded-round delete_materialdetail" link="{{route('coursematerialdetail.delete',['material_id'=>$material_id,'material_detail_id'=>$value->id])}}" data-popup="tooltip" data-placement="bottom" data-original-title="Delete"><i class="icon-bin"></i></a>

                    </td>

            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="5">No Course Material Detail Found !!!</td>
            </tr>
            @endif
        </tbody>

    </table>
</div>
<div class="col-12">
    <span class="float-right pagination align-self-end mt-3">
        {{ $coursematerialdetail->links() }}
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

        $('.delete_materialdetail').on('click', function() {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });

    });

</script>

@endsection
