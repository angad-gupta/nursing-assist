@extends('admin::layout')
@section('title')Student Quiz Result @stop
@section('breadcrum')Student Quiz Result @stop

@section('script')
<script src="{{asset('admin/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
@stop

@section('content') 

<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">List of Student Quiz Result</h5>
         <div class="text-right">
           
            <a href="{{ route('student.index') }}" class="btn bg-warning">
            <b><i class="icon-esc"></i></b> 
            </a>
        </div>
    </div> 
 
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr class="bg-slate">
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Course</th>
                    <th>Date</th>
                    <th>Lesson Title</th>
                    <th>Total Question</th>
                    <th>Correct Answer</th>
                    <th>Pecentage</th>
                </tr>
            </thead>
            <tbody>
                @if($student_quiz->total() != 0) 
                @foreach($student_quiz as $key => $value)

                <tr>
                    <td>{{$student_quiz->firstItem() +$key}}</td>
                    <td>{{ optional($value->studentInfo)->full_name }}</td>
                    <td>{{ optional($value->courseInfo)->course_program_title }}</td>
                    <td>{{ date('d M, Y',strtotime($value->date)) }}</td>
                    <td>{{ optional($value->courseContentInfo)->lesson_title }}</td>
                    <td>{{$value->total_question}}</td>
                    <td>{{$value->score}}</td>
                    <td>{{$value->percent}} %</td>
       
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="7">No Student Quiz Result Found !!!</td>
                </tr>
                @endif
            </tbody>

        </table>

        <span style="margin: 5px;float: right;">
            @if($student_quiz->total() != 0)
                {{ $student_quiz->links() }}
            @endif
            </span>
    </div>
</div>

@endsection