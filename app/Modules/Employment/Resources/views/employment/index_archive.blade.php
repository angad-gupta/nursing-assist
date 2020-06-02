@extends('admin::layout')
@section('title')Archived Employment @stop
@section('breadcrum')Archived Employment @stop

@section('script')
    <script src="{{asset('admin/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
@stop

@section('content')
    <div class="card">
        <div class="card-body d-sm-flex align-items-sm-center justify-content-sm-between flex-sm-wrap">
            <a href="{{ route('employment.index') }}" class="btn bg-warning-400"><i class="icon-arrow-left16"></i> Back To Active Employee</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card card-body border-top-primary">
                <div class="text-center">

                    {!! Form::model($employments,['method'=>'GET','route'=>['employment.indexArchive'],'class'=>'form-horizontal','role'=>'form','files'=>true]) !!}
                    @include('employment::employment.partial.search-department')
                    {!! Form::close() !!}

                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card card-body border-top-primary">
                <div class="text-center">
                    {!! Form::model($employments,['method'=>'GET','route'=>['employment.indexArchive'],'class'=>'form-horizontal','role'=>'form','files'=>true]) !!}
                    @include('employment::employment.partial.search-designation')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card card-body border-top-primary">
                <div class="text-center">
                    {!! Form::model($employments,['method'=>'GET','route'=>['employment.indexArchive'],'class'=>'form-horizontal','role'=>'form','files'=>true]) !!}
                    @include('employment::employment.partial.search')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


    <div class="row">

        @if($employments->total() != 0)
            @foreach($employments as $key => $value)

                @php
                    if($value->profile_pic !=''){
                    $imagePath = asset($value->file_full_path).'/'.$value->profile_pic;
                    }else{
                    $imagePath = asset('admin/default.png');
                    }
                @endphp

                <div class="col-xl-2 col-sm-6">
                    <div class="card">
                        <div class="card-img-actions mx-1 mt-1 text-center">
                            <figure style="height:150px; width:150px; margin: 20px auto 0; "  class="text-center">
                                <img class="rounded-round"  style="width: 100%; height: 100%; object-fit: cover; border: 1px solid #eeeeec" src="{{$imagePath}}" alt="">
                            </figure>
                        </div>

                        <div class="card-body text-center">
                            <h6 class="font-weight-semibold mb-0"><a href="javascript:void(0)" class="text-warning">{{ $value->first_name .' '. $value->last_name }}</a></h6>
                            <span class="d-block text-muted">{{ $value->designation->designation_name }}</span>

                            <ul class="list-inline list-inline-condensed mt-3 mb-0">
                                <li class="list-inline-item">
                                    @if($value->status == '1')
                                        <a data-toggle="modal" data-target="#modal_theme_warning_status" class="btn btn-outline bg-success btn-icon text-success border-success border-2 rounded-round status_employee" link="{{route('employment.update.status.archive.user',$value->id)}}" data-popup="tooltip" data-placement="bottom" data-original-title="Move To Archive">
                                            Move To Archive
                                        </a>
                                    @else
                                        <a data-toggle="modal" data-target="#modal_theme_warning_status" class="btn btn-outline bg-danger btn-icon text-danger border-danger border-2 rounded-round status_employee" link="{{route('employment.update.status.archive.user',$value->id)}}" data-popup="tooltip" data-placement="bottom" data-original-title="Move To Active Status">
                                        Move To Active
                                        </a>
                                    @endif
                                        <a data-toggle="modal" data-target="#archive_message" class="btn btn-outline bg-success btn-icon text-success border-success border-2 rounded-round archive_message" employee_id="{{$value->id}}" data-popup="tooltip" data-placement="bottom" data-original-title="Archive Resaon">
                                            <i class="icon-basket"></i>
                                        </a>

                                </li>
                            </ul>
                        </div>
                         @php
                            if($value->status == '1'){
                            $status = 'Active';
                            $color = 'bg-success-400';
                            }else{
                            $status = 'InActive';
                            $color = 'bg-danger-400';
                            }
                            @endphp
                            <div class="ribbon-container">
                                <div class="ribbon {{$color}}">
                                    <a class="text-light" href="javascript:void(0)" data-popup="tooltip" data-original-title="Employee Status" data-placement="bottom">{{$status}}</a>
                                </div>
                            </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <span style="margin: 5px;float: right;">
    @if($employments->total() != 0)
            {{ $employments->links() }}
        @endif
</span>

    <!-- Warning modal -->
    <div id="modal_parent_link" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h6 class="modal-title">Select Respective Department Head</h6>
                </div>

                <div class="modal-body">
                    {!! Form::open(['route'=>'employment.updateType','method'=>'POST','class'=>'form-horizontal','role'=>'form','files' => true]) !!}

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Select Parent Dept:</label>
                        <div class="col-lg-9">
                            <select name="parent_id" class="form-control">
                                @php
                                    $HeadInfo = App\Modules\Employment\Entities\Employment::getHeadDept();
                                @endphp

                                @foreach($HeadInfo as $key => $value)
                                    @php
                                        $user_type_explode = ucfirst(str_replace("_"," ",$value['user_type']));
                                    @endphp
                                    <option value="{{$value['id']}}">{{$value['first_name'].' :: '.$user_type_explode}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    {{ Form::hidden('employerId', '', array('class' => 'employerId')) }}

                    <div class="text-center">
                        <button type="submit" class="create_user_access btn bg-success">Link User</button>
                        <button type="button" class="btn bg-danger" data-dismiss="modal">Close</button>
                    </div>

                    {!! Form::close() !!}

                </div>

                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!-- warning modal -->


    <!-- Warning modal -->
    <div id="archive_message" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h6 class="modal-title">Archive Employee Reason</h6>
                </div>

                <div class="modal-body archive_message_data">

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- warning modal -->


    <!-- Warning modal -->
    <div id="modal_theme_warning_status" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h6 class="modal-title">Are You Sure Want To Move On Active State ?</h6>
                </div>

                <div class="modal-body">
                    <a class="btn btn-success get_link" href="">Yes</a> &nbsp; | &nbsp;
                    <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- warning modal -->



    <!-- Warning modal -->
    <div id="modal_theme_success" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-pink-800">
                    <h6 class="modal-title">Create Employer User Access</h6>
                </div>

                <div class="modal-body">

                    {!! Form::open(['route'=>'employment.createUser','method'=>'POST','class'=>'form-horizontal','role'=>'form','files' => true]) !!}

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">User Name:</label>
                        <div class="col-lg-6">
                            {!! Form::text('username', $value = null, ['id'=>'username','placeholder'=>'Enter User Name','class'=>'form-control','required'=>'required','pattern'=>'.{5,}','title'=>'5 characters minimum']) !!}
                            {{ Form::hidden('user_exist', '0', array('class' => 'user_exist')) }}
                            <span class="error_username"></span>
                        </div>
                        <div class="col-lg-3">
                            <button type="button" class="check_available btn bg-success">Check Availability</button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Email:</label>
                        <div class="col-lg-9">
                            {!! Form::email('email', $value = null, ['id'=>'email','placeholder'=>'Enter Email','class'=>'form-control','required'=>'required']) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Password:</label>
                        <div class="col-lg-9">
                            {!! Form::text('password', $value = null, ['id'=>'password','placeholder'=>'Enter Password','class'=>'form-control','required'=>'required','pattern'=>'.{8,}','title'=>'8 characters minimum']) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">Department Belongs</label>
                        <div class="col-lg-9">

                            {!! Form::select('department',[ '0'=>'Marketing Dept','1'=>'Technical Dept'], $value = null, ['id'=>'department','class'=>'form-control']) !!}

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3">User Type:</label>
                        <div class="col-lg-9">
                            {!! Form::select('user_type',$user_type, $value = null, ['id'=>'user_type','class'=>'form-control']) !!}
                        </div>
                    </div>

                    <fieldset>
                        <legend class="text-uppercase font-size-sm font-weight-bold">Assign Role</legend>
                        <div class="form-group">
                            <label class="d-block font-weight-semibold">Role :</label>
                            @foreach($roles as $key => $val)
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="role_id[]" value="{{$key}}" class='form-check-input' /> {{$val}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </fieldset>

                    {{ Form::hidden('employer_id', '', array('class' => 'employer_id')) }}

                    <div class="text-center">
                        <button type="submit" class="create_user_access btn bg-success">Create User Access</button>
                        <button type="button" class="btn bg-danger" data-dismiss="modal">Close</button>
                    </div>

                    {!! Form::close() !!}


                </div>

                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!-- warning modal -->

    <script type="text/javascript">
        $('document').ready(function() {
            $('.delete_employeen').on('click', function() {
                var link = $(this).attr('link');
                $('.get_link').attr('href', link);
            });

            $('.archive_message').on('click', function() {
                var employee_id = $(this).attr('employee_id');//archive_message_data
                $.ajax({
                    type: 'GET',
                    url: '/admin/employment/archive/'+employee_id,
                    success: function (data) {
                        $('.archive_message_data').html(data);
                    }
                });
            });

            $('.status_employee').on('click', function() {
                var link = $(this).attr('link');
                $('.get_link').attr('href', link);
            });

            $('.user_parent_link').on('click', function() {
                var empId = $(this).attr('empId');
                $('.employerId').val(empId);
            });

            $('.employer_user_access').on('click', function() {
                var emp_id = $(this).attr('emp_id');
                $('.employer_id').val(emp_id);
            });

            $('.check_available, .create_user_access').on('click', function(event) {

                var username = $('#username').val();
                var user_exist = $('.user_exist').val();

                if (user_exist == '1') {
                    $('#username').focus();
                    event.preventDefault();
                }

                $.ajax({
                    type: 'GET',
                    url: 'employment/checkAvailability',
                    data: {
                        username: username
                    },
                    async: false,
                    success: function(data) {

                        if (data == 1) {
                            $('#username').css('border-color', 'red');
                            $('.error_username').html('<i class="icon-thumbs-down3 mr-1"></i> Username Already Exists.');
                            $('.error_username').removeClass('text-success');
                            $('.error_username').addClass('text-danger');
                            $('.user_exist').val('1');
                            $('#username').focus();
                            event.preventDefault();
                        } else {
                            $('#username').css('border-color', 'green');
                            $('.error_username').html('<i class="icon-thumbs-up3 mr-1"></i>User Available.');
                            $('.error_username').removeClass('text-danger');
                            $('.error_username').addClass('text-success');
                            $('.user_exist').val('0');
                        }

                    }
                });
            });

        });

    </script>

@endsection
