@extends('admin::layout')
@section('title')Page @stop
@section('breadcrum')Page @stop

@section('script')
<script src="{{asset('admin/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
@stop

@section('content') 


<div class="card card-body">
    <div class="d-flex justify-content-between">
        <h4>List of Page</h4>
        <a href="{{ route('page.create') }}" class="btn bg-blue">
            <i class="icon-plus2"></i> Add Page
        </a>
    </div>
    <div class="mb-3 mt-3"></div>
    <div class="table-responsive table-card">
        <table class="table table-striped">
            <thead>
                <tr class="bg-slate">
                    <th>#</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Action</th>
                </tr>
            </thead>
           <tbody>
                @if($page->total() != 0) 
                @foreach($page as $key => $value)

                <tr>
                    <td>{{$page->firstItem() +$key}}</td>
                     <td>{{ $value->title }}</td>
                     <td>{{ $value->slug }}</td>
                    <td>

                        <a class="btn bg-teal-400 btn-icon rounded-round" href="{{route('page.edit',$value->id)}}" data-popup="tooltip" data-original-title="Edit" data-placement="bottom"><i class="icon-pencil6"></i></a>

                        <a data-toggle="modal" data-target="#modal_theme_warning" class="btn bg-danger-400 btn-icon rounded-round delete_page" link="{{route('page.delete',$value->id)}}" data-popup="tooltip" data-original-title="Delete" data-placement="bottom"><i class="icon-bin"></i></a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="5">No Page Found !!!</td>
                </tr>
                @endif
            </tbody>

    </table>
</div>
<div class="col-12">
        <span class="float-right pagination align-self-end mt-3">
            {{ $page->links() }}
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

        $('.delete_page').on('click', function() {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });
    });

</script>

@endsection
