@extends('admin::layout')
@section('title')Student Mockup Result @stop
@section('breadcrum')Student Mockup Result @stop

@section('script')
<script src="{{asset('admin/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
@stop

@section('content') 

<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">List of Student Mockup Result</h5>
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
                    <th>Mockup Title</th>
                    <th>Date</th>
                    <th>Total Question</th>
                    <th>Correct Answer</th>
                    <th>Pecentage</th>
                </tr>
            </thead>
            <tbody>
                @if($student_mockup->total() != 0) 
                @foreach($student_mockup as $key => $value)

                <tr>
                    <td>{{$student_mockup->firstItem() +$key}}</td>
                    <td>{{ optional($value->studentInfo)->full_name }}</td>
                    <td>{{ ucfirst(str_replace('_',' ',$value->mockup_title)) }}</td>
                    <td>{{ date('d M, Y',strtotime($value->date)) }}</td>
                    <td>{{$value->total_question}}</td>
                    <td>{{$value->correct_answer}}</td>
                    <td>{{$value->percent}} %</td>
       
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="7">No Student Mockup Result Found !!!</td>
                </tr>
                @endif
            </tbody>

        </table>

        <span style="margin: 5px;float: right;">
            @if($student_mockup->total() != 0)
                {{ $student_mockup->links() }}
            @endif
            </span>
    </div>
</div>

@endsection