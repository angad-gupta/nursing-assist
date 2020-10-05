@include('home::layouts.navbar-inner')
<style>
.modal {z-index: 9999 !important;}
</style>
@section('scripts')
<script src="{{asset('js/validation.js')}}"></script>
<script type="text/javascript" src="https://www.simplify.com/commerce/v1/simplify.js"></script>
<script type="text/javascript">
   
    $(document).ready(function() {
        $("#process-payment-btn").on("click", function() {
            // Disable the submit button
            $("#process-payment-btn").attr("disabled", "disabled");
            $("#paylater-btn").attr("disabled", "disabled");

            $('#loaderImg').show();
            $('#process-payment-btn').prepend('<i class="icon-spinner4 spinner"></i>');
            // Generate a card token & handle the response
            SimplifyCommerce.generateToken({
                key: "lvpb_MGQzNTNiMjctYzdhZC00MDk1LWFkYTctZmFhMDQ4OTdjMjkz", //public key
                card: {
                    name: $('#card_holder_name').val(),
                    number: $("#cc-number").val(),
                    cvc: $("#cc-cvc").val(),
                    expMonth: $("#cc-exp-month").val(),
                    expYear: $("#cc-exp-year").val(),
                    customer: {
                        name: $('#first_name').val() + ' ' + $('#last_name').val(),
                        email: $('#email').val()
                    }
                }
            }, simplifyResponseHandler);
            // Prevent the form from submitting
            return false;
        });

        window.addEventListener('keydown', function(e) {
            var keyCode = e.keyCode || e.which;
            //if user pressed enter, set the variable to true
            if (keyCode == 13){
                e.preventDefault();
                return false;
            }

        })

    });

    function simplifyResponseHandler(data) {
        var $paymentForm = $(".enrolment_form");
        // Remove all previous errors
        $(".error").remove();
        // Check for errors
        if (data.error) {
            // Show any validation errors
            if (data.error.code == "validation") {
                var fieldErrors = data.error.fieldErrors,
                        fieldErrorsLength = fieldErrors.length,
                        errorList = "";
                for (var i = 0; i < fieldErrorsLength; i++) {
                    errorList += "<div class='text-danger error'>Field: '" + fieldErrors[i].field +
                            "' is invalid - " + fieldErrors[i].message + "</div>";
                }
                // Display the errors
                $paymentForm.after(errorList);
            }

            $('#loaderImg').hide();
            //$('#process-payment-btn').prepend('<i class="icon-spinner4 spinner"></i>');
            // Re-enable the submit button
            $("#process-payment-btn").removeAttr("disabled");
            $("#paylater-btn").removeAttr("disabled");
        } else {
           

            // The token contains id, last4, and card type
            var token = data["id"];
            $paymentForm.append("<input type='hidden' name='submit_enrol' value='payment' />");
            // Insert the token into the form so it gets submitted to the server
            $paymentForm.append("<input type='hidden' name='simplifyToken' value='" + token + "' />");
            // Submit the form to the server
            //$paymentForm.get(0).submit();
            processPayment();
            return false;
        }
    }

    function createInput(name, value) {
        var input = document.createElement('input');
        input.setAttribute('type', 'hidden');
        input.setAttribute('name', name);
        input.setAttribute('value', value);
        return input;
    }

    function createSecure3dForm(data) {
        var secure3dData = data.card.secure3DData;
        var secure3dForm = document.createElement('form');
        secure3dForm.setAttribute('method', 'POST');
        secure3dForm.setAttribute('action', secure3dData.acsUrl);
        secure3dForm.setAttribute('target', 'secure3d-frame');

        var merchantDetails = secure3dData.md;
        var paReq = secure3dData.paReq;
        var termUrl = secure3dData.termUrl;

        secure3dForm.append(createInput('PaReq', paReq));
        secure3dForm.append(createInput('TermUrl', termUrl));
        secure3dForm.append(createInput('MD', merchantDetails));

        return secure3dForm;
    }

    function processPayment() {
        var amount = $('#amount').val();
        //var amount = 1;
        var currency = 'AUD';    
        var cc_number = $('#cc-number').val();
        var cc_exp_month = $('#cc-exp-month').val();
        var cc_exp_year = $('#cc-exp-year').val();
        var cc_cvc = $('#cc-cvc').val();

        var payload = {
            cc_number: cc_number,
            cc_exp_month: cc_exp_month,
            cc_exp_year: cc_exp_year,
            cc_cvc: cc_cvc,
            currency: currency,
            amount: amount,
            _token: '{{csrf_token()}}'
        };

        $.post('{{route("enrolment.3ds.pay")}}', payload, function (res) {
            var response = JSON.parse(res);
            var token = response.id;
            
            var enrolment_id = $('#enrolment_id').val();
            var payment_type = $('#payment_type').val();
            var first_name = $('#first_name').val();
            var last_name = $('#last_name').val();
            var email = $('#email').val();

            if (response.card.secure3DData.isEnrolled) { // Step 
                var secure3dForm = createSecure3dForm(response); // Step 2
                var iframeNode = $('#secure3d-frame');

                $(secure3dForm).insertAfter(iframeNode);                
                $('.iframe_modal').modal({show:true});

                var process3dSecureCallback = function (threeDsResponse) {
                    console.log('Processing 3D Secure callback...');
                    var three_data = JSON.parse(threeDsResponse.data);
                    window.removeEventListener('message', process3dSecureCallback);
                    var simplifyDomain = 'https://www.simplify.com';

                    // Step 4 
                     if (threeDsResponse.origin === simplifyDomain &&
                        three_data.secure3d.authenticated) { 
                 
                        var completePayload = {
                            amount: amount,
                            currency: currency,
                            description: 'Enrolment Payment',
                            enrolment_id: enrolment_id,
                            payment_type: payment_type,
                            first_name:first_name,
                            last_name:last_name,
                            email:email,
                            token: token,
                            cc_number: cc_number,
                            cc_exp_month: cc_exp_month,
                            cc_exp_year: cc_exp_year,
                            cc_cvc: cc_cvc,
                            _token: '{{csrf_token()}}'
                        };

                        $.post('{{route("enrolment.3ds.complete")}}', completePayload, function (completeResponse) {
                            if (completeResponse == 0) {
                                alert('Payment Error!');
                                return false;
                            } else if(completeResponse == 2) {
                                alert('Payment Rejected By Commonwealth Bank!');
                                return false;
                            } else {
                         /*        $('.iframe_modal').modal({show:false});
                                $('.enrolment_form').hide();
                                $('.simplify-success').modal({show:true}); */
                                window.location = "{{route('student-dashboard')}}?payment=success";
                            }
                            
                        });
                    } else {
                        var err_res = JSON.parse(threeDsResponse.data);
                        alert(err_res.secure3d.error.message);
                        $('#loaderImg').hide();
                        $("#process-payment-btn").attr("disabled", false);
                    } 
                };
 
                iframeNode.on('load', function () {
                    window.addEventListener('message', process3dSecureCallback); // Step 3
                    $('#loaderImg').hide();
                });

                secure3dForm.submit();
            } else {
                alert('3DS not enabled in the card.');
                $('#loaderImg').hide();
                $("#process-payment-btn").attr("disabled", false);
                $("#paylater-btn").removeAttr("disabled");
                return false;
               
            }
        });
    }
</script>

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

    function validateUserInput() {
        if ($('#first_name').val() == '' && $('#last_name').val() == '' && $('#street').val() == '' && $('#suburb').val() == '' && $('#city').val() == '' 
        && $('#state').val() == '' && $('#post_code').val() == '' && $('#intake_date').val() == '' && $('#email').val() == '' && 
        $('#phone').val() == '' && !$('#term_conditions_agree').is(":checked")) {
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

            if ($('#email').val() != '') {
                if(isEmail($('#email').val())) {
                    $('.email_error').html('');
                } else {
                    $('.email_error').html('Invalid Email');
                    $('#email').focus();
                    gotothen();
                }
                
            } else {
                $('.email_error').html('Enter Email');
                $('#email').focus();
                gotothen();
            }

            if ($('#phone').val() != '') {
                var len_phone = $('#phone').val().length;
                if(len_phone < 10 ){
                    $('.phone_error').html('Phone number must of be of 10 digits minimum');
                    $('#phone').focus();
                    gotothen();
                }
                else{
                    $('.phone_error').html('');
                }
            
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
    }

    $(document).ready(function() {
        $('#detail_form').click(function () {

            var agent_id = $('#agent').val();
            if(agent_id == 0){
                $('#paylater-btn').hide();
            }else{
                $('#paylater-btn').show();
            }

           if(validateUserInput()) {
            var form = $('form')[0];
               var formData = new FormData(form);
                formData.append('eligible_document', document.getElementById("file").files[0]);
                formData.append('identity_document', document.getElementById("file_second").files[0]);
         

                var self = $(this);
                $.ajax({
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    url: '{{route("enrolmentstudent.store") }}',
                    success: function (resp) {
                        if(resp > 0) {
                            $('#enrolment_id').val(resp);
                            next_fs = self.parent().next();
                            (self.parent()).css('display', 'none');
                            (self.parent().next()).css('display', 'block');
                        } else {
                            alert('Something went wrong!');
                        }
                    },
                    error: function(errResponse) {
                        console.log(errResponse);
                    }
                })

            }
             
        });
 
        $('#payment_type').on('change', function() {
            var payment_type = $(this).val();
            if(payment_type == 1) {
                $('#installment_payment').css('display', '');
                $('#full_payment').css('display', 'none');
                //$('#amount').val(1637.5);
                $('#amount').val(1500);
            } else {
                $('#installment_payment').css('display', 'none');
                $('#full_payment').css('display', '');
                $('#amount').val(5500);
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
 })
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
                                        <form action="{{ route('enrolmentstudent.paylater.store') }}" class="enrolment_form"
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
                                                                    id="first_name" value="{{ $first_name }}">
                                                                <span class="text-danger fname_error"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label for="">Last Name <span>*</span></label>
                                                                <input type="text" name="last_name"
                                                                    placeholder="Last Name" class="form-control"
                                                                    id="last_name" value="{{ $last_name }}>
                                                                <span class="text-danger lname_error"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="">Street 1<span>*</span></label>
                                                                <input type="text" name="street1" placeholder="Street 1"
                                                                    class="form-control" id="street" value="{{ ($users) ? $users['street_name'] : '' }}">
                                                                <span class="text-danger street_error"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="">Suburb<span>*</span></label>
                                                                <input type="text" name="Suburb" placeholder="Suburb"
                                                                    class="form-control" id="suburb" value="{{ ($users) ? $users['suburb'] : '' }}">
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
                                                                    class="form-control" id="state" value="{{ ($users) ? $users['state'] : '' }}">
                                                                <span class="text-danger state_error"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="">Post Code <span>*</span></label>
                                                                <input type="text" name="Post Code"
                                                                    placeholder="Post Code" class="form-control numeric"
                                                                    id="post_code" value="{{ ($users) ? $users['postalcode'] : '' }}">
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
                                                                    class="form-control" id="email" required value="{{ ($users) ? $users['email'] : '' }}">
                                                                <span class="text-danger email_error"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="">Contact Number <span>*</span></label>
                                                                <input type="texts" name="phone"
                                                                    placeholder="Contact Number" class="form-control"
                                                                    id="phone" pattern=".{10,}"   required title="10 characters minimum" value="{{ ($users) ? $users['phone_no'] : '' }}">
                                                                <span class="text-danger phone_error"></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 d-flex enrol-cbx">
                                                            <input type="checkbox" id="term_conditions_agree"
                                                                required="required">
                                                            <p>I have read and understood the <a target="_blank" href="{{ route('term-condition')}}">Terms & Conditions</a>, <a target="_blank" href="{{ route('privacy-policy')}}">Privacy Policy</a> and <a target="_blank" href="{{ route('user-agreement')}}">User Agreement of NETA</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="button" name="previous"
                                                    class="previous action-button-previous" value="Previous" />
                                                <input type="button" name="make_payment" class=" action-button"
                                                    value="Confirm" id="detail_form" />
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-card neta-payment">
                                                    <h2 class="fs-title">Payment</h2>
                                                    <div class="row justify-content-center">
                                                        <div class="col-sm-12">
                                                            <h5>You Order Summary</h5>
                                                            <table class="table" id="full_payment">
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
                                                            {!! Form::hidden('enrolment_id',null, ['id' => 'enrolment_id'] ) !!}
                                                            {!! Form::hidden('amount', 5500, ['id' => 'amount'] ) !!}
                                                            @if($courseinfo->payment_mode != 'one off payment')
                                                            
                                                                <table class="table" id="installment_payment" style="display:none">
                                                                    <tr>
                                                                        <td>Initial payment</td>
                                                                        <td class="text-right">$1,500</td>
                                                                    </tr>
                                                                    {{--<tr>
                                                                        <td>Administration fee(2.5%) applies</td>
                                                                        <td class="text-right">
                                                                            2.5% of ${{ $courseinfo->course_fee}} = ${{ str_replace(',', '', $courseinfo->course_fee) * 0.025 }}</td>
                                                                    </tr>--}}
                                                                    <tr>
                                                                        <td>Second Payment (15 days after course commencement)
                                                                        </td>
                                                                        <td class="text-right">$2,500</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Final Payment (30 days after course commencement)
                                                                        </td>
                                                                        <td class="text-right">$1,500</td>
                                                                    </tr>

                                                                    <tr class="total">
                                                                        <td>Enrol {{ $courseinfo->course_program_title }} Total</td>
                                                                        {{--<td class="text-right">${{ str_replace(',', '', $courseinfo->course_fee) * 0.025  + str_replace(',', '', $courseinfo->course_fee)}}</td>--}}
                                                                        <td class="text-right">${{ str_replace(',', '', $courseinfo->course_fee) }}</td>
                                                                    </tr>

                                                                    <tr class="total">
                                                                        <td>First Inital Payment Total</td>
                                                                        {{--<td class="text-right">${{ str_replace(',', '', $courseinfo->course_fee) * 0.025  + 1500}}</td>--}}
                                                                        <td class="text-right">$1,500</td>
                                                                    </tr>
                                                                </table>
                                                            @endif

                                                           
                                                            <div class="order-summary">
                                                                <div class="row">                                                                   

                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <label for="">Cardholder Name: </label>
                                                                            <input type="text" name="card_holder_name" id="card_holder_name" class="form-control" placeholder="Enter Cardholder Name">
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <label for="">Card Number :<span class="text-danger">*</span></label>
                                                                            <input type="text" name="card_number" id="cc-number"  class="form-control" maxlength="20" autocomplete="off" autofocus placeholder="Enter Card Number">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <label for="">CVC: <span class="text-danger">*</span></label>
                                                                            <input type="password" name="ccv" id="cc-cvc" class="form-control" maxlength="4" autocomplete="off" placeholder="Enter CVC">
                                                                        </div>
                                                                    </div>

                                                                    {{--<div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <label for="">Email Address: </label>
                                                                            <input type="text" name="card_email" class="form-control">
                                                                        </div>
                                                                    </div>--}}

                                                                    <div class="col-sm-10 row">
                                                                        <div class ="col-sm-6 ">
                                                                            <div class="form-group">
                                                                                <label for="">Expiry Date: <span class="text-danger">*</span></label>
                                                                            </div>
                                                                        </div>

                                                                        <div class ="col-sm-4 ">
                                                                            <div class="form-group">
                                                                               
                                                                                <label class="d-block font-weight-semibold">Payment Type: <span class="text-danger">*</span></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-10 row">                                                                           
                                                                        <div class ="col-sm-3 ">
                                                                            <div class="form-group">
                                                                                <select id="cc-exp-month" name="cc_exp_month"  class="form-control">
                                                                                    <option value="01">Jan</option>
                                                                                    <option value="02">Feb</option>
                                                                                    <option value="03">Mar</option>
                                                                                    <option value="04">Apr</option>
                                                                                    <option value="05">May</option>
                                                                                    <option value="06">Jun</option>
                                                                                    <option value="07">Jul</option>
                                                                                    <option value="08">Aug</option>
                                                                                    <option value="09">Sep</option>
                                                                                    <option value="10">Oct</option>
                                                                                    <option value="11">Nov</option>
                                                                                    <option value="12">Dec</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class ="col-sm-3">
                                                                            <div class="form-group">
                                                                                <select id="cc-exp-year" name="cc_exp_year"  class="form-control">
                                                                                    @for($i=date('Y'); $i<= date('Y') + 10; $i++)
                                                                                        <option value="{{substr($i, -2)}}">{{$i}}</option>
                                                                                    @endfor
                                                                                </select>
                                                                            </div>
                                                                        </div>   
                                                                        
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group">
                                                                                {!! Form::select('payment_type', ['0'=>'Full Payment', '1'=>'Installment Payment'], null, ['id' => 'payment_type', 'class'=>'form-control']) !!}
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-center">
                                                        <div class="payment-method">
                                                            <h5>Payment Method</h5>
                                                            <img src="{{ asset('home/img/cwb.jpg') }}" width="100px"
                                                                alt="">
                                                            <img src="{{ asset('home/img/visaa.png') }}" width="80px"
                                                                alt="">
                                                            <img src="{{ asset('home/img/mst.png') }}" width="80px"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                    <div class="" id="msform">

                                                        <button class="btn action-button" name="submit_enrol"
                                                            value="payment" id="process-payment-btn">Make Payment</button>

                                                        <button class="btn action-button" name="submit_enrol"
                                                            value="pay_later" id="paylater-btn" style="display:none;">Pay to Agent</button>
                                                    </div>

                                                    <div class="col-sm-12 neta-about row justify-content-center">
                                                        <span class="text-center" id="loaderImg" style="display:none;">
                                                            <img src="{{asset('home/img/loader.gif')}}" alt="loader1"
                                                                style="margin-left: 30px; height:100px; width:auto;">
                                                            <h4>Please Wait..While Processing Payment...</h4>
                                                        </span>
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


<div class="modal fade bs-example-modal-lg simplify-success" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
            <p>Payment was processed successfully.<p>
      </div>
  </div>
</div>

<div class="modal fade bs-example-modal-lg iframe_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <iframe name="secure3d-frame" id="secure3d-frame"  height="800" width="800"></iframe>
      </div>
  </div>
</div>

@include('home::layouts.footer')
