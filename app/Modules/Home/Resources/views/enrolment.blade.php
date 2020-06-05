@include('home::layouts.navbar-inner')

<section class="neta-ribbon">
    <img src="img/bg.png" class="img-fluid" alt="">
    <div class="container">
        <div class="row">
            <div class="neta-ribbon__content">
                <div class="col-sm-12">
                    <h1 class="mb-0">Enrolment</h1>
                    <ul class="list-unstyled d-flex">
                       <li> <a href="{{ route('home') }}">Home /</a></li>
                        <li>Enrolment</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="neta-enrolment neta-contact  section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 offset-3">
                <div class="neta-contact__form">
                    <h2 class="ttl-line mb-5">Register your Interest</h2>
                    @if($message)
                        <div class="alert alert-info alert-dismissible">
                                {{$message}}
                        </div>
                    @endif
                    {!! Form::open(['route'=>'enrolment.store','method'=>'POST','id'=>'enrolment_submit','class'=>'form-horizontal','role'=>'form','files' => true]) !!}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Company Name <span>*</span></label>
                                     {!! Form::text('company_name', $value = null, ['id'=>'company_name','placeholder'=>'Enter Company Name','class'=>'form-control']) !!}
                                  </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Email Address <span>*</span></label>
                                     {!! Form::text('email', $value = null, ['id'=>'email','placeholder'=>'Enter Email Address','class'=>'form-control']) !!}
                                  </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Contact Number (include country and area code) <span>*</span></label>
                                     {!! Form::text('contact_number', $value = null, ['id'=>'contact_number','placeholder'=>'Enter Contact Number','class'=>'form-control']) !!}
                                  </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Country of Residence <span>*</span></label>
                                     {!! Form::select('country',['Australia'=>'Australia','Nepal'=>'Nepal','England'=>'England','India'=>'India'], $value = null, ['id'=>'country','class'=>'selectpicker w-100' ]) !!} 

                                  </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Intake Dates <span>*</span></label>
                                     {!! Form::textarea('intake_date', null, ['id' => 'intake_date','placeholder'=>'Enter Intake Dates', 'class' =>'form-control']) !!}  
                                  </div>
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-neta">Apply Now</button>
                            </div>
                        </div>
                   
                   {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</section>

@include('home::layouts.footer')
