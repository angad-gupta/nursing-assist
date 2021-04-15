@include('home::layouts.navbar-inner')

@section('scripts')
<link href="{{asset('admin/css/components.min.css')}}" rel="stylesheet" type="text/css">
<script src="{{asset('admin/global/js/plugins/ui/moment/moment.min.js')}}"></script>
<script src="{{ asset('admin/global/js/plugins/pickers/daterangepicker.js')}}"></script>
<script src="{{ asset('admin/global/js/demo_pages/picker_date.js')}}"></script>
<script src="{{asset('js/validation.js')}}"></script>
<script>
    
   if ($('#phone').val() != '') {
       
        
    } else {
        $('.phone_error').html('Enter Phone');
        $('#phone').focus();
        gotothen();
    }

</script>
@stop

<section class="neta-ribbon">
    <img src="img/cc.jpg" class="img-fluid" alt="">
    <div class="container">
        <div class="row">
            <div class="neta-ribbon__content">
                <div class="col-sm-12">
                    <h1 class="mb-0">User Dashboard</h1>
                    <ul class="list-unstyled d-flex">
                        <li> <a href="#">Home /</a></li>
                        <li> <a href="#">User Dashboard</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

 @php
    $image = ($student_profile->profile_pic) ? asset($student_profile->file_full_path).'/'.$student_profile->profile_pic : asset('admin/default.png');
 @endphp



<section class="neta-dashboard section-padding">
    <div class="container">
        <div class="profile-tab">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-3 mb-3">
                    <div class="auth-box ab-1 text-center">
                        <img src="{{ $image }}" width="100" alt="">
                        <div class="pn">
                            <h6 class="mb-0">{{ ($student_profile->full_name) ? $student_profile->full_name : '' }}</h6>
                            <p>{{ ($student_profile->email) ? $student_profile->email : '' }}</p>
                        </div>
                    </div>

                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
                        role="tab" aria-controls="v-pills-profile" aria-selected="true">  My Account</a>
                        <a class="nav-link" id="v-pills-book-tab" data-toggle="pill" href="#v-pills-book" role="tab"
                        aria-controls="v-pills-book" aria-selected="false"> My Courses</a>
  
                        <a class="nav-link" id="v-pills-message-tab" data-toggle="pill" href="#v-pills-message" role="tab"
                        aria-controls="v-pills-message" aria-selected="false">Ask an Educator</a>
                         <a class="nav-link" id="v-pills-reply-message-tab" data-toggle="pill" href="#v-pills-reply-message" role="tab"
                        aria-controls="v-pills-reply-message" aria-selected="false">Response From Educator</a>
                        <a class="nav-link" id="v-pills-notification-tab" data-toggle="pill" href="#v-pills-notification"
                        role="tab" aria-controls="v-pills-messages" aria-selected="false">Announcement</a>
                        <a class="nav-link" id="v-pills-purchase-tab" data-toggle="pill" href="#v-pills-purchase"
                        role="tab" aria-controls="v-pills-purchase" aria-selected="false">Purchase History</a>
                        <a class="nav-link" id="v-pills-password-tab" data-toggle="pill" href="#v-pills-password"
                        role="tab" aria-controls="v-pills-password" aria-selected="false">Change Password</a>
                        <a class="nav-link" href="{{ route('student-logout') }}">Logout</a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-9">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    @include('flash::message')
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel"
                        aria-labelledby="v-pills-profile-tab">
                        <h5 class="mb-0">My Account</h5>
                        
                        <p>View and edit your personal info below. <a  href="{{route('student-hub')}}" class="btn sac-btn" style="float:right;font-size:15px;background:#B0117E">Enroll to a Course</a></p> 

                       
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 pt-0">

                            {!! Form::model($student_profile,['method'=>'PUT','route'=>['studentprofile.update',$student_profile->id],'class'=>'form-horizontal','id'=>'team_submit','role'=>'form','files'=>true]) !!} 

    
                                <div class="row neta-field p-0">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Upload Profile</label>
                                            {!! Form::file('profile_pic', ['id'=>'profile_pic','class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="row neta-field p-0">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Full Name</label>
                                            {!! Form::text('full_name', $value = null, ['id'=>'full_name','placeholder'=>'Enter Full Name','class'=>'edit_content form-control','readonly']) !!}
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Gender</label>
                                            {!! Form::select('gender',['male'=>'Male','female'=>'Female','other'=>'Other'], $value = null, ['id'=>'gender','class'=>'edit_gender form-control ', 'placeholder'=>'Select Gender','disabled' ]) !!}    
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                        <label for="">Date of Birth</label>
                                            {!! Form::text('dob', $value = null, ['id'=>'tdatepicker4','placeholder'=>'Enter DOB','class'=>'edit_dob form-control daterange-single','disabled']) !!}
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Email Address</label>
                                            {!! Form::email('email', $value = null, ['id'=>'email','placeholder'=>'Enter Email','class'=>'edit_content form-control','readonly']) !!}
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Phone Number</label>
                                            {!! Form::text('phone_no', $value = null, ['id'=>'phone_no','placeholder'=>'Enter Phone Number' ,'class'=>'edit_content form-control', 'onkeyup'=>"phoneLength($(this).val())",'readonly']) !!}
                                            <span class="text-danger phone_error"></span>
                                        </div>
                                    </div>


                                    {{--<div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Primary Address</label>
                                            {!! Form::text('primary_address', $value = null, ['id'=>'primary_address','placeholder'=>'Enter Primary Address','class'=>'edit_content form-control','readonly']) !!}
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Temporary Address</label>
                                            {!! Form::text('temporary_address', $value = null, ['id'=>'temporary_address','placeholder'=>'Enter Temporary Address','class'=>'edit_content form-control','readonly']) !!}

                                        </div>
                                    </div>--}}

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Street Number</label>
                                            {!! Form::text('street_number', $value = null, ['id'=>'street_number','placeholder'=>'Enter Street Number' ,'class'=>'edit_content form-control','readonly']) !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Street Name </label>
                                            {!! Form::text('street_name', $value = null, ['id'=>'street_name','placeholder'=>'Enter Street Name' ,'class'=>'edit_content form-control','readonly']) !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Suburb</label>
                                            {!! Form::text('suburb', $value = null, ['id'=>'suburb','placeholder'=>'Enter Suburb' ,'class'=>'edit_content form-control','readonly']) !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Postal Code</label>
                                            {!! Form::text('postalcode', $value = null, ['id'=>'postal_code','placeholder'=>'Enter Postal Code' ,'class'=>'edit_content form-control numeric','readonly']) !!}
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">State </label>
                                            {!! Form::text('state', $value = null, ['id'=>'state','placeholder'=>'Enter State' ,'class'=>'edit_content form-control','readonly']) !!}
                                        </div>
                                    </div>
                                  
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Country<span>*</span></label>
                                            {!! Form::select('country_id', $countries, $value = null, ['id'=>'country_id','placeholder'=>'Select Country' ,'class'=>'edit_select form-control','disabled']) !!}
                                        </div>
                                    </div>


                                    <div class="col-sm-12 save-btn">
                                        <button class="btn e-btn mt-3 edit_account" type="button" style="color:white;">Edit Info</button>

                                        <button class="btn e-btn mt-3 submit_account" type="submit" style="color:white;display: none;">Update Info</button>
                                    </div>
                                </div>

                                {!! Form::close() !!}

                                    </div>
                                </div>
                            </div><!-- pills-profile -->

                            <div class="tab-pane fade" id="v-pills-book" role="tabpanel" aria-labelledby="v-pills-book-tab">
                                <h5>My Courses</h5>
                              
                                @inject('enrolment', '\App\Modules\Enrolment\Repositories\EnrolmentRepository')
                                @inject('student_payment', '\App\Modules\Student\Repositories\StudentRepository')
                                @php
                                    use Illuminate\Support\Facades\Auth;
                                    $student_payments = $student_payment->getStudentPurchase(Auth::user()->id);
                                    $pending_enrolments = $enrolment->findPendingEnrolment(Auth::user()->id);
                                    $approved_enrolment = $enrolment->findApprovedEnrolment(Auth::user()->id);
                                @endphp


                                @if(sizeof($pending_enrolments) > 0)
                                @foreach($pending_enrolments as $pending_enrolment)
                                <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                                    Your <strong>{{$pending_enrolment->Courseinfo->course_program_title}}</strong> course is under verification which is enrolled on <strong>{{ $pending_enrolment->created_at->format('d M Y')}}</strong>. You will have <strong>Full Access</strong> once you have been verified. Thank you for your patience.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @endforeach
                                @endif

                                @if(!(sizeof($pending_enrolments)) > 0)
                                @if(sizeof($student_payments) > 0)
                                    @foreach($student_payments as $student_payment)
                                    @if($student_payment->status == 'Pending')
                                    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                        You have due payment remaining in  <strong>{{$student_payment->Courseinfo->course_program_title}}</strong> course. Please pay your fees as soon as possible.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif
                                    @endforeach
                                @endif
@endif

                                <div style="text-align:center;"><a target="_blank" class="btn sac-btn" href="{{ route('student-courses') }}" style="background: #b0117e; color:white;">See Available Courses</a></div>
                                <div class="tp-list">
                                    <div class="row">
                                        <div class="col-sm-12">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Course Name</th>
                                                    <th>Total Syllabus</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                @if($student_course->total() != 0)
                                                    @foreach($student_course as $key => $my_course_val)
                                                    @php
                                                    $total_syllabus = App\Modules\CourseContent\Entities\CourseContent::gettotalsyllabus($my_course_val->courseinfo_id);
                                                    
                                                    @endphp
                                                    <tr>
                                                        <td>{{ optional($my_course_val->courseInfo)->course_program_title }}</td>
                                                        <td>{{$total_syllabus}} syllabus</td>
                                                        <td width="30%">{{date('d M,Y',strtotime($my_course_val->created_at))}}</td>
                                                        <td> @if($my_course_val->status == 1)
                                                            <a href="{{ route('syllabus-detail',['course_info_id'=>$my_course_val->courseinfo_id]) }}">Click To View Course</a>
                                                            @else
                                                                Installment Remaining
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                @endif

                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div><!-- tp-list -->
                            </div>

                            <div class="tab-pane fade neta-message neta-about" id="v-pills-message" role="tabpanel" aria-labelledby="v-pills-message">
                                <h5 class="mb-0">Message</h5>
                               <button class="btn enrol-cpd mt-3" id="compose">Compose Message</button>
                               
                                {!! Form::open(['route'=>'message.send','method'=>'POST','id'=>'compose-field','class'=>'mb-3','role'=>'form','files' => true]) !!}

                                    <div class="form-group">
                                        {!! Form::textarea('message', null, ['id' => 'message','placeholder'=>'Enter Message', 'class' =>'form-control']) !!}                     

                                    </div>
                                    <div class="submit float-right">
                                        <input type="submit" class="btn btn-success" value="Send Message" id="message_send">
                                    </div>

                                {!! Form::close() !!}

                               <div class="message-table">
                               <h6>All Sent Message</h6>
                               <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sent to</th>
                                        <th>Message</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                @if(sizeof($message)>0)
                                    @foreach($message as $key => $msg_val)
                                    <tr>
                                        <td>Admin</td>
                                        <td width="60%">{{ $msg_val->message }}</td>
                                        <td><span>{{ $msg_val->created_at->diffForHumans() }}</span></td>
                                    </tr>
                                    @endforeach
                                @endif 

                                </tbody>
                               </table>
                             </div>
    
                            </div><!-- tour-pills -->

                            <div class="tab-pane fade neta-message neta-about" id="v-pills-reply-message" role="tabpanel" aria-labelledby="v-pills-reply-message">
                                <h5 class="mb-0">Inbox Message</h5>
                                <p>See all the Message Send By Eductors</p>
                               <div class="message-table">
                               <table class="table">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Message</th>
                                        <th>Date / Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                @if(sizeof($inbox_message)>0)
                                    @foreach($inbox_message as $key => $msg_val)
                                    <tr>
                                       <td>{{ $msg_val->title }}</td>
                                       <td>{{ substr($msg_val->message,0,10) }}...</td>
                                        <td>{{date('d M,Y H:i:s A',strtotime($msg_val->created_at))}}</td>
                                        <td class="neta-action">
                                            <a data-toggle="modal" data-target="#view_reply_message_detail" class="btn sac-btn view_inbox" message_id="{{$msg_val->id}}" data-popup="tooltip" data-original-title="Delete" data-placement="bottom">View</a>

                                        </td>
                                    </tr>
                                    @endforeach
                                @endif 

                                </tbody>
                               </table>
                             </div>
    
                            </div><!-- tour-pills -->
                            
                            <div class="tab-pane fade" id="v-pills-notification" role="tabpanel" aria-labelledby="v-pills-notification">
                                <h5 class="mb-0">Announcement</h5>
                                <p>See all the Announcement form Eductors</p>

                                @if($student_course->total() != 0)

                                <div class="tp-list">
                                    <div class="row">
                                        <div class="col-sm-12">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Time Period</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                @if(sizeof($announcement)>0)
                                                    @foreach($announcement as $key => $announcement_val)
                                                    <tr>
                                                        <td width="40%">{{ $announcement_val->title }}</td>
                                                        <td>{{ $announcement_val->created_at->diffForHumans() }}</td>
                                                        <td>{{date('d M,Y',strtotime($announcement_val->created_at))}}</td>
                                                        <td class="neta-action">
                                                            <a data-toggle="modal" data-target="#view_annoucement_detail" class="btn sac-btn view_announcement" announcement_id="{{$announcement_val->id}}" data-popup="tooltip" data-original-title="Delete" data-placement="bottom">View</a>

                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                @endif  

                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div><!-- tp-list -->
                                @else
                                <h5 class="mb-0" style="color: #b0117e;">Sorry, You have To Enrol Atleast One Course To Access Annoucement.</h5>
                                <p></p>
                                @endif
 


                            </div><!-- tour-pills -->

                            <div class="tab-pane fade" id="v-pills-purchase" role="tabpanel" aria-labelledby="v-pills-purchase">
                                <h5 class="mb-0">Purchase History</h5>
                                <p>All the purchase history are as below</p> 
                                <a target="_blank" class="btn sac-btn" href="{{ route('student-courses') }}">See Available Courses</a>
                                <div class="tp-list">
                                    <div class="row">
                                        <div class="col-sm-12">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Course Name</th>
                                                    <th>Purchase Date</th>
                                                    <th>Total Cost (A$)</th>
                                                    <th>Paid Amount(A$)</th>
                                                    <th>Payment Status</th>
                                                    <th>Invoice</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                 @if($student_course_purchase)
                                                    @foreach($student_course_purchase as $key => $my_coursepurchase_val)
                                                    <tr>
                                                        <td width="20%">{{ optional($my_coursepurchase_val->courseInfo)->course_program_title }}</td>
                                                        <td width="20%">{{date('d M,Y',strtotime($my_coursepurchase_val->created_at))}}</td>
                                                        <td>{{ $my_coursepurchase_val->total_course_fee }}</td>
                                                        <td>{{ $my_coursepurchase_val->amount_paid }}</td>
                                                        <td>{{ $my_coursepurchase_val->status }}</td>
                                                        <td class="neta-action">

                                                            @if($my_coursepurchase_val->status == 'First Installment Paid' || $my_coursepurchase_val->status == 'Second Installment Paid' || $my_coursepurchase_val->status == 'Final Installment Paid' || $my_coursepurchase_val->status == 'Paid')
                                                                <a href="{{ route('course-invoice',['student_purchase_id'=>$my_coursepurchase_val->id,'status'=>'view']) }}" class="text-success view" target="_blank"><i class="fa fa-eye"></i></a>  | 
                                                                <a href="{{ route('course-invoice',['student_purchase_id'=>$my_coursepurchase_val->id,'status'=>'download']) }}" class="text-success download" target="_blank"><i class="fa fa-download"></i></a>
                                                            @endif 

                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                @endif  

                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div><!-- tp-list -->
                            </div>


                            <div class="tab-pane fade" id="v-pills-password" role="tabpanel"
                            aria-labelledby="v-pills-password-tab">
                            <h5 class="mb-0">Change Password</h5>
                            <p>For Better Security, Update Password Frequently.</p>


                    {!! Form::open(['route'=>'student-update-password','method'=>'POST','class'=>'form-horizontal','role'=>'form','files' => true]) !!}
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 pt-0">
                                    <div class="row neta-field p-0">

                                           <div class="col-sm-4">
                                                <div class="form-group">
                                                        <label for="">Old Password</label>
                                                    {!! Form::text('old_password', $value = null, ['id'=>'old_password','placeholder'=>'Old Password','class'=>'form-control']) !!}
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="">New Password</label>
                                                        {!! Form::password('password', ['id'=>'password','placeholder'=>'New Password','class'=>'form-control']) !!}
                                                </div>
                                            </div> 


                                        <div class="col-sm-12 save-btn">
                                            <button class="btn e-btn mt-3" type="submit">Update Password</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {!! Form::close() !!}

                        </div><!-- pills-password -->



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<section class="section-padding"></section>


     <!-- Warning modal -->
    <div id="view_annoucement_detail" class="modal fade" tabindex="-1">
         <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h6 class="modal-title">View Annoucement</h6>
                </div>

                <div class="modal-body">
                    <div class="table-responsive result_view_detail">  
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn bg-teal-400" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<!-- /warning modal -->

     <!-- Warning modal -->
    <div id="view_reply_message_detail" class="modal fade" tabindex="-1">
         <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h6 class="modal-title">View Inbox Message</h6>
                </div>

                <div class="modal-body">
                    <div class="table-responsive result_inbox_view_detail">  
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn bg-teal-400" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<!-- /warning modal -->


@include('home::layouts.footer')


<script type="text/javascript">
    $(document).ready(function(){


        $(document).on('click', '.edit_account', function () {

            $('.edit_content').attr('readonly', false); 
            $('.edit_select').attr('disabled', false); 
            $('.edit_dob').attr('disabled', false); 
            $('.edit_gender').attr('disabled', false); 
            $('.edit_content').removeClass('text-grey'); 
            $('.edit_content').addClass('text-dark'); 
            $('.edit_account').hide();
            $('.submit_account').show();

        });
            
    $('.view_announcement').on('click',function(){ 
        var announcement_id = $(this).attr('announcement_id');

        $.ajax({
            type: 'GET',
            url: "<?php echo route('ajax-announcement-detail') ?>",
            data: { announcement_id: announcement_id },

            success: function (data) { 
                console.log(data);
                $('.result_view_detail').html(data);
            }
        }); 
    });     


    $('.view_inbox').on('click',function(){ 
        var message_id = $(this).attr('message_id');

        $.ajax({
            type: 'GET',
            url: "<?php echo route('ajax-inbox-message-detail') ?>",
            data: { message_id: message_id },

            success: function (data) { 
                console.log(data);
                $('.result_inbox_view_detail').html(data);
            }
        }); 
    });

        $('#message_send').on('click',function(){
            $('#compose-field').submit();
        });
    });
</script>