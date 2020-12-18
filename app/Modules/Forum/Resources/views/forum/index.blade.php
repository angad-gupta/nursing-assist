@extends('admin::layout')
@section('title')Forum @stop
@section('breadcrum')Forum @stop

@section('script')
<script src="{{asset('admin/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
@stop

@section('content') 

<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">List of Forum</h5>

    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr class="bg-slate">
                    <th>#</th>
                    <th>Forum Title</th>
                    <th>Posted Date</th>
                    <th>Posted By</th>
                    <th>Is Top Topic ?</th>
                    <th>Is Featured Topic ?</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($forum_info->total() != 0) 
                @foreach($forum_info as $key => $value)

                <tr>
                    <td>{{$forum_info->firstItem() +$key}}</td>
                     <td>{{ $value->forum_title }}</td>
                     <td>{{ $value->posted_date }}</td>
                     <td>{{ optional($value->studentInfo)->full_name }}</td>
                    <td class="{{ ($value->is_top_topic == '1') ? 'text-success font-weight-bold' :'text-danger font-weight-bold' }}">{{ ($value->is_top_topic == '1') ? 'Yes' :'No' }}</td>
                    <td class="{{ ($value->is_featured_topic == '1') ? 'text-success font-weight-bold' :'text-danger font-weight-bold' }}">{{ ($value->is_featured_topic == '1') ? 'Yes' :'No' }}</td>
                    <td>
                        <a class="btn bg-teal-400 btn-icon rounded-round" href="{{route('forum.comment',$value->id)}}" data-popup="tooltip" data-original-title="View Comments" data-placement="bottom"><i class="icon-bubbles4"></i></a>

                        <a class="btn bg-success-400 btn-icon rounded-round" href="{{route('forum.edit',$value->id)}}" data-popup="tooltip" data-original-title="Edit" data-placement="bottom"><i class="icon-pencil6"></i></a>

                        <a data-toggle="modal" data-target="#modal_theme_warning" class="btn bg-danger-400 btn-icon rounded-round delete_forum" link="{{route('forum.delete',$value->id)}}" data-popup="tooltip" data-original-title="Delete" data-placement="bottom"><i class="icon-bin"></i></a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6">No Forum Found !!!</td>
                </tr>
                @endif
            </tbody>

        </table>

        <span style="margin: 5px;float: right;">
            @if($forum_info->total() != 0)
                {{ $forum_info->links() }}
            @endif
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

<!-- /warning modal -->

    
<script type="text/javascript">
    $('document').ready(function() {
        $('.delete_forum').on('click', function() {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });
    });

</script>

@endsection