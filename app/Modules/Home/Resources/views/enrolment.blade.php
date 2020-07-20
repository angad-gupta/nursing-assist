@include('home::layouts.navbar-inner')
@section('scripts')
<script type="text/javascript">
    $("#btn").click(function () {

        if (document.getElementById("file").value != "") {
            return true;
        } else {
            alert('Please upload the eligble document.');
            gotothen();
        }

    });

    $("#btn_second").click(function () {
        if (document.getElementById("file_second").value != "") {
            return true;
        } else {
            alert('Please upload the identity document.');
            gotothen();
        }
    });

    $('#detail_form').click(function () {

        if ($('#first_name').val() == '' && $('#last_name').val() == '' && $('#street').val() == '' && $(
                '#suburb').val() == '' && $('#city').val() == '' && $('#state').val() == '' &&
            $('#post_code').val() == '' && $('#intake_date').val() == '' && $('#agent').val() == 0 && $(
                '#email').val() == '' && $('#phone').val() == '' &&
            !$('#term_conditions_agree').is(":checked")) {
            alert('Please enter all fields');
            gotothen();
        } else {
            if ($('#first_name').val() != '') {
                $('.fname_error').html('');
            } else {
                $('.fname_error').html('Enter First Name');
                $('#first_name').focus();
                gotothen();
            }

            if ($('#last_name').val() != '') {
                $('.lname_error').html('');
            } else {
                $('.lname_error').html('Enter Last Name');
                $('#last_name').focus();
                gotothen();
            }

            if ($('#street').val() != '') {
                $('.street_error').html('');
            } else {
                $('.street_error').html('Enter Street');
                $('#street').focus();
                gotothen();
            }

            if ($('#suburb').val() != '') {
                $('.suburb_error').html('');
            } else {
                $('.suburb_error').html('Enter Suburb');
                $('#suburb').focus();
                gotothen();
            }

            if ($('#city').val() != '') {
                $('.city_error').html('');
            } else {
                $('.city_error').html('Enter City');
                $('#city').focus();
                gotothen();
            }

            if ($('#state').val() != '') {
                $('.state_error').html('');
            } else {
                $('.state_error').html('Enter State');
                $('#state').focus();
                gotothen();
            }

            if ($('#post_code').val() != '') {
                $('.postcode_error').html('');
            } else {
                $('.postcode_error').html('Enter Post Code');
                $('#post_code').focus();
                gotothen();
            }

            if ($('#country').val() != '') {
                $('.country_error').html('');
            } else {
                $('.country_error').html('Select Country');
                $('#country').focus();
                gotothen();
            }

            if ($('#intake_date').val() != '') {
                $('.intake_error').html('');
            } else {
                $('.intake_error').html('Select Intake Month');
                $('#intake_date').focus();
                gotothen();
            }

            if ($('#agent').val() > 0) {
                $('.agent_error').html('');
            } else {
                $('.agent_error').html('Select Agent');
                $('#agent').focus();
                gotothen();
            }

            if ($('#email').val() != '') {
                $('.email_error').html('');
            } else {
                $('.email_error').html('Enter Email');
                $('#email').focus();
                gotothen();
            }

            if ($('#phone').val() != '') {
                $('.phone_error').html('');
            } else {
                $('.phone_error').html('Enter Phone');
                $('#phone').focus();
                gotothen();
            }

            if (document.getElementById('term_conditions_agree').checked) {
                return true;
            } else {
                alert('Please check Term & Conditions');
                gotothen();
            }
        }
        
        $('#agent').on('change', function() {
            if($(this).val() > 0) {
                $('.agent_error').html('');
            } else {
                $('.agent_error').html('Select Agent');
                gotothen();
            }
        })

        $('#intake_date').on('change', function () {
            var intake_month = $(this).val();
            var students_per_intake = '{{$courseinfo->students_per_intake}}';
            var courseinfo_id = '{{$course_info_id}}';
            if(intake_month != '') {
                $('.intake_error').html('');
                $.ajax({
                    type: "GET",
                    data: {
                        courseinfo_id: courseinfo_id,
                        intake_month: intake_month,
                        students_per_intake: students_per_intake
                    },
                    url: '{{route("enrolment.checkIntakeAvailability")}}',
                    success: function (resp) {
                        if (resp > 0) {
                            $('.intake_error').html('');
                            $('#detail_form').attr('disabled', false);
                        } else {
                            $('.intake_error').html('Intake for month ' + intake_month +' is full!');
                            $('#detail_form').attr('disabled', true);
                        }
                    }
                })
            } else {
                $('.intake_error').html('Select Intake Month');
            }
        })
    });

</script>

@endsection


<section class="neta-ribbon">
    <img src="{{ asset('img/bg.png') }}" class="img-fluid" alt="">
    <div class="container">
        <div class="row">
            <div class="neta-ribbon__content">
                <div class="col-sm-12">
                    <h1 class="mb-0">Enrolment</h1>
                    <ul class="list-unstyled d-flex">
                        <li> <a href="{{ route('home') }}">Home /</a></li>
                        <li> <a href="#">Enrolment</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="neta-enrolment neta-contact  section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="container-fluid" id="grad1">
                    <div class="row justify-content-center mt-0">
                        <div class="col-11 col-sm-9 col-md-7 col-lg-9 text-center p-0 mt-3 mb-2">
                            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                                <h2 class="mt-3"><strong>Enrolment Form</strong></h2>
                                <p>Fill all form field to go to next step</p>
                                <div class="row">
                                    <div class="col-md-12 mx-0">
                                        <!-- <form id="msform"> -->
                                        <form action="{{ route('enrolmentstudent.store') }}" class="enrolment_form"
                                            method="post" id="msform" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <!-- progressbar -->
                                            <input type="hidden" name="courseinfo_id" value="{{ $course_info_id }}"
                                                placeholder="Email Id" />
                                            <ul id="progressbar">
                                                <li class="active" id="account"><strong>Eligibility</strong></li>
                                                <li id="personal"><strong>Identity Document</strong></li>
                                                <li id="payment"><strong>Details Form</strong></li>
                                                <li id="confirm"><strong>Payment</strong></li>
                                            </ul> <!-- fieldsets -->
                                            <fieldset>
                                                <div class="form-card">
                                                    <h2 class="fs-title">Eligibility</h2>
                                                    <div class="e-input">

                                                        <input type="radio" id="radio-1" class="radio-custom"
                                                            name="eligible_rd" value="is_eligible_mcq_osce"
                                                            placeholder="Email Id" id="radio1" checked="checked" />
                                                        <label for="radio-1" class="radio-custom-label">I have done self-check through AHPRA that indicates MCQ and OSCE </label>
                                                    </div>

                                                    <div class="e-input">
                                                        <input type="radio" id="radio-2" class="radio-custom"
                                                            name="eligible_rd" value="is_eligible_att"
                                                            placeholder="Email Id" id="radio2" />
                                                        <label for="radio-2" class="radio-custom-label">I hold an Authority to Take (ATT) notification from AHPRA </label>
                                                    </div>

                                                    <div class="e-input">
                                                        <input type="radio" id="radio-3" class="radio-custom"
                                                            name="eligible_rd" value="is_eligible_letter_ahpra"
                                                            placeholder="Email Id" id="radio3" />
                                                        <label for="radio-3" class="radio-custom-label">I have a letter from AHPRA referring me to the OBA
                                                        </label>
                                                    </div>

                                                    <div class="e-input">
                                                        <input class="w-100" type="file" name="eligible_document"
                                                            placeholder="" id="file" />
                                                    </div>


                                                </div> <input type="button" id="btn" name="next"
                                                    class="next action-button" value="Next Step" />
                                            </fieldset>

                                            <fieldset>
                                                <div class="form-card">
                                                    <h2 class="fs-title">Identity Document</h2>
                                                    <div class="e-input">
                                                        <input type="checkbox" id="radio-4" class="radio-custom"
                                                            name="rd" value="is_id" placeholder="Email Id"
                                                            checked="checked" />
                                                        <label for="radio-4" class="radio-custom-label">I have provided a copy of valid ID</label>
                                                    </div>

                                                    <div class="e-input">
                                                        <input class="w-100" type="file" name="identity_document"
                                                            id="file_second" placeholder="" />

                                                        </label>
                                                    </div>
                                                </div> <input type="button" name="previous"
                                                    class="previous action-button-previous" value="Previous" />
                                                <input type="button" name="next" class="next action-button"
                                                    value="Next Step" id="btn_second" />
                                            </fieldset>

                                            <fieldset>
                                                <div class="form-card">
                                                    <h2 class="fs-title">Detail Form</h2>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="">Title<span>*</span></label>
                                                                <select name="title" class="form-control" id="title">
                                                                    <option value="Mr." selected="">Mr</option>
                                                                    <option value="Ms.">Ms</option>
                                                                    <option value="Mrs.">Mrs</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="">First Name<span>*</span></label>
                                                                <input type="text" name="first_name"
                                                                    placeholder="First Name" class="form-control"
                                                                    id="first_name">
                                                                <span class="text-danger fname_error"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="">Last Name <span>*</span></label>
                                                                <input type="text" name="last_name"
                                                                    placeholder="Last Name" class="form-control"
                                                                    id="last_name">
                                                                <span class="text-danger lname_error"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="">Street 1<span>*</span></label>
                                                                <input type="text" name="street1" placeholder="Street 1"
                                                                    class="form-control" id="street">
                                                                <span class="text-danger street_error"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="">Suburb<span>*</span></label>
                                                                <input type="text" name="Suburb" placeholder="Suburb"
                                                                    class="form-control" id="suburb">
                                                                <span class="text-danger suburb_error"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="">City <span>*</span></label>
                                                                <input type="text" name="city" placeholder="City"
                                                                    class="form-control" id="city">
                                                                <span class="text-danger city_error"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="">State<span>*</span></label>
                                                                <input type="text" name="state" placeholder="State"
                                                                    class="form-control" id="state">
                                                                <span class="text-danger state_error"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="">Post Code <span>*</span></label>
                                                                <input type="text" name="Post Code"
                                                                    placeholder="Post Code" class="form-control"
                                                                    id="post_code">
                                                                <span class="text-danger postcode_error"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="">Country<span>*</span></label>
                                                                <select class="form-control" name="country"
                                                                    id="country">
                                                                    <option value="au">Australia</option>
                                                                    <option value="ph">Philippines</option>
                                                                    <option value="np">Nepal</option>
                                                                    <option value="in">India</option>
                                                                    <option value="au">Other</option>
                                                                </select>
                                                                <span class="text-danger country_error"></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="">Intake Month<span>*</span></label>
                                                                {!! Form::select('intake_date', $course_intakes, null,
                                                                ['id'=>'intake_date', 'class'=>'form-control',
                                                                'placeholder'=>'Select Intake Month']) !!}
                                                                <span class="text-danger intake_error"></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="">Referring Agency<span>*</span></label>
                                                                <select class="form-control" name="agents" id="agent">
                                                                    <option value="0">None</option>
                                                                    @foreach($agents as $key => $agent)
                                                                    <option value="{{$key}}">{{$agent}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="text-danger agent_error"></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="">Email <span>*</span></label>
                                                                <input type="email" name="email" placeholder="Email"
                                                                    class="form-control" id="email">
                                                                <span class="text-danger email_error"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="">Contact Number <span>*</span></label>
                                                                <input type="texts" name="phone"
                                                                    placeholder="Contact Number" class="form-control"
                                                                    id="phone">
                                                                <span class="text-danger phone_error"></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 d-flex enrol-cbx">
                                                            <input type="checkbox" id="term_conditions_agree"
                                                                required="required">
                                                            <p>I have read and understood the <a href="{{ route('term-condition')}}">Terms & Conditions</a>, <a href="{{ route('privacy-policy')}}">Privacy Policy</a> and <a href="{{ route('user-agreement')}}">User Agreement of NETA</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="button" name="previous"
                                                    class="previous action-button-previous" value="Previous" />
                                                <input type="button" name="make_payment" class="next action-button"
                                                    value="Confirm" id="detail_form" />
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-card neta-payment">
                                                    <h2 class="fs-title">Payment</h2>
                                                    <div class="row justify-content-center">
                                                        <div class="col-sm-12">
                                                            <!-- <div class="order-summary">
                                                                <div class="row">

                                                                <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <label for="">Card Holder Name</label>
                                                                            <input type="text" name="card_holder_name" class="form-control">
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <label for="">Enter Your Card Number</label>
                                                                            <input type="text" name="card_number"class="form-control">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <label for="">CCV</label>
                                                                            <input type="text" name="ccv" class="form-control">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <label for="">Email Address</label>
                                                                            <input type="text" name="card_email"class="form-control">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <label for="">Expiry Date</label>
                                                                            <input type="date" name="card_expiry_data"class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> -->


                                                            <h5>You Order Summary</h5>
                                                            <table class="table">
                                                                <tr>
                                                                    <td>Enrol {{ $courseinfo->course_program_title }}
                                                                    </td>
                                                                    <td class="text-right">
                                                                        ${{ $courseinfo->course_fee }}</td>
                                                                </tr>

                                                                <tr class="total">
                                                                    <td>Total</td>
                                                                    <td class="text-right">
                                                                        ${{ $courseinfo->course_fee }}</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="payment-method">
                                                            <h5>Payment Method</h5>
                                                            <img src="{{ asset('home/img/eway.png') }}" width="100px"
                                                                alt="">
                                                            <img src="{{ asset('home/img/visaa.png') }}" width="80px"
                                                                alt="">
                                                            <img src="{{ asset('home/img/mst.png') }}" width="80px"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                    <div class="" id="msform">

                                                        <button class="btn action-button" name="sbumit_enrol"
                                                            value="payment">Make Payment</button>
                                                        <button class="btn action-button" name="sbumit_enrol"
                                                            value="pay_later">Pay Later</button>
                                                    </div>
                                                </div>
                                    </div>
                                    </fieldset>

                                </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

@include('home::layouts.footer')
