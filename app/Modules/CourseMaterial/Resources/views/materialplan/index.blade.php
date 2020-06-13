@extends('admin::layout')
@section('title')Daily Course Material Plan @stop
@section('breadcrum')Daily Course Material Plan @stop

@section('script')
<script src="{{ asset('admin/global/js/plugins/pickers/daterangepicker.js')}}"></script>
<script src="{{ asset('admin/global/js/demo_pages/picker_date.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
@stop

@section('content')


<div class="card card-body">
    <div class="d-flex justify-content-between">
        <h4>List of Course Material Plan</h4>
        <a href="{{ route('materialplan.create',['material_detail_id'=>$material_detail_id,'material_id'=>$material_id]) }}" class="btn bg-blue" style="margin-left: 830px;">
            <b><i class="icon-plus2"></i></b> Add Daily Course Material Plan
        </a>
         <a href="{{ route('coursematerialdetail.index',['material_id'=>$material_id]) }}" class="btn bg-warning">
            <b><i class="icon-esc"></i></b> Back To Course Material Detail
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
                    <th>Material Plan Title</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($materialplan->total() != 0)
                @foreach($materialplan as $key => $value)
                <tr>
                    <td>{{$materialplan->firstItem() +$key}}</td>
                    <td>{{ optional($value->coursematerialdetail->courseMaterial->courseInfo)->course_program_title }}</td>
                    <td>{{ optional($value->coursematerialdetail->courseMaterial)->material_title }}</td>
                    <td>{{ optional($value->coursematerialdetail)->material_topic }}</td>
                    <td>{{ $value->plan_title }}</td>
                    <td>

                        <a class="btn bg-info btn-icon rounded-round" href="{{ route('materialplan.edit',['material_detail_id'=>$material_detail_id,'material_plan_id'=>$value->id,'material_id'=>$material_id]) }}" data-popup="tooltip" data-placement="bottom" data-original-title="Edit Course Material Detail"><i class="icon-pencil"></i></a>

                        <a data-toggle="modal" data-target="#modal_theme_warning" class="btn bg-danger btn-icon rounded-round delete_materialplan" link="{{route('materialplan.delete',['material_detail_id'=>$material_detail_id,'material_plan_id'=>$value->id,'material_id'=>$material_id])}}" data-popup="tooltip" data-placement="bottom" data-original-title="Delete"><i class="icon-bin"></i></a>

                    </td>

            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="5">No Daily Course Material Plan Found !!!</td>
            </tr>
            @endif
        </tbody>

    </table>
</div>
<div class="col-12">
    <span class="float-right pagination align-self-end mt-3">
        {{ $materialplan->links() }}
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

        $('.delete_materialplan').on('click', function() {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });

    });

</script>

@endsection
