@extends('admin::layout')
@section('title')Registered Student @stop
@section('breadcrum')Registered Student @stop

@section('script')
<script src="{{asset('admin/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>

@stop

@section('content')


<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">List of Registered Student</h5>
 

    </div>

    <div class="table-responsive">
        <table class="table table-striped" id="headerTable">
            <thead>
                <tr class="bg-slate">
                    <th class="no-sort">Profile Pic</th>
                    <th >Full Name</th>
                    <th class="no-sort">Username</th>
                    <th class="no-sort">Email Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($student->total() != 0)
                @inject('enrol_repo', '\App\Modules\Enrolment\Repositories\EnrolmentRepository')

                @foreach($student as $key => $value)
                @php 
                $image = ($value->profile_pic) ? asset($value->file_full_path).'/'.$value->profile_pic : asset('admin/default.png');
                $is_enrol = $enrol_repo->countStudentEnrol($value->id);

                if($is_enrol == 0){   
                @endphp
                    <tr>
                        <td><a target="_blank" href="{{ $image }}"><img src="{{ $image }}" style="width: 50px;"></a></td>
                        <td>{{ $value->full_name }}</td>
                        <td>{{ $value->username }}</td>
                        <td>{{ $value->email }}</td>
                        <td>
                            <button data-toggle="modal" data-target="#modal_enrolment_moved" student_id="{{ $value->id }}" class="register_student_id btn bg-pink-800 btn-labeled btn-labeled-left"><b><i class="icon-reading"></i></b> Move To Enrolment</button>
                        </td>
                    </tr>
                @php } @endphp

                @endforeach
                @else
                <tr>
                    <td colspan="7">No Registered Student Found !!!</td>
                </tr>
                @endif
            </tbody>

        </table>

    </div>
</div>


<div id="modal_enrolment_moved" class="modal fade in" tabindex="-1">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <div class="modal-header bg-slate">
                <h5 class="modal-title"><i class="icon-reading"></i> Enrol Student</h5>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <div class="modal-body">
                <script src="{{asset('admin/validation/enrol_student.js')}}"></script>


                 {!! Form::open(['route'=>'registration.storeEnrollment', 'method'=>'POST','class'=>'form-horizontal','role'=>'form','files' => true, 'id' => 'enrol_student_submit']) !!}
        

                     {{ Form::hidden('reg_student_id', '',array('class'=>'reg_student_id')) }}

                     
                     <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">Eligibility & Document</legend>

                        <div class="row">
                            <div class="col-md-6"> 
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-4">Select Eligibility:<span class="text-danger">*</span></label>
                                        <div class="col-lg-8">
                                           <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-toggle"></i></span>
                                            </span>
                                               {!! Form::select('eligible_rd',[ 'is_eligible_mcq_osce'=>'I have done self-check through AHPRA that indicates MCQ and OSCE ','is_eligible_att'=>'I hold an Authority to Take (ATT) notification from AHPRA ','is_eligible_letter_ahpra'=>'I have a letter from AHPRA referring me to the OBA '], $value = null, ['placeholder'=>'Select Eligibility','id'=>'eligible_rd','class'=>'form-control','required' ]) !!}   
                                            </div>
                                        </div>
                                </div>
                            </div>

                              <div class="col-lg-6">
                                <div class="row">
                                    <label class="col-form-label col-lg-4">Eligibility Document:<span class="text-danger">*</span></label>
                                        <div class="col-lg-8 form-group-feedback form-group-feedback-right">
                                            <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-book3"></i></span>
                                            </span>
                                            {!! Form::file('eligible_document', ['id'=>'eligible_document','class'=>'form-control','required']) !!}
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6"> 
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-4">Select Identity:<span class="text-danger">*</span></label>
                                        <div class="col-lg-8">
                                           <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-toggle"></i></span>
                                            </span>
                                               {!! Form::select('rd',[ 'is_id'=>'I have provided a copy of valid ID'], $value = null, ['placeholder'=>'Select Identity','id'=>'rd','class'=>'form-control','required' ]) !!}   
                                            </div>
                                        </div>
                                </div>
                            </div>

                              <div class="col-lg-6">
                                <div class="row">
                                    <label class="col-form-label col-lg-4">Identity Document:<span class="text-danger">*</span></label>
                                        <div class="col-lg-8 form-group-feedback form-group-feedback-right">
                                            <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-book3"></i></span>
                                            </span>
                                            {!! Form::file('identity_document', ['id'=>'identity_document','class'=>'form-control','required']) !!}
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>

                    </fieldset>

                    <fieldset class="mb-3">
                        <legend class="text-uppercase font-size-sm font-weight-bold">Student Detail [<span class="text-danger">*</span> -> mandatory field ]</legend>
                             
                        <div class="row">
                            <div class="col-md-3"> 
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3">Title:<span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                           <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-toggle"></i></span>
                                            </span>
                                               {!! Form::select('title',[ 'Mr.'=>'Mr','Ms.'=>'Ms','Mrs.'=>'Mrs'], $value = null, ['placeholder'=>'Select Title','id'=>'title','class'=>'form-control','required' ]) !!}   
                                            </div>
                                        </div>
                                </div>
                            </div>
                             <div class="col-lg-3">
                                <div class="row">
                                    <label class="col-form-label col-lg-3">First Name:<span class="text-danger">*</span></label>
                                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-pencil"></i>
                                                </span>
                                            </span>
                                            {!! Form::text('first_name', $value = null, ['id'=>'first_name','placeholder'=>'Enter First Name','class'=>'form-control','required']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="col-md-3"> 
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3">Last Name:<span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                           <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-pencil"></i></span>
                                            </span>
                                                {!! Form::text('last_name', $value = null, ['id'=>'last_name','placeholder'=>'Enter Last Name','class'=>'form-control','required']) !!}
                                            </div>
                                        </div>
                                </div>
                            </div>
                             <div class="col-lg-3">
                                <div class="row">
                                    <label class="col-form-label col-lg-3">Street 1:<span class="text-danger">*</span></label>
                                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-map"></i>
                                                </span>
                                            </span>
                                            {!! Form::text('street1', $value = null, ['id'=>'street1','placeholder'=>'Enter Street 1','class'=>'form-control','required']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3"> 
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3">Suburb:<span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                           <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-map"></i></span>
                                            </span>
                                               {!! Form::text('suburb', $value = null, ['id'=>'suburb','placeholder'=>'Enter Suburb','class'=>'form-control','required']) !!}
                                            </div>
                                        </div>
                                </div>
                            </div>
                             <div class="col-lg-3">
                                <div class="row">
                                    <label class="col-form-label col-lg-3">City:<span class="text-danger">*</span></label>
                                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-city"></i>
                                                </span>
                                            </span>
                                            {!! Form::text('city', $value = null, ['id'=>'city','placeholder'=>'Enter City','class'=>'form-control','required']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="col-md-3"> 
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3">State:<span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                           <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-map5"></i></span>
                                            </span>
                                                {!! Form::text('state', $value = null, ['id'=>'state','placeholder'=>'Enter State','class'=>'form-control','required']) !!}
                                            </div>
                                        </div>
                                </div>
                            </div>
                             <div class="col-lg-3">
                                <div class="row">
                                    <label class="col-form-label col-lg-3">Post Code:<span class="text-danger">*</span></label>
                                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-location4"></i>
                                                </span>
                                            </span>
                                            {!! Form::text('postalcode', $value = null, ['id'=>'postalcode','placeholder'=>'Enter Post Code','class'=>'form-control','required']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-3"> 
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3">Country:<span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                           <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-toggle"></i></span>
                                            </span>
                                                <select class="form-control" name="country" id="country" required="required">
                                                    <option value="au">Australia</option>
                                                    <option value="ph">Philippines</option>
                                                    <option value="np">Nepal</option>
                                                    <option value="in">India</option>
                                                    <option value="au">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                </div>
                            </div>
                             <div class="col-md-3"> 
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3">Contact No.:<span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                           <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-phone2"></i></span>
                                            </span>
                                                 {!! Form::text('phone', $value = null, ['id'=>'phone','placeholder'=>'Enter Contact No.','class'=>'form-control numeric','title'=>'10 characters minimum','required']) !!}
                                            </div>
                                        </div>
                                </div>
                            </div>
                             <div class="col-md-3"> 
                                <div class="form-group row">
                                    <label class="col-form-label col-lg-3">Ref. Agency:<span class="text-danger">*</span></label>
                                        <div class="col-lg-9">
                                           <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-toggle"></i></span>
                                            </span>
                                                <select class="form-control" name="agents" id="agents" required="required">
                                                    <option value="0">None</option>
                                                    @foreach($agents as $key => $agent)
                                                    <option value="{{$key}}">{{$agent}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                </div>
                            </div>
                             <div class="col-lg-3">
                                <div class="row">
                                    <label class="col-form-label col-lg-3">Email:<span class="text-danger">*</span></label>
                                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-envelop3"></i>
                                                </span>
                                            </span>
                                            {!! Form::email('email', $value = null, ['id'=>'email','placeholder'=>'Enter Email','class'=>'form-control','required']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <div class="row">
                            
                            <div class="col-lg-3">
                                <div class="row">
                                    <label class="col-form-label col-lg-3">Select Course:<span class="text-danger">*</span></label>
                                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-book3"></i>
                                                </span>
                                            </span>
                                            <select class="form-control" name="course_info_id" id="course_info_id" required="required">
                                                @foreach($courses as $key => $course)
                                                <option value="{{$key}}">{{$course}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>


                             <div class="col-lg-3">
                                <div class="row">
                                    <label class="col-form-label col-lg-3">Intake Month:<span class="text-danger">*</span></label>
                                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-pencil"></i>
                                                </span>
                                            </span>
                                             {!! Form::select('intake_date',$months, $value = null, ['placeholder'=>'Select Intake Date','id'=>'intake_date','class'=>'form-control','required' ]) !!}   
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </fieldset>

                       <div class="text-right update_button_ins">
                        <button type="submit"  class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i class="icon-database-insert"></i></b>Submit</button>
                    </div>


        
                {!! Form::close() !!}

            </div>
        </div>
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

<script type="text/javascript">
    $('document').ready(function () {

         $('.register_student_id').on('click', function() {
            var student_id = $(this).attr('student_id');
            $('.reg_student_id').val(student_id);
        });


        $('.delete_student').on('click', function () {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });
    });
</script>

@endsection
