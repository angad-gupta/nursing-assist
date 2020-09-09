@extends('admin::layout')
@section('title')Student Practice Test Result @stop
@section('breadcrum')Student Practice Test Result @stop

@section('script')
<script src="{{asset('admin/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
@stop

@section('content') 

<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">List of Student Practice Test Result</h5>
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
                    <th>Date</th>
                    <th>Total Question</th>
                    <th>Correct Answer</th>
                    <th>Pecentage</th>
                </tr>
            </thead>
            <tbody>
                @if($practice_results->total() != 0) 
                @foreach($practice_results as $key => $value)

                <tr>
                    <td>{{$practice_results->firstItem() +$key}}</td>
                    <td>{{ optional($value->student)->full_name }}</td>
                    <td>{{ date('d M, Y',strtotime($value->date)) }}</td>
                    <td>{{$value->total_question}}</td>
                    <td>{{$value->correct_answer}}</td>
                    <td>{{$value->percent}} %</td>
       
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="7">No Data Found !!!</td>
                </tr>
                @endif
            </tbody>

        </table>

        <span style="margin: 5px;float: right;">
            @if($practice_results->total() != 0)
            {{ $practice_results->appends(request()->except('page'))->links()  }}
            @endif
        </span>
    </div>
</div>

@endsection