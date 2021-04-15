@extends('admin::layout')
@section('title')Student @stop
@section('breadcrum')Student @stop

@section('script')
<script src="{{asset('admin/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>

<script type="text/javascript">
    $('document').ready(function () {
        $('.delete_student').on('click', function () {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });

        $('.update_status').on('click', function () {
            var student_id = $(this).attr('student_id');
            $('.student_id').val(student_id);
        });

        $('.select-search').select2();

        $('#sort_by').on('change', function () {
            var sort_by = $(this).val(); 

            var url = window.location.href;    
            if (url.indexOf('?') > -1){
                var href = new URL(url);
                href.searchParams.set('sort_by', sort_by);
                url =href.toString();
            }else{
                url += '?sort_by='+sort_by
            }
            window.location.href = url;
        })

        $('#latest_sort_by').on('change', function () {
            var sort_by = $(this).val(); 

            var url = window.location.href;    
            if (url.indexOf('?') > -1){
                var href = new URL(url);
                href.searchParams.set('sort_by', sort_by);
                url =href.toString();
            }else{
                url += '?latest_sort_by='+sort_by
            }
            window.location.href = url;
        })

        {{--$('#headerTable').DataTable( {
            //"sorting": true,
            "filter":false,
            //"info": false,
            "paging": false
            rowReorder: true,
            columnDefs: [
                { orderable: true, className: 'reorder', targets: 2 },
                { orderable: false, targets: '_all' }
            ]
            //"order": [[ 3, "desc" ]]
        });--}}
    });

</script>
@stop

@section('content')

@include('student::student.partial.filter')

<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">List of Student</h5>
        <div class="text-right">

            <a href="{{ route('student.indexArchive') }}" class="btn bg-warning">
                <b>Archived Students</b>
            </a>
        </div>
        <div class="header-elements">

            <div class="form-group row">
                <div class="input-group">
                    {!! Form::select('sort_by', ['updated_at' => 'Latest Student Enrollment'], request('latest_sort_by') ?? null, ['id'=>'latest_sort_by','placeholder'=>'Filter Latest','class'=>'form-control']) !!}
                    {!! Form::select('sort_by', ['asc' => 'A-Z', 'desc' => 'Z-A'], request('sort_by') ?? null, ['id'=>'sort_by','placeholder'=>'Sort Full Name By','class'=>'form-control']) !!}
                </div>
            </div>
        </div>

    </div>

    <div class="table-responsive">
        <table class="table table-striped" id="headerTable">
            <thead>
                <tr class="bg-slate"> 
                    <th class="no-sort">#</th>
                    <th class="no-sort">Profile Pic</th>
                    <th>Full Name</th>
                    <th class="no-sort">Username</th>
                    <th class="no-sort">Email Address</th>
                    <th class="no-sort">Intake Month</th>
                    <th class="no-sort">Agency</th>
                    <th class="no-sort">Practice Lesson Title</th>
                    <th class="no-sort">Status</th>
                    <th class="no-sort">Action</th>
                </tr>
            </thead>
            <tbody>
               
                @if($student->total() != 0)
                @inject('enrol_repo', '\App\Modules\Enrolment\Repositories\EnrolmentRepository')
                @inject('student_quiz', '\App\Modules\Student\Repositories\StudentRepository')
                @foreach($student as $key => $value)

                @php
                $image = ($value->profile_pic) ? asset($value->file_full_path).'/'.$value->profile_pic : asset('admin/default.png');
                $latest_enrol = $enrol_repo->getLatestByStudent($value->id);  
                $latest_quiz = $student_quiz->getLatestQuizByStudent($value->id);

                if($latest_enrol){
                $agent_name = ($latest_enrol->agents == '999') ? ($latest_enrol->other_agent) : optional($latest_enrol->agent)->agent_name;
                

                @endphp
                <tr> 
                    <td>{{$value->id}}</td>
                    <td><a target="_blank" href="{{ $image }}"><img src="{{ $image }}" style="width: 50px;"></a></td>
                    <td><a class="text-teal font-weight-semibold" href="{{route('student.profile',['student_id'=>$value->id])}}">{{ $value->full_name }}</a></td>
                    <td><a class="text-teal font-weight-semibold" href="{{route('student.profile',['student_id'=>$value->id])}}">{{ $value->username }}</a></td>
                    <td><a class="text-teal font-weight-semibold" href="{{route('student.profile',['student_id'=>$value->id])}}">{{ $value->email }}</a></td>
                    <td><a class="text-teal font-weight-semibold" href="{{route('student.profile',['student_id'=>$value->id])}}">{{ !empty($latest_enrol) ? $latest_enrol->intake_date : '-' }} </a></td>
                    <td><a class="text-teal font-weight-semibold" href="{{route('student.profile',['student_id'=>$value->id])}}">{{ $agent_name }}</a></td>
                    <td><a class="text-teal font-weight-semibold" href="{{route('student.profile',['student_id'=>$value->id])}}">{{ !empty($latest_quiz) ? optional($latest_quiz->courseContentInfo)->lesson_title : '-' }}</a></td>
                    <td
                        class="{{ ($value->active == '1') ? 'text-success font-weight-bold' :'text-danger font-weight-bold' }}">
                        {{ ($value->active == '1') ? 'Active' :'In-Active' }}</td>
                    <td>

                        <a data-toggle="modal" data-target="#modal_theme_status"
                            class="btn bg-success-400 btn-icon rounded-round update_status" student_id="{{ $value->id}}"
                            data-popup="tooltip" data-original-title="Status Update" data-placement="bottom"><i
                                class="icon-flip-horizontal2"></i></a>

                        <a class="btn bg-warning btn-icon rounded-round"
                            href="{{ route('studentcourse.index',['student_id'=> $value->id]) }}" data-popup="tooltip"
                            data-placement="bottom" data-original-title="My Courses"><i class="icon-package"></i></a>

                        <a class="btn bg-teal btn-icon rounded-round"
                            href="{{ route('studentpurchase.index',['student_id'=> $value->id]) }}" data-popup="tooltip"
                            data-placement="bottom" data-original-title="Purchase History"><i
                                class="icon-basket"></i></a>

                        <a class="btn bg-pink btn-icon rounded-round"
                            href="{{ route('studentquiz.result',['student_id'=> $value->id]) }}" data-popup="tooltip"
                            data-placement="bottom" data-original-title="Student Quiz Result"><i
                                class="icon-file-presentation "></i></a>

                        <a class="btn bg-violet btn-icon rounded-round"
                            href="{{ route('studentmockup.result',['student_id'=> $value->id]) }}" data-popup="tooltip"
                            data-placement="bottom" data-original-title="Student Mockup Result"><i
                                class="icon-stack-text"></i></a>

                        <a class="btn bg-purple btn-icon rounded-round"
                            href="{{ route('studentpractice.result',['student_id'=> $value->id]) }}" data-popup="tooltip"
                            data-placement="bottom" data-original-title="Student Practice Test Result"><i
                                class="icon-stack-text "></i></a>


                        <a data-toggle="modal" data-target="#modal_theme_warning"
                            class="btn bg-danger-400 btn-icon rounded-round delete_student"
                            link="{{route('student.delete',$value->id)}}" data-popup="tooltip"
                            data-original-title="Delete" data-placement="bottom"><i class="icon-bin"></i></a>
                    </td>
                </tr>
                @php } @endphp
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
            {{ $student->appends(request()->except('page'))->links()  }}
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
                {!! Form::open(['route'=>'student.status','method'=>'POST','id'=>'team_submit','class'=>'form-horizontal','role'=>'form','files'=> true]) !!}
                <div class="form-group row">
                    <label class="col-form-label col-lg-3">Select Status:</label>
                    <div class="col-lg-9">
                        {!! Form::select('active',[ '0'=>'In-Active','1'=>'Active'], $value = null, 
                        ['id'=>'active','class'=>'form-control','placeholder'=>'Select Status']) !!}
                    </div>

                    {{ Form::hidden('student_id', '',['class'=>'student_id']) }}

                </div>
                <div class="text-right">
                    <button type="submit" class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i
                                class="icon-database-insert"></i></b> Update</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!-- /warning modal -->

<!-- /warning modal -->

@endsection
