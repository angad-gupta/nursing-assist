@extends('admin::layout')
@section('title')Student @stop
@section('breadcrum')Student @stop

@section('script')
<script src="{{asset('admin/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
@stop

@section('content') 

<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">List of Student</h5>

    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr class="bg-slate">
                    <th>#</th>
                    <th>Profile Pic</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Email Address</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($student->total() != 0) 
                @foreach($student as $key => $value)

                @php
                $image = ($value->profile_pic) ? asset($value->file_full_path).'/'.$value->profile_pic : asset('admin/default.png');
                @endphp
                <tr>
                    <td>{{$student->firstItem() +$key}}</td>
                    <td><a target="_blank" href="{{ $image }}"><img src="{{ $image }}" style="width: 50px;"></a></td>
                    <td>{{ $value->full_name }}</td>
                    <td>{{ $value->username }}</td>
                    <td>{{ $value->email }}</td>
                     <td class="{{ ($value->active == '1') ? 'text-success font-weight-bold' :'text-danger font-weight-bold' }}">{{ ($value->active == '1') ? 'Active' :'In-Active' }}</td>
                    <td>

                    <a data-toggle="modal" data-target="#modal_theme_status" class="btn bg-success-400 btn-icon rounded-round update_status" student_id="{{ $value->id}}" data-popup="tooltip" data-original-title="Status Update" data-placement="bottom"><i class="icon-flip-horizontal2"></i></a>

                    <a class="btn bg-warning btn-icon rounded-round" href="{{ route('studentcourse.index',['student_id'=> $value->id]) }}" data-popup="tooltip" data-placement="bottom" data-original-title="My Courses"><i class="icon-package"></i></a>

                    <a class="btn bg-teal btn-icon rounded-round" href="{{ route('studentpurchase.index',['student_id'=> $value->id]) }}" data-popup="tooltip" data-placement="bottom" data-original-title="Purchase History"><i class="icon-basket"></i></a>

                    <a class="btn bg-info btn-icon rounded-round" href="{{ route('coursematerial.edit',$value->id) }}" data-popup="tooltip" data-placement="bottom" data-original-title="Quiz Result"><i class="icon-clipboard6"></i></a>

                    <a data-toggle="modal" data-target="#modal_theme_warning" class="btn bg-danger-400 btn-icon rounded-round delete_student" link="{{route('student.delete',$value->id)}}" data-popup="tooltip" data-original-title="Delete" data-placement="bottom"><i class="icon-bin"></i></a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6">No Student Found !!!</td>
                </tr>
                @endif
            </tbody>

        </table>

        <span style="margin: 5px;float: right;">
            @if($student->total() != 0)
                {{ $student->links() }}
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

<!-- Warning modal -->
<div id="modal_theme_status" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title">Student Status</h4>
            </div>
            <div class="modal-body">
            {!! Form::open(['route'=>'student.status','method'=>'POST','id'=>'team_submit','class'=>'form-horizontal','role'=>'form','files' => true]) !!}
                <div class="form-group row">
                    <label class="col-form-label col-lg-3">Select Status:</label>
                    <div class="col-lg-9">
                         {!! Form::select('active',[ '0'=>'In-Active','1'=>'Active'], $value = null, ['id'=>'active','class'=>'form-control','placeholder'=>'--Select Student Status--']) !!}
                    </div>

                {{ Form::hidden('student_id', '',['class'=>'student_id']) }}

                </div>
                <div class="text-right">
                    <button type="submit" class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i class="icon-database-insert"></i></b> Update</button>
                </div>
                 {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!-- /warning modal -->

<!-- /warning modal -->

    
<script type="text/javascript">
    $('document').ready(function() {
        $('.delete_student').on('click', function() {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });

         $('.update_status').on('click', function() {
            var student_id = $(this).attr('student_id');
            $('.student_id').val(student_id);
        });

    });

</script>

@endsection