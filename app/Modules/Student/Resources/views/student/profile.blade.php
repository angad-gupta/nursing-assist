@extends('admin::layout')    
@section('title') Student Profile @stop 
@section('breadcrum') Student Profile @stop 

@section('script')
<script src="{{ asset('admin/global/js/plugins/pickers/daterangepicker.js')}}"></script>
<script src="{{ asset('admin/global/js/demo_pages/picker_date.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/form_multiselect.js')}}"></script>
<script src="{{ asset('admin/assets/js/plugins/forms/jquery-clock-timepicker.min.js') }}"></script>
<script src="{{asset('admin/global/js/demo_pages/form_inputs.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
<link href="{{asset('admin/assets/extra/app.css')}}" rel="stylesheet" type="text/css">

<script src="{{ asset('admin/global/js/demo_pages/form_select2.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/ui/fab.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/ui/sticky.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/ui/prism.min.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/extra_fab.js')}}"></script>
 <script src="{{ asset('admin/global/js/plugins/uploaders/fileinput/fileinput.min.js')}}"></script>
<script src="{{ asset('admin/global/js/demo_pages/uploader_bootstrap.js')}}"></script>

@stop

@section('content') 


<!-- Top right menu -->
<ul class="fab-menu fab-menu-absolute fab-menu-top-left" data-fab-toggle="hover" id="fab-menu-affixed-demo-right">
    <li>

     <a href="{{ route('student.index') }}" class="fab-menu-btn btn bg-danger btn-float rounded-round btn-icon"><i class="icon-arrow-left15" data-popup="tooltip" data-placement="bottom" data-original-title="Back To Students"></i></a>

 </li>
</ul>
<!-- /top right menu -->

<div class="card bg-light"> 
    <div class="card-body">
        <div class="row tab-content">

        @php
        $imagePath = ($studentInfo->profile_pic) ? asset($studentInfo->file_full_path).'/'.$studentInfo->profile_pic : asset('admin/default.png');


        @endphp
    <div class="col-md-3">
        <div class="card-img-actions mx-1 mt-1 text-center">
            <figure style="height:170px; width:170px; margin: 20px auto 0; " class="text-center">
               <img class="img-fluid rounded-round" style="width: 170px; height: 170px; object-fit: cover; border: 1px solid #eeeeec" src="{{ $imagePath }}" alt="">
           </figure>
       </div>

       <div class="card-body text-center mt-4">
        <h6 class="font-weight-semibold mb-1">{{ $studentInfo->full_name }}</h6>
        <span class="d-block text-muted">{{ $studentInfo->email }}</span>

<!--         <ul class="list-inline list-inline-condensed mt-3 mb-0" style="width: 371px;margin-left: -19px;">
            
            <li class="list-inline-item">
               <a data-toggle="modal" data-target="#modal_vehicle_insurance" class="btn bg-warning text-warning-400 btn-icon rounded-round ml-2" title="My Courses"><i class="text-light-400 icon-package"></i></a>
               <br>
               <span class="text-warning ml-2">Courses</span>
            </li>

            <li class="list-inline-item">
               <a data-toggle="modal" data-target="#modal_vehicle_insurance" class="btn bg-teal text-teal-400 btn-icon rounded-round ml-2" title="Purchase History"><i class="text-light-400 icon-basket"></i></a>
               <br>
               <span class="text-teal ml-2">Purchase</span>
            </li>

            <li class="list-inline-item">
               <a data-toggle="modal" data-target="#modal_vehicle_insurance" class="btn bg-pink text-pink-400 btn-icon rounded-round ml-2" title="Quiz Result"><i class="text-light-400 icon-presentation"></i></a>
               <br>
               <span class="text-pink ml-2">Quiz</span>
            </li>

            <li class="list-inline-item">
               <a data-toggle="modal" data-target="#modal_vehicle_insurance" class="btn bg-violet text-violet-400 btn-icon rounded-round ml-2" title="Mockup Result"><i class="text-light-400 icon-stack-text"></i></a>
               <br>
               <span class="text-violet ml-2">Mockup</span>
            </li>

            <li class="list-inline-item">
               <a  data-target="#bottom-justified-tab5" class="btn bg-purple text-purple-400 btn-icon rounded-round ml-2" title="Practise Test Result"><i class="text-light-400 icon-stack-text "></i></a>
               <br>
               <span class="text-purple ml-2">Practise</span>
            </li>
    </ul> -->
</div>


</div>

            <div class="col-md-9">
                <div class="mb-3">
                        <h4>Detail Information of Student :: <b>{{ $studentInfo->full_name }}</b></h4>
                        <table class='table table-striped table-border-dashed' id='table1' cellspacing='0' width='100%' frame='box' border='0'>
                            <tbody>

                            <tr>
                                <td class='text-dark font-weight-black'>Name : </td>
                                <td width="20%">{{ $studentInfo->full_name }}</td>
                                <td class='text-dark font-weight-black'>Email :</td>
                                <td width="20%">{{ $studentInfo->email }}</td>
                                <td class='text-dark font-weight-black'>Gender :</td>
                                <td width="20%">{{ ucfirst($studentInfo->gender) }}</td>
                            </tr>

                            <tr>
                                <td class='text-dark font-weight-black'>DOB : </td>
                                <td width="20%">{{ $studentInfo->dob }}</td>
                                <td class='text-dark font-weight-black'>Phone No. :</td>
                                <td width="20%">{{ $studentInfo->phone_no }}</td>
                                <td class='text-dark font-weight-black'>Address 1 :</td>
                                <td width="20%">{{ $studentInfo->primary_address }}</td>
                            </tr>
                            
                            <tr>
                                <td class='text-dark font-weight-black'>Address 2 : </td>
                                <td width="20%">{{ $studentInfo->temporary_address }}</td>
                                <td class='text-dark font-weight-black'>Stree No. :</td>
                                <td width="20%">{{ $studentInfo->street_number }}</td>
                                <td class='text-dark font-weight-black'>Street Name:</td>
                                <td width="20%">{{ $studentInfo->street_name }}</td>
                            </tr>
                            
                            <tr>
                                <td class='text-dark font-weight-black'>Suburb : </td>
                                <td width="20%">{{ $studentInfo->suburb }}</td>
                                <td class='text-dark font-weight-black'>PostalCode :</td>
                                <td width="20%">{{ $studentInfo->postalcode }}</td>
                                <td class='text-dark font-weight-black'>State :</td>
                                <td width="20%">{{ $studentInfo->state }}</td>
                            </tr>
                            
                            <tr>
                                <td class='text-dark font-weight-black'>Country : </td>
                                <td width="20%">{{ optional($studentInfo->Country)->name }}</td>
                                <td class='text-dark font-weight-black'>Username :</td>
                                <td width="20%">{{ $studentInfo->username }}</td>
                                <td class='text-dark font-weight-black'>Intake Month :</td>
                                <td width="20%">{{ !empty($enrol_info) ? $enrol_info->intake_date : '-' }}</td>
                            </tr>

                            <tr>
                                <td class='text-dark font-weight-black'>Agency : </td>
                                <td width="20%">{{ !empty($enrol_info) ? optional($enrol_info->agent)->agent_name : '-' }}</td>
                                <td class='text-dark font-weight-black'>Practice Lesson Title :</td>
                                <td width="20%">{{ !empty($quiz_info) ? optional($quiz_info->courseContentInfo)->lesson_title : '-' }}</td>
                                <td class='text-dark font-weight-black'>Status :</td>
                                <td width="20%" class="{{ ($studentInfo->active == '1') ? 'text-success font-weight-bold' :'text-danger font-weight-bold' }}">{{ ($studentInfo->active == '1') ? 'Active' :'In-Active' }}</td>
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
</div>


<!-- SEcondary Section -->

<div class="d-flex align-items-start flex-column flex-md-row">

    <!-- Left Section -->
    <div class="tab-content w-100 order-2 order-md-1">
       <div class="tab-pane fade active show" id="activity">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="height: 978px;overflow: auto;">
                        <div class="card-body"> 
                            <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                <li class="nav-item mb-2"><a href="#bottom-justified-tab1" class=" nav-link active font-weight-semibold text-dark" data-toggle="tab"><i class="text-warning icon-package mr-2"></i>My Courses </a></li>
                                <li class="nav-item mb-2"><a href="#bottom-justified-tab2" class="nav-link font-weight-semibold text-dark" data-toggle="tab"><i class="icon-basket mr-2"  style="color: #009688 !important;"></i>Purchase History</a></li>
                                <li class="nav-item mb-2"><a href="#bottom-justified-tab3" class="nav-link font-weight-semibold text-dark" data-toggle="tab"><i class="icon-presentation mr-2" style="color: #E91E63 !important;"></i>Quiz Result</a></li>
                                <li class="nav-item mb-2"><a href="#bottom-justified-tab4" class="nav-link font-weight-semibold text-dark" data-toggle="tab"><i class="icon-stack-text mr-2"  style="color: #9c27b0 !important;"></i>Mockup Result</a></li>
                                <li class="nav-item mb-2"><a href="#bottom-justified-tab5" class="nav-link font-weight-semibold text-dark" data-toggle="tab"><i class="icon-stack-text mr-2"  style="color: #673AB7 !important;"></i>Practise Test Result</a></li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="bottom-justified-tab1">

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
                                                @if($student_courses->total() != 0) 
                                                @foreach($student_courses as $key => $value)

                                                <tr>
                                                    <td>{{$student_courses->firstItem() +$key}}</td>
                                                    <td>{{ optional($value->studentInfo)->full_name }}</td>
                                                    <td>{{ optional($value->courseInfo)->course_program_title }}</td>
                                                    <td>${{ optional($value->courseInfo)->course_fee }}</td>
                                                    <td>{{ date('d M, Y',strtotime($value->created_at)) }}</td>
                                       
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="6">No Student Course Found !!!</td>
                                                </tr>
                                                @endif
                                            </tbody>

                                        </table>

                                        <span style="margin: 5px;float: right;">
                                            @if($student_courses->total() != 0)
                                                {{ $student_courses->links() }}
                                            @endif
                                            </span>
                                    </div>

                                </div>

                                <div class="tab-pane fade" id="bottom-justified-tab2">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr class="bg-slate">
                                                    <th>#</th>
                                                    <th>Full Name</th>
                                                    <th>Course</th>
                                                    <th>Course Fee</th>
                                                    <th>Status</th>
                                                    <th>Enabled Course</th>
                                                    <th>Amount Paid</th>
                                                    <th>Amount Left</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($student_purchase->total() != 0)
                                                @foreach($student_purchase as $key => $value)

                                                <tr>
                                                    <td>{{$student_purchase->firstItem() +$key}}</td>
                                                    <td>{{ optional($value->studentInfo)->full_name }}</td>
                                                    <td>{{ optional($value->courseInfo)->course_program_title }}</td>
                                                    <td>${{ optional($value->courseInfo)->course_fee }}</td>
                                                    <td class="text-pink"><b>{{ ucfirst($value->status) }}</b></td>
                                                    <td class="{{ ($value->moved_to_student == '1') ? 'text-success font-weight-bold' :'text-warning font-weight-bold' }}">
                                                        {{ ($value->moved_to_student == '1') ? 'Move To Student Course' :'Still Pending' }}
                                                    </td>
                                                    <td>${{ $value->amount_paid }}</td>
                                                    <td>${{ $value->amount_left }}</td>
                                                    <td>{{ date('d M, Y',strtotime($value->created_at)) }}</td>
                                                    <td>
                                                        <a data-toggle="modal" data-target="#modal_theme_view_info" class="btn bg-primary-400 btn-icon rounded-round view_detail" student_payment_id="{{$value->id}}" data-popup="tooltip" data-original-title="View Payment History Detail" data-placement="bottom"><i class="icon-history"></i></a>

                                                        @php
                                                        $modal = 'modal';
                                                        @endphp

                                                        @if($value->amount_left !== '0')
                                                        <a data-toggle="{{$modal}}" data-target="#modal_payment_status"
                                                            class="btn bg-danger-400 btn-icon rounded-round update_payment_status"
                                                            student_id="{{ $student_id }}" payment_id="{{$value->id}}" data-popup="tooltip"
                                                            data-original-title="Course Payment" data-placement="bottom"><i
                                                                class="icon-color-sampler"></i></a>
                                                        @endif

                                                        @if($value->moved_to_student == 0)
                                                        <a data-toggle="{{$modal}}" data-target="#modal_theme_course_student"
                                                            class="btn bg-success-400 btn-icon rounded-round update_payment_status"
                                                            student_id="{{ $student_id }}" payment_id="{{$value->id}}" data-popup="tooltip"
                                                            data-original-title="Course Move Update" data-placement="bottom"><i
                                                                class="icon-flip-horizontal2"></i></a>
                                                        @endif
                                                        <a data-toggle="modal" data-target="#modal_theme_warning"
                                                            class="btn bg-danger-400 btn-icon rounded-round delete_purchase"
                                                            link="{{route('studentpurchase.delete', ['id' => $value->id, 'student_id' => $student_id])}}" data-popup="tooltip"
                                                            data-original-title="Delete" data-placement="bottom"><i class="icon-bin"></i></a>

                                                    </td>

                                                </tr>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="6">No Student Purchase History Found !!!</td>
                                                </tr>
                                                @endif
                                            </tbody>

                                        </table>
                                    </div>
                                        
                                </div>

                                <div class="tab-pane fade" id="bottom-justified-tab3">
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
                                                        <td><b>{{$value->total_question}}</b></td>
                                                        <td class="text-success"><b>{{$value->score}}</b></td>
                                                        <td class="text-violet"><b>{{$value->percent}} %</b></td>
                                           
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

                                <div class="tab-pane fade" id="bottom-justified-tab4">
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
                                                    <td><b>{{$value->total_question}}</b></td>
                                                    <td class="text-success"><b>{{$value->correct_answer}}</b></td>
                                                    <td class="text-violet"><b>{{$value->percent}} %</b></td>
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

                                <div class="tab-pane fade" id="bottom-justified-tab5">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr class="bg-slate">
                                                    <th>#</th>
                                                    <th>Full Name</th>
                                                    <th>Date</th>
                                                    <th>Title</th>
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
                                                    <td>Practice Test {{ substr($value->title, -1) }}</td>
                                                    <td><b>{{$value->total_question}}</b></td>
                                                    <td class="text-success"><b>{{$value->correct_answer}}</b></td>
                                                    <td class="text-violet"><b>{{$value->percent}} %</b></td>
                                       
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr>
                                                    <td colspan="7">No Student Practise Test Result Found !!!</td>
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

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Left Section -->

    <div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-right wmin-300 border-0 shadow-0 order-1 order-lg-2 sidebar-expand-md">
        
        <div class="card bg-purple-400">
            <div class="card-header bg-purple header-elements-inline">
                <h6 class="card-title">Student Status</h6>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                    </div>
                </div>
            </div>
            <div class="card-body pb-0" style="">
                <div class="row">
                    <div class="media flex-column flex-sm-row mt-0 mb-3">
                        <div class="media-body">
                            You can Update Student Status From Active to In-Active.<br>

                           <button data-toggle="modal" data-target="#modal_theme_status" student_id="{{ $studentInfo->id }}" class="update_status mt-2 ml-5 btn bg-light btn-labeled btn-labeled-left"><b><i class="icon-flip-horizontal2"></i></b> Update Status</button>

                       </div>
                   </div>
               </div>
           </div>
        </div>


        <div class="card bg-purple-400">
            <div class="card-header bg-purple header-elements-inline">
                <h6 class="card-title">Delete Student</h6>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                    </div>
                </div>
            </div>
            <div class="card-body pb-0" style="">
                <div class="row">
                    <div class="media flex-column flex-sm-row mt-0 mb-3">
                        <div class="media-body">
                           If Student is No More Associate with NETA, You can Delete from Student List.<br>

                           <button data-toggle="modal" data-target="#modal_theme_warning" link="{{route('student.delete',$studentInfo->id)}}" class="delete_student mt-2 ml-5 btn bg-light btn-labeled btn-labeled-left"><b><i class="icon-trash"></i></b> Delete Student</button>

                       </div>
                   </div>
               </div>
           </div>
        </div>

    </div>

</div>


<!-- Warning modal -->
<div id="modal_theme_view_info" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-teal">
                <h6 class="modal-title">View Student Purchase History Detail</h6>
            </div>

            <div class="modal-body">
                <div class="table-responsive result_view_recommend_detail">

                </div><!-- table-responsive -->
            </div>

            <div class="modal-footer">
                <button type="button" class="btn bg-teal-400" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- warning modal -->


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
                        ['id'=>'active','class'=>'form-control','placeholder'=>'Select Status','required']) !!}
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

<!-- Warning modal -->
<div id="modal_theme_course_student" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title">Move Course To Student</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route'=>'student.purchaseupdate','method'=>'POST','id'=>'team_submit','class'=>'form-horizontal','role'=>'form','files'=> true]) !!}
                <div class="form-group row">
                    <label class="col-form-label col-lg-3">Select Status:</label>
                    <div class="col-lg-9">
                        {!! Form::select('moved_to_student',[ '1'=>'Move To Student','0'=>'Pending'], $value = null,
                        ['id'=>'moved_to_student','class'=>'form-control','placeholder'=>'--Select Status--','required']) !!}
                    </div>

                    {{ Form::hidden('student_id', '',['class'=>'student_id']) }}
                    {{ Form::hidden('payment_id', '',['class'=>'payment_id']) }}

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


<!-- Warning modal -->
<div id="modal_payment_status" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h4 class="modal-title">Installment Course Fee</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route'=>'student.courseinstallment','method'=>'POST','id'=>'team_submit','class'=>'form-horizontal','role'=>'form','files'=> true]) !!}
                <div class="form-group row">
                    <label class="col-form-label col-lg-3">Amount Paid:</label>
                    <div class="col-lg-9">
                        {!! Form::text('amount_paid', $value = null, ['id'=>'amount_paid','placeholder'=>'Enter Amount','class'=>'form-control numeric','required']) !!}
                    </div>
                </div>

                {{ Form::hidden('student_id', '',['class'=>'student_id']) }}
                {{ Form::hidden('payment_id', '',['class'=>'payment_id']) }}

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

<script type="text/javascript">
    $('document').ready(function () {

        $('.view_detail').on('click', function () {
            var student_payment_id = $(this).attr('student_payment_id');

            $.ajax({
                type: 'GET',
                url: '/admin/student/viewPaymentHistory',
                data: {
                    student_payment_id: student_payment_id
                },

                success: function (data) {
                    $('.result_view_recommend_detail').html(data.options);
                }
            });

        });
        
        $('.delete_student').on('click', function () {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });

        $('.update_status').on('click', function () {
            var student_id = $(this).attr('student_id');
            $('.student_id').val(student_id);
        });

         $('.update_payment_status').on('click', function () {
            var student_id = $(this).attr('student_id');
            var payment_id = $(this).attr('payment_id');
            $('.student_id').val(student_id);
            $('.payment_id').val(payment_id);
        });

        $('.delete_purchase').on('click', function () {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });

    });
</script>

<style>

    .activity {
        position: relative;
        padding-left: 2rem;
        margin-left: 1rem;
    }
    .activity::before {
        content: "";
        width: 2px;
        background-color: #d6d6d6;
        height: calc(100% - 40px);
        position: absolute;
        left: 0;
        top: 20px;
    }

    .activity-item {
        background-color: #f9f9f9;
        border-top: 0;
        border-bottom: 0;
        border-right: 0;
        position: relative;
        box-shadow: 0 1px 3px 0 #ccc;
    }

    .activity-item::before {
        content: "";
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background-color: #24a9ee;
        position: absolute;
        left: -43px;
        top: 12px;
    }

    .circle-28 {
        width: 28px;
        height: 28px;
    }

    .circle-28 span {
        display: block;
        line-height: 1.4;
    }


    .modal_slide{
        display: flex !important;
        width: 500px !important;
        left: unset;
        right: -500px;
        transition: 0.5s ease-in-out right;
    }
    .modal_slide .modal-full-height { 
        display: flex;
        margin: 0;
        width: 100%;
        height: 100%;
    }
    .modal_slide.show{
        right: 0;
        transition: 0.5s ease-in-out right;
    }
    .modal_slide .modal-dialog .modal-content{
        border-radius: 0;
        border: 0;
    }

</style>
@endsection