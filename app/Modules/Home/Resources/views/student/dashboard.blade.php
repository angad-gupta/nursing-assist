@include('home::layouts.navbar-inner')

@section('scripts')
<link href="{{asset('admin/css/components.min.css')}}" rel="stylesheet" type="text/css">
<script src="{{asset('admin/global/js/plugins/ui/moment/moment.min.js')}}"></script>
<script src="{{ asset('admin/global/js/plugins/pickers/daterangepicker.js')}}"></script>
<script src="{{ asset('admin/global/js/demo_pages/picker_date.js')}}"></script>
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
    $image = ($student_profile->profile_pic) ? asset($student_profile->file_full_path).'/'.$student_profile->profile_pic : asset('home/img/nn.png');
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
                        aria-controls="v-pills-message" aria-selected="false">Message</a>
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
                    @include('flash::message')
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel"
                        aria-labelledby="v-pills-profile-tab">
                        <h5 class="mb-0">My Account</h5>
                        <p>View and edit your personal info below.</p> 
                         
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 pt-0">

                            {!! Form::model($student_profile,['method'=>'PUT','route'=>['studentprofile.update',$student_profile->id],'class'=>'form-horizontal','id'=>'team_submit','role'=>'form','files'=>true]) !!} 

    
                                <div class="row neta-field p-0">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Full Name</label>
                                            {!! Form::text('full_name', $value = null, ['id'=>'full_name','placeholder'=>'Enter Full Name','class'=>'form-control']) !!}
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Gender</label>
                                            {!! Form::select('gender',['male'=>'Male','female'=>'Female','other'=>'Other'], $value = null, ['id'=>'gender','class'=>'selectpicker' ]) !!}    
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="">Date of Birth</label>
                                                {!! Form::text('dob', $value = null, ['id'=>'tdatepicker4','placeholder'=>'Enter DOB','class'=>'form-control daterange-single','readonly']) !!}
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="">Email Address</label>
                                                    {!! Form::text('email', $value = null, ['id'=>'email','placeholder'=>'Enter Email','class'=>'form-control']) !!}
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="">Phone Number</label>
                                                    {!! Form::text('phone_no', $value = null, ['id'=>'phone_no','placeholder'=>'Enter Phone Number' ,'class'=>'form-control']) !!}
                                                </div>
                                            </div>


                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="">Primary Address</label>
                                                    {!! Form::text('primary_address', $value = null, ['id'=>'primary_address','placeholder'=>'Enter Primary Address','class'=>'form-control']) !!}
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="">Temporary Address</label>
                                                    {!! Form::text('temporary_address', $value = null, ['id'=>'temporary_address','placeholder'=>'Enter Temporary Address','class'=>'form-control']) !!}

                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="">Upload Profile</label>
                                                    {!! Form::file('profile_pic', ['id'=>'profile_pic','class'=>'form-control']) !!}
                                                </div>
                                            </div>

                                            <div class="col-sm-12 save-btn">
                                                <button class="btn e-btn mt-3" type="submit" style="color:white;">Update Info</button>
                                            </div>
                                        </div>

                                {!! Form::close() !!}

                                    </div>
                                </div>
                            </div><!-- pills-profile -->

                            <div class="tab-pane fade" id="v-pills-book" role="tabpanel" aria-labelledby="v-pills-book-tab">
                                <h5>My Courses</h5>
                                <div class="tp-list">
                                    <div class="row">
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
                                                    $total_syllabus = App\Modules\CourseContent\Entities\CourseContent::gettotalsyllabus($my_course_val->id);
                                                    @endphp
                                                    <tr>
                                                        <td>{{ optional($my_course_val->courseInfo)->course_program_title }}</td>
                                                        <td>{{$total_syllabus}} syllabus</td>
                                                        <td width="30%">{{date('d M,Y',strtotime($my_course_val->created_at))}}</td>
                                                        <td><a href="{{ route('syllabus-detail',['course_info_id'=>$my_course_val->id]) }}">Click To View Course</a></td>
                                                    </tr>
                                                    @endforeach
                                                @endif

                                            </tbody>
                                        </table>
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
                                        <button type="submit" class="btn btn-success">Send Message</button>
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
                            
                            <div class="tab-pane fade" id="v-pills-notification" role="tabpanel" aria-labelledby="v-pills-notification">
                                <h5 class="mb-0">Announcement</h5>
                                <p>See all the Announcement form Eductors</p>

                                @if(sizeof($announcement)>0)
                                    @foreach($announcement as $key => $announcement_val)
                                        <div class="tp-list">
                                            <div class="row">

                                                <div class="col-sm-10 col-md-10 col-lg-10 tp-list__desc">
                                                    <p class="mb-0">{{ $announcement_val->title }}</p>
                                                    <h6>{!! $announcement_val->content !!}</h6>
                                                    <span>{{ $announcement_val->created_at->diffForHumans() }}</span>
                                                </div>

                                            </div>
                                        </div><!-- tp-list -->
                                    @endforeach
                                @endif  


                            </div><!-- tour-pills -->

                            <div class="tab-pane fade" id="v-pills-purchase" role="tabpanel" aria-labelledby="v-pills-purchase">
                                <h5 class="mb-0">Purchase History</h5>
                                <p>All the purchase history are as below</p>
                                <div class="tp-list">
                                    <div class="row">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Course Name</th>
                                                    <th>Purchase Date</th>
                                                    <th>Total Cost ($)</th>
                                                    <th>Payment Type</th>
                                                    <th>Invoice</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                 @if($student_course_purchase)
                                                    @foreach($student_course_purchase as $key => $my_coursepurchase_val)
                                                    <tr>
                                                        <td>{{ optional($my_coursepurchase_val->courseInfo)->course_program_title }}</td>
                                                        <td width="30%">{{date('d M,Y',strtotime($my_coursepurchase_val->created_at))}}</td>
                                                        <td>${{ optional($my_coursepurchase_val->courseInfo)->course_fee }}</td>

                                                         <td>{{ ($my_coursepurchase_val->status == 'Pending') ? 'Other' : 'eway' }}</td>
                                                        <td class="neta-action">

                                                            @if($my_coursepurchase_val->status == 'Paid')
                                                            <a href="{{ route('course-invoice',['student_purchase_id'=>$my_coursepurchase_val->id,'status'=>'view']) }}" class="text-success view" target="_blank"><i class="fa fa-eye"></i>View</a>  | 
                                                            <a href="{{ route('course-invoice',['student_purchase_id'=>$my_coursepurchase_val->id,'status'=>'download']) }}" class="text-success download" target="_blank"><i class="fa fa-download"></i>Download</a>
                                                            @endif 

                                                    </td>
                                                    </tr>
                                                    @endforeach
                                                @endif  

                                            </tbody>
                                        </table>
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
                                            <button class="btn e-btn mt-3"><a href="#">
                                            Update Password </a></button>
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

@include('home::layouts.footer')