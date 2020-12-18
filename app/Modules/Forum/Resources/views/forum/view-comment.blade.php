@extends('admin::layout')
@section('title')Forum Comment @stop
@section('breadcrum')Forum Comment @stop

@section('script')
<script src="{{asset('admin/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
@stop

@section('content') 


<div class="card card-body">
      <div class="d-flex justify-content-between">
        <h4>List of Forum Comment</h4> 
      
        <div class="text-right">
            <a href="{{ route('forum.index') }}" class="btn bg-warning">
            <i class="icon-esc"></i> Back to Forum
            </a>
        </div>
        
    </div>


    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr class="bg-slate">
                    <th>#</th>
                    <th>Forum Title</th>
                    <th>Posted Date</th>
                    <th>Posted By</th>
                    <th width="30%">Comments</th>
                    <th>Comemnt By</th>
                    <th>Comemnt Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($forum_comment->total() != 0) 
                @foreach($forum_comment as $key => $value)

                <tr>
                    <td>{{$forum_comment->firstItem() +$key}}</td>
                     <td>{{ optional($value->forumInfo)->forum_title }}</td>
                     <td>{{ optional($value->forumInfo)->posted_date }}</td>
                     <td>{{ optional($value->forumInfo->studentInfo)->full_name }}</td>
                     <td>{{ $value->comment }}</td>
                     <td>{{ optional($value->commentStudentInfo)->full_name }}</td>
                     <td>{{ $value->commented_date }}</td>
                    <td>
                        <a data-toggle="modal" data-target="#modal_theme_warning" class="btn bg-danger-400 btn-icon rounded-round delete_forum_comment" link="{{route('forum.deleteComment',$value->id)}}" data-popup="tooltip" data-original-title="Delete" data-placement="bottom"><i class="icon-bin"></i></a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="8">No Forum Comment Found !!!</td>
                </tr>
                @endif
            </tbody>

        </table>

        <span style="margin: 5px;float: right;">
            @if($forum_comment->total() != 0)
                {{ $forum_comment->links() }}
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
        $('.delete_forum_comment').on('click', function() {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });
    });

</script>

@endsection