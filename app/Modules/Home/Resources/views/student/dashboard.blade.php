@include('home::layouts.navbar-inner')

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
                        <a class="nav-link" id="v-pills-tour-tab" data-toggle="pill" href="#v-pills-tour" role="tab"
                        aria-controls="v-pills-tour" aria-selected="false">Message</a>
                        <a class="nav-link" id="v-pills-notification-tab" data-toggle="pill" href="#v-pills-notification"
                        role="tab" aria-controls="v-pills-messages" aria-selected="false">Notification</a>
                        <a class="nav-link" id="v-pills-purchase-tab" data-toggle="pill" href="#v-pills-purchase"
                        role="tab" aria-controls="v-pills-purchase" aria-selected="false">Purchase History</a>
                        <a class="nav-link" id="v-pills-password-tab" data-toggle="pill" href="#v-pills-password"
                        role="tab" aria-controls="v-pills-password" aria-selected="false">Change Password</a>
                        <a class="nav-link" href="{{ route('student-logout') }}">Logout</a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel"
                        aria-labelledby="v-pills-profile-tab">
                        <h5 class="mb-0">My Account</h5>
                        <p>View and edit your personal info below.</p>
                         @include('flash::message')
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
                                                {!! Form::text('dob', $value = null, ['id'=>'datepicker4','placeholder'=>'Enter DOB','class'=>'form-control']) !!}
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
                                        <table class="table table-striped agent-package">
                                            <thead>
                                                <tr>
                                                    <th>Course Name</th>
                                                    <th>Date</th>
                                                    <th>Remarks</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Nclex Prepration v2.0</td>
                                                    <td width="30%">2019-02-26</td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <td>Review for the NCLEX-PN Examination v2.0</td>
                                                    <td width="30%">2019-02-26</td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <td>OSCE Course Practise</td>
                                                    <td width="30%">2019-02-26</td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <td>Nclex Prepration v2.0</td>
                                                    <td width="30%">2019-02-26</td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!-- tp-list -->
                            </div>
                            
                            <div class="tab-pane fade" id="v-pills-notification" role="tabpanel" aria-labelledby="v-pills-notification">
                                <h5 class="mb-0">Notification</h5>
                                <p>See all the Notifications form your friends and eductors</p>
                                <div class="tp-list">
                                    <div class="row">
                                        <div class="col-sm-2 col-md-2 col-lg-2 auth-box p-0">
                                            <img src="img/nn.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-sm-10 col-md-10 col-lg-10 tp-list__desc">
                                            <p class="mb-0">See all the Notifications form your friends and eductors</p>
                                            <h6>Hi!The awaited, major update for Capture One 20 was finally released earlier this week. It contains some powerful new features such....</h6>
                                            <span>3 days ago</span>
                                        </div>

                                    </div>
                                </div><!-- tp-list -->

                                <div class="tp-list">
                                    <div class="row">
                                        <div class="col-sm-2 col-md-2 col-lg-2 auth-box p-0">
                                            <img src="img/nurse1.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-sm-10 col-md-10 col-lg-10 tp-list__desc">
                                            <p class="mb-0">See all the Notifications form your friends and eductors</p>
                                            <h6> It contains some powerful new features such....</h6>
                                            <span>1 month ago</span>
                                        </div>

                                    </div>
                                </div><!-- tp-list -->

                                <div class="tp-list">
                                    <div class="row">
                                        <div class="col-sm-2 col-md-2 col-lg-2 auth-box p-0">
                                            <img src="img/nurse2.png" alt="" class="img-fluid">
                                        </div>
                                        <div class="col-sm-10 col-md-10 col-lg-10 tp-list__desc">
                                            <p class="mb-0">See all the Notifications form your friends and eductors</p>
                                            <h6>Hi!The awaited, major update for Capture One 20 was finally released earlier this week. It contains some powerful new features such....</h6>
                                            <span>6 days ago</span>
                                        </div>

                                    </div>
                                </div><!-- tp-list -->

                            </div><!-- tour-pills -->

                            <div class="tab-pane fade" id="v-pills-purchase" role="tabpanel" aria-labelledby="v-pills-purchase">
                                <h5 class="mb-0">Purchase History</h5>
                                <p>All the purchase history are as below</p>
                                <div class="tp-list">
                                    <div class="row">
                                        <table class="table table-striped agent-package">
                                            <thead>
                                                <tr>
                                                    <th>Course Name</th>
                                                    <th>Purchase Date</th>
                                                    <th>Total Cost ($)</th>
                                                    <th>Payment Type</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Nclex Prepration v2.0</td>
                                                    <td width="30%">2019-02-26</td>
                                                    <td>3,500</td>
                                                    <td>Paypal</td>
                                                </tr>

                                                <tr>
                                                    <td>Nclex Prepration v2.0</td>
                                                    <td width="30%">2019-02-26</td>
                                                    <td>5,500</td>
                                                    <td>Swift</td>
                                                </tr>

                                                <tr>
                                                    <td>OSCE Prepration v2.0</td>
                                                    <td width="30%">2019-02-26</td>
                                                    <td>6,500</td>
                                                    <td>Master Card</td>
                                                </tr>

                                                <tr>
                                                    <td>Nclex Prepration v2.0</td>
                                                    <td width="30%">2019-02-26</td>
                                                    <td>3,500</td>
                                                    <td>Paypal</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!-- tp-list -->
                            </div>


                            <div class="tab-pane fade" id="v-pills-password" role="tabpanel"
                            aria-labelledby="v-pills-password-tab">
                            <h5 class="mb-0">Change Password</h5>
                            <p>For Better Security, Update Password Frequently.</p>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 pt-0">
                                    <div class="row neta-field p-0">

                                           <div class="col-sm-4">
                                                <div class="form-group">
                                                        <label for="">Old Password</label>
                                                        <input type="password" class="form-control" placeholder="******">
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="">New Password</label>
                                                    <input type="password" class="form-control" placeholder="******">
                                                </div>
                                            </div> 

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="">Re-Type Password</label>
                                                    <input type="password" class="form-control" placeholder="******">
                                                </div>
                                            </div>


                                        <div class="col-sm-12 save-btn">
                                            <button class="btn e-btn mt-3"><a href="#">
                                            Update Password </a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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