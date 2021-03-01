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
                key: "lvpb_ODdhZTRiYjMtMDdjZC00N2U5LWIyMzUtNDA3ZGJiOWVlMTkz", //public key
                card: {
                    name: $('#card_holder_name').val(),
                    number: $("#cc-number").val(),
                    cvc: $("#cc-cvc").val(),
                    expMonth: $("#cc-exp-month").val(),
                    expYear: $("#cc-exp-year").val()
                }
            }, simplifyResponseHandler);
            // Prevent the form from submitting
            return false;
        });
        
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
        //var amount = parseInt('{{$ins == 2 ? 2 : 3}}');
        var currency = 'AUD';  

        var payload = {
            cc_number: $('#cc-number').val(),
            cc_exp_month: $('#cc-exp-month').val(),
            cc_exp_year: $('#cc-exp-year').val(),
            cc_cvc: $('#cc-cvc').val(),
            currency: 'AUD',
            amount: amount,
            _token: '{{csrf_token()}}'
        };

        $.post('{{route("enrolment.3ds.pay")}}', payload, function (res) {
            var response = JSON.parse(res);
            var token = response.id;
            var enrolment_id = $('#enrolment_id').val();
            var payment_type = 1;
            var first_name = $('#first_name').val();
            var last_name = $('#last_name').val();
            var email = $('#email').val();
            //var description = '{{ $courseinfo->course_program_title == "NCLEX" ? "Final Installment Payment" : ($ins == 2 ? "Second Installment Payment" : "Final Installment Payment")}}';
            var description = '{{ $ins == 2 ? "Second Installment Payment" : "Final Installment Payment" }}';
            var student_payment_id = $('#student_payment_id').val();
            var ins = $('#ins').val();

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
                            description: description,
                            student_payment_id: student_payment_id,
                            ins:ins,
                            enrolment_id: enrolment_id,
                            payment_type: payment_type,
                            first_name:first_name,
                            last_name:last_name,
                            email:email,
                            token: token,
                            cc_number: $('#cc-number').val(),
                            cc_exp_month: $('#cc-exp-month').val(),
                            cc_exp_year: $('#cc-exp-year').val(),
                            cc_cvc: $('#cc-cvc').val(),
                            _token: '{{csrf_token()}}'
                        };

                        $.post('{{route("enrolment.3ds.installment.store")}}', completePayload, function (completeResponse) {
                            if (completeResponse == 0) {
                                alert('Payment Error!');
                                return false;
                            } else if(completeResponse == 2) {
                                alert('Payment Rejected By Commonwealth Bank!');
                                return false;
                            } else {
                             /*    $('.iframe_modal').modal({show:false});
                                $('.enrolment_form').hide();
                                $('.simplify-success').modal({show:true});  */
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
                return false;
               
            }
        });
    }
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
                                <h2 class="mt-3"><strong>Installment Payment Form</strong></h2>
                                <p>Fill all form field</p>
                                <div class="row">
                                    <div class="col-md-12 mx-0">
                                        <!-- <form id="msform"> -->
                                        <form action="{{ route('enrolment.installment.pay.store') }}" class="enrolment_form"
                                            method="post" id="msform" enctype="multipart/form-data">
                                            {{ csrf_field() }}

                                            @php 
                                            if($ins == 2) {
                                                /*if($courseinfo->course_program_title == 'NCLEX') {
                                                    $amount = 1000;
                                                } else {*/
                                                    //$amount = 2500;
                                                    $amount = 1500;
                                                //}
                                            } else {
                                                //$amount = ($student_payment->status == 'First Installment Paid' ? 4000 : 1500);
                                                $amount = ($student_payment->status == 'First Installment Paid' ? 4000 : 2500);
                                            }
                                            @endphp

                                            {!! Form::hidden('student_payment_id', $id, ['id' => 'student_payment_id']) !!}
                                            {!! Form::hidden('ins', $ins, ['id' => 'ins']) !!}
                                            {!! Form::hidden('enrolment_id', $student_payment->enrolment_id, ['id' => 'enrolment_id'] ) !!}
                                            {!! Form::hidden('amount', $amount, ['id' => 'amount'] ) !!}
                                            {!! Form::hidden('first_name', optional($student_payment->enrolmentInfo)->first_name, ['id' => 'first_name'] ) !!}
                                            {!! Form::hidden('last_name', optional($student_payment->enrolmentInfo)->last_name, ['id' => 'last_name'] ) !!}
                                            {!! Form::hidden('email', optional($student_payment->enrolmentInfo)->email, ['id' => 'email'] ) !!}

                                            <fieldset>
                                                <div class="form-card neta-payment">
                                                    <div class="row justify-content-center">
                                                        <div class="col-sm-12">
                                                            <h5>You Order Summary</h5>
                                                                {{--@if($courseinfo->course_program_title == 'NCLEX')
                                                                    <table class="table" id="installment_payment" style="display:none">
                                                                        <tr>
                                                                            <td>Initial payment</td>
                                                                            <td class="text-right">$1,500</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Final Payment (28 days after course commencement)
                                                                            </td>
                                                                            <td class="text-right">$1,000</td>
                                                                        </tr>

                                                                        <tr class="total">
                                                                            <td>Enrol {{ $courseinfo->course_program_title }} Total</td>
                                                                            <td class="text-right">${{ str_replace(',', '', $courseinfo->course_fee) }}</td>
                                                                        </tr>

                                                                        <tr class="total">
                                                                            <td>Final Installment Payment Total</td>
                                                                            <td class="text-right">$1,000</td>
                                                                        </tr>
                                                                    </table>
                                                                @else--}}
                                                                    <table class="table" id="installment_payment">
                                                                        <tr>
                                                                            <td>Initial payment</td>
                                                                            <td class="text-right">$1,500</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Second Payment (15 days after course commencement)
                                                                            </td>
                                                                            <td class="text-right">$1,500</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Final Payment (30 days after course commencement)
                                                                            </td>
                                                                            <td class="text-right">$2,500</td>
                                                                        </tr>

                                                                        <tr class="total">
                                                                            <td>Enrol {{ $courseinfo->course_program_title }} Total</td>                                                                            
                                                                            <td class="text-right">${{ str_replace(',', '', $courseinfo->course_fee) }}</td>
                                                                        </tr>

                                                                        <tr class="total">
                                                                            <td>{{$ins == 2 ? 'Second' : 'Final' }} Installment Payment Total</td>
                                                                            {{--<td class="text-right">${{$ins == 2 ? '2,500' : ($student_payment->status == 'First Installment Paid' ? '4,000' : '1,500') }}</td>--}}
                                                                            <td class="text-right">${{$ins == 2 ? '1,500' : ($student_payment->status == 'First Installment Paid' ? '4,000' : '2,500') }}</td>
                                                                        </tr>
                                                                    </table>
                                                                {{--@endif--}}
                                                           

                                                           
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

                                                            
                                                                        <div class ="col-sm-6 ">
                                                                            <div class="form-group">
                                                                                <label for="">Expiry Date: <span class="text-danger">*</span></label>
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
                                                                        
                                                                    </div>

                                                                    

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="row justify-content-center">
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
                                                    <div class="row justify-content-center" id="msform">

                                                        <button class="btn action-button" name="submit_enrol"
                                                            value="payment" id="process-payment-btn">Make Payment</button>
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
