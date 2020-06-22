@extends('admin::layout')
@section('title')Quiz Question @stop
@section('breadcrum')Quiz Question @stop

@section('script')
<script src="{{ asset('admin/global/js/plugins/pickers/daterangepicker.js')}}"></script>
<script src="{{ asset('admin/global/js/demo_pages/picker_date.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
@stop

@section('content') 


<div class="card card-body">
    <div class="d-flex justify-content-between">
        <h4>List of Quiz Question</h4>
        <a href="{{ route('quiz.create') }}" class="btn bg-blue">
            <i class="icon-plus2"></i> Add Quiz Question
        </a>
    </div>
    <div class="mb-3 mt-3"></div>
    <div class="table-responsive table-card">
        <table class="table table-striped">
            <thead>
                <tr class="bg-slate">
                    <th>#</th>
                    <th>Quiz Category</th>
                    <th>Quiz Question Type</th>
                    <th>Quiz Type</th>
                    <th width="60%">Quiz Question</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($quiz->total() != 0)
                @foreach($quiz as $key => $value)
                <tr>
                    <td>{{$quiz->firstItem() +$key}}</td>
                    <td>{{ $value->category }}</td>
                    <td>{{ $value->question_type }}</td>
                    <td>{{ $value->quiz_section }}</td>
                    <td>{{ $value->question }}</td>
                    <td>

                        <a class="btn bg-info btn-icon rounded-round" href="{{ route('quiz.edit',$value->id) }}" data-popup="tooltip" data-placement="bottom" data-original-title="Edit Course Info"><i class="icon-pencil"></i></a>

                        <a data-toggle="modal" data-target="#modal_theme_warning" class="btn bg-danger btn-icon rounded-round delete_quiz" link="{{route('quiz.delete',$value->id)}}" data-popup="tooltip" data-placement="bottom" data-original-title="Delete"><i class="icon-bin"></i></a>

                    </td>

            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="5">No Quiz Question Found !!!</td>
            </tr>
            @endif
        </tbody>

    </table>
</div>
<div class="col-12">
    <span class="float-right pagination align-self-end mt-3">
        {{ $quiz->links() }}
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

        $('.delete_quiz').on('click', function() {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });

    });

</script>

@endsection
