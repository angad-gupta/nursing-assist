@extends('admin::layout')
@section('title')Course Content @stop
@section('breadcrum')Course Content @stop

@section('script')
<script src="{{ asset('admin/global/js/plugins/pickers/daterangepicker.js')}}"></script>
<script src="{{ asset('admin/global/js/demo_pages/picker_date.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
@stop

@section('content')


<div class="card card-body">
    <div class="d-flex justify-content-between">
        <h4>List of Course Content</h4>
        <a href="{{ route('coursecontent.create') }}" class="btn bg-blue">
            <i class="icon-plus2"></i> Add Course Content
        </a>
    </div>
    <div class="mb-3 mt-3"></div>
    <div class="table-responsive table-card">
        <table class="table table-striped">
            <thead>
                <tr class="bg-slate">
                    <th>#</th>
                    <th>Course Info</th>
                    <th>Syllabus</th>
                    <th>Course Lesson Title</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($coursecontent->total() != 0)
                @foreach($coursecontent as $key => $value)
                <tr>
                    <td>{{$coursecontent->firstItem() +$key}}</td>
                    <td>{{ optional($value->courseInfo)->course_program_title }}</td>
                    <td>{{ optional($value->syllabus)->syllabus_title }}</td>
                    <td>{{ $value->lesson_title }}</td>
                    <td>

                        @if($value->is_related_to_quiz == 1)
                            <a class="btn bg-teal btn-icon rounded-round" href="{{ route('quiz.index',['course_content_id'=>$value->id]) }}" data-popup="tooltip" data-placement="bottom" data-original-title="Course Quiz"><i class="icon-brain"></i></a>
                        @endif
                         <a class="btn bg-success btn-icon rounded-round" href="{{ route('courseplan.index',['course_content_id'=>$value->id]) }}" data-popup="tooltip" data-placement="bottom" data-original-title="Course Plan Setup"><i class="icon-book"></i></a>

                        <a class="btn bg-info btn-icon rounded-round" href="{{ route('coursecontent.edit',$value->id) }}" data-popup="tooltip" data-placement="bottom" data-original-title="Edit Course Info"><i class="icon-pencil"></i></a>

                        <a data-toggle="modal" data-target="#modal_theme_warning" class="btn bg-danger btn-icon rounded-round delete_coursecontent" link="{{route('coursecontent.delete',$value->id)}}" data-popup="tooltip" data-placement="bottom" data-original-title="Delete"><i class="icon-bin"></i></a>

                    </td>

            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="5">No Course Content Found !!!</td>
            </tr>
            @endif
        </tbody>

    </table>
</div>
<div class="col-12">
    <span class="float-right pagination align-self-end mt-3">
        {{ $coursecontent->links() }}
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

        $('.delete_coursecontent').on('click', function() {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });

    });

</script>

@endsection
