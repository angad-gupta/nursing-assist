@extends('admin::layout')
@section('title')Dashboard @stop
@section('breadcrum')Dashboard @stop
@section('content')


    <!-- Main content -->
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-header page-header-dark mb-0" style="background-color: #933873;">
                    <div class="page-header-content header-elements-inline px-3">
                        <div class="page-title">
                            <h5>
                                <i class="icon-arrow-left52 mr-2"></i>
                                <span class="font-weight-semibold">Welcome To Nursing Education &amp; Training Australia(NETA) CMS</span></h5>
                        </div>

                    </div>

                    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline px-3">
                        <div class="d-flex">
                            <div class="breadcrumb">
                                <a href="https://nursingeta.com/admin/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content area -->
        <div class="content">

            <section class="quick-links">
                <div class="row">
                    <div class="col-xl-2">
                        <a href="{{route('student.index')}}">
                            <div class="card bd-card card-body bd-card-body bg-gradient-green pt-4 pb-4">
                                <div class="text-center bd-card-info">
                                    <i class="icon-users4 icon-3x rounded-round pb-1"></i>
                                    <h6 class="m-0 font-weight-semibold">Students</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-2">
                        <a href="{{route('enrolment.index')}}">
                            <div class="card bd-card card-body bd-card-body bg-gradient-green-2 pt-4 pb-4">
                                <div class="text-center bd-card-info">
                                    <i class="icon-clipboard3 icon-3x rounded-round pb-1"></i>
                                    <h6 class="m-0 font-weight-semibold">Enrollment</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-2">
                        <a href="{{route('team.index')}}">
                            <div class="card bd-card card-body bd-card-body bg-gradient-blue pt-4 pb-4">
                                <div class="text-center bd-card-info">
                                    <i class="icon-collaboration icon-3x rounded-round pb-1"></i>
                                    <h6 class="m-0 font-weight-semibold">Teams</h6>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-2">
                        <a href="{{route('agent.index')}}">
                            <div class="card bd-card card-body bd-card-body bg-gradient-brown pt-4 pb-4">
                                <div class="text-center bd-card-info">
                                    <i class="icon-user-tie icon-3x rounded-round pb-1"></i>
                                    <h6 class="m-0 font-weight-semibold">Agents</h6>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-2">
                        <a href="{{route('syllabus.index')}}">
                            <div class="card bd-card card-body bd-card-body bg-gradient-purple pt-4 pb-4">
                                <div class="text-center bd-card-info">
                                    <i class="icon-menu2 icon-3x rounded-round pb-1"></i>
                                    <h6 class="m-0 font-weight-semibold">Syllabus</h6>
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="col-xl-2">
                        <a href="{{route('resource.index')}}">
                            <div class="card bd-card card-body bd-card-body bg-gradient-red pt-4 pb-4">
                                <div class="text-center bd-card-info">
                                    <i class="icon-folder2 icon-3x rounded-round pb-1"></i>
                                    <h6 class="m-0 font-weight-semibold">Resources</h6>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </section>

            <div class="row">
                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body">
                        <div class="media">
                            <div class="mr-3 align-self-center">
                                <i class="icon-user icon-3x text-success-400"></i>
                            </div>

                            <div class="media-body text-right">
                                <h3 class="font-weight-semibold mb-0">{{number_format($students->total())}}</h3>
                                <span class="text-uppercase font-size-sm text-muted">total Students</span>
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body">
                        <div class="media">
                            <div class="mr-3 align-self-center">
                                <i class="icon-clipboard3 icon-3x text-indigo-400"></i>
                            </div>

                            <div class="media-body text-right">
                                <h3 class="font-weight-semibold mb-0">{{number_format($enrolments->total())}}</h3>
                                <span class="text-uppercase font-size-sm text-muted">total enrollment</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body">
                        <div class="media">
                            <div class="media-body">
                                <h3 class="font-weight-semibold mb-0">{{number_format($course->total())}}</h3>
                                <span class="text-uppercase font-size-sm text-muted">total course</span>
                            </div>

                            <div class="ml-3 align-self-center">
                                <i class="icon-book3 icon-3x text-blue-400"></i>
                            </div>
                        </div>
                    </div>
                </div>

                @php
                    $total_registered = 0;
                @endphp
                
                @if($students->total() != 0)
                        @inject('enrol_repo', '\App\Modules\Enrolment\Repositories\EnrolmentRepository')
                            @foreach($students as $key => $value)
                            @php 
                            $is_enrol = $enrol_repo->countStudentEnrol($value->id);
                                   
                            if($is_enrol == 0){   
                                $total_registered +=1; 
                               
                            }
                            @endphp
                            @endforeach
                 @endif
                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body">
                        <div class="media">
                            <div class="media-body">
                                <h3 class="font-weight-semibold mb-0">{{number_format($total_registered)}}</h3>
                                <span class="text-uppercase font-size-sm text-muted">Total Registration</span>
                            </div>

                            <div class="ml-3 align-self-center">
                                <i class="icon-profile icon-3x text-danger-400"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                <div class="row">
                <div class="col-md-12">
                    <div class="card bd-card">
                        <div class="bg-info-600 card-header header-elements-inline">
                            <h5 class="card-title text-uppercase font-weight-semibold">New Enrollment</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped text-nowrap font-size-lg">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student Name</th>
                                    <th>Mobile No.</th>
                                    <th>Intake Date</th>
                                    <th>Agent</th>
                                    <th>Payment Status</th>
                                    <th>Enrollment Status</th>
                                </tr>
                                </thead>
                                <tbody>

                                    @if($enrolments->total() != 0)
                                        @foreach($enrolments as $key => $value)
                                        <tr>
                                        <td>{{$enrolments->firstItem() +$key}}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="mr-3">
                                                    <a href="#" class="btn bg-primary-400 rounded-round btn-icon btn-sm">
                                                        <span class="letter-icon">{{ substr(optional($value->student)->full_name,0,1) }}</span>
                                                    </a>
                                                </div>
                                                <div>
                                                    <a href="#" class="text-default font-weight-semibold letter-icon-title">{{ optional($value->student)->full_name }}</a>
                                                    <div class="text-muted font-size-sm"><i class="icon-envelop5 font-size-sm mr-1"></i>{{ optional($value->student)->email }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ optional($value->student)->phone_no }}</td>
                                        <td>{{ $value->intake_date }}</td>
                                        <td>{{ optional($value->agent)->agent_name ?? 'None' }}</td>
                                        <td class="{{ ($value->payment_status == '1') ? 'text-success font-weight-bold' :'text-danger font-weight-bold' }}">
                                            {{ ($value->payment_status == '1') ? 'Paid' :'Payment Pending' }}
                                        </td>
                                        <td class="text-warning font-weight-bold">{{ $value->status }}</td>
                                    </tr>
                                    @endforeach
                                @else
                                <tr>
                                    <td colspan="7">No Enrolment Found !!!</td>
                                </tr>
                                @endif
                                </tbody>
                            </table>
        
                            <span style="float: right;" class="mr-2 mb-2">

                                   <a href="{{ route('enrolment.index') }}" class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i class="icon-eye4"></i></b>View All</a>
                            </span>

                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card bd-card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title text-uppercase font-weight-semibold">Students Directory</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped font-size-lg">
                            <thead> 
                            <tr>
                                <th>#</th>
                                <th>Profile Pic</th>
                                <th>Full Name</th>
                                <th>Username</th>
                                <th>Email Address</th>
                                <th>Intake Month</th>
                                <th>Agency</th>
                                <th>Practice Lesson Title</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                                @php 
                                $count = 0;
                                @endphp
                                @if($students->total() != 0)
                                @inject('enrol_repo', '\App\Modules\Enrolment\Repositories\EnrolmentRepository')
                                @inject('student_quiz', '\App\Modules\Student\Repositories\StudentRepository')
                                @foreach($students as $key => $value)

                                @php
                                $image = ($value->profile_pic) ? asset($value->file_full_path).'/'.$value->profile_pic : asset('admin/default.png');
                                $latest_enrol = $enrol_repo->getLatestByStudent($value->id);  
                                $latest_quiz = $student_quiz->getLatestQuizByStudent($value->id);

                                if($latest_enrol){
                                $count += 1;

                                if($count <= 10) {
                                @endphp

                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td><a target="_blank" href="{{ $image }}"><img src="{{ $image }}" style="width: 50px;"></a></td>
                                    <td><a class="text-teal font-weight-semibold" href="{{route('student.profile',['student_id'=>$value->id])}}">{{ $value->full_name }}</a></td>
                                    <td><a class="text-teal font-weight-semibold" href="{{route('student.profile',['student_id'=>$value->id])}}">{{ $value->username }}</a></td>
                                    <td><a class="text-teal font-weight-semibold" href="{{route('student.profile',['student_id'=>$value->id])}}">{{ $value->email }}</a></td>
                                    <td><a class="text-teal font-weight-semibold" href="{{route('student.profile',['student_id'=>$value->id])}}">{{ !empty($latest_enrol) ? $latest_enrol->intake_date : '-' }}</a></td>
                                    <td><a class="text-teal font-weight-semibold" href="{{route('student.profile',['student_id'=>$value->id])}}">{{ !empty($latest_enrol) ? optional($latest_enrol->agent)->agent_name : '-' }}</a></td>
                                    <td>{{ !empty($latest_quiz) ? optional($latest_quiz->courseContentInfo)->lesson_title : '-' }}</a></td>
                                    <td class="{{ ($value->active == '1') ? 'text-success font-weight-bold' :'text-danger font-weight-bold' }}">
                                        <a class="text-teal font-weight-semibold" href="{{route('student.profile',['student_id'=>$value->id])}}">{{ ($value->active == '1') ? 'Active' :'In-Active' }}</a>
                                    </td>
                                    <td><a class="text-success font-weight-semibold" href="{{route('student.profile',['student_id'=>$value->id])}}">View Profile</a></td>
                                </tr>
                            
                            @php }} @endphp
                            @endforeach
                            @else
                            <tr>
                                <td colspan="10">No Student Found !!!</td>
                            </tr>
                            @endif

                            </tbody>
                        </table>
                        
                        <span style="float: right;" class="mr-2 mb-2">
                            <a href="{{ route('student.index') }}" class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i class="icon-eye4"></i></b>View All</a>
                        </span>

                    </div>
                </div>
            </div>

        </div>
        <!-- /content area -->


@stop
