@extends('admin::layout')
@section('title')Student Purchase History @stop
@section('breadcrum')Student Purchase History @stop

@section('script')
<script src="{{asset('admin/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
@stop

@section('content') 

<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">List of Student Purchase History</h5>
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
                    <th>Course Fee</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @if($student_purchase->total() != 0) 
                @foreach($student_purchase as $key => $value)

                <tr>
                    <td>{{$student_purchase->firstItem() +$key}}</td>
                    <td>{{ optional($value->studentInfo)->full_name }}</td>
                    <td>{{ optional($value->courseInfo)->course_program_title }}</td>
                    <td>{{ optional($value->courseInfo)->course_fee }}</td>
                    <td>{{ date('d M, Y',strtotime($value->created_at)) }}</td>
       
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6">No Student Purchase History Found !!!</td>
                </tr>
                @endif
            </tbody>

        </table>

        <span style="margin: 5px;float: right;">
            @if($student_purchase->total() != 0)
                {{ $student_purchase->links() }}
            @endif
            </span>
    </div>
</div>

@endsection