@extends('admin::layout')
@section('title')Resource Management @stop
@section('breadcrum')Resource Information @stop

@section('script')
<script src="{{ asset('admin/global/js/plugins/pickers/daterangepicker.js')}}"></script>
<script src="{{ asset('admin/global/js/demo_pages/picker_date.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
@stop

@section('content')

<div class="card card-body">
    <div class="d-flex justify-content-between">
        <h4>List of Resource Information</h4>
        <a href="{{ route('resource.create') }}" class="btn bg-blue">
            <i class="icon-plus2"></i> Add Resource Information
        </a>
    </div>
    <div class="mb-3 mt-3"></div>
    <div class="table-responsive table-card">
        <table class="table table-striped">
            <thead>
                <tr class="bg-slate">
                    <th>#</th>
                    <th>Title</th>
                    <th>File Type</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($resources->total() != 0)
                @foreach($resources as $key => $value)
                <tr>
                    <td>{{$resources->firstItem() +$key}}</td>
                    <td>{{ $value->title }}</td>
                    <td>
                        @if(strpos($value->mime_type, 'image') !== false)
                           Image
                        @elseif(strpos($value->mime_type, 'video') !== false)
                           Video
                        @elseif(strpos($value->mime_type, 'wordprocessing') !== false)
                            Word
                        @elseif(strpos($value->mime_type, 'presentation') !== false)
                            Powerpoint
                        @elseif(strpos($value->mime_type, 'pdf') !== false)
                            Pdf
                        @elseif(strpos($value->mime_type, 'spreadsheet') !== false)
                            Excel
                        @elseif(strpos($value->mime_type, 'plain') !== false)
                            Plain Text
                        @endif
                    </td>
                    <td
                        class="{{ ($value->status == 1) ? 'text-success font-weight-bold' :'text-danger font-weight-bold' }}">
                        {{ $value->status == 1 ? 'Active' :'In-Active' }}
                    </td>
                    <td>
                        <a class="btn bg-info btn-icon rounded-round" href="{{ route('resource.edit',$value->id) }}" data-popup="tooltip" data-placement="bottom" data-original-title="Edit Course Info"><i class="icon-pencil"></i></a>
                        <a data-toggle="modal" data-target="#modal_theme_warning" class="btn bg-danger btn-icon rounded-round delete_resource" link="{{route('resource.delete',$value->id)}}" data-popup="tooltip" data-placement="bottom" data-original-title="Delete"><i class="icon-bin"></i></a>
                    </td>

            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="5">No Data Found !!!</td>
            </tr>
            @endif
        </tbody>

    </table>
</div>
<div class="col-12">
    <span class="float-right pagination align-self-end mt-3">
        {{ $resources->links() }}
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

        $('.delete_resource').on('click', function() {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });

    });

</script>

@endsection
