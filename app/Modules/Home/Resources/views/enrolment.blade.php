@include('home::layouts.navbar-inner')

<section class="neta-ribbon">
    <img src="{{ asset('img/bg.png') }}" class="img-fluid" alt="">
    <div class="container">
        <div class="row">
            <div class="neta-ribbon__content">
                <div class="col-sm-12">
                    <h1 class="mb-0">Enrolment</h1>
                    <ul class="list-unstyled d-flex">
                        <li> <a href="#">Home /</a></li>
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
                                       

                                            <form action="{{ route('enrolmentstudent.store') }}" method="post"id="msform"
                                            enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <!-- progressbar -->
                                            <input type="hidden" name="courseinfo_id" value="{{ $course_info_id }}" placeholder="Email Id" />
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
                                                        <input type="radio" name="eligible_rd" value="is_eligible_mcq_osce" placeholder="Email Id" />
                                                        <label for="">I have done self-check through AHPRA that
                                                            indicates MCQ and OSCE </label>
                                                    </div>

                                                    <div class="e-input">
                                                        <input type="radio" name="eligible_rd" value="is_eligible_att" placeholder="Email Id" />
                                                        <label for="">I hold an Authority to Take (ATT) notification
                                                            from AHPRA </label>
                                                    </div>

                                                    <div class="e-input">
                                                        <input type="radio" name="eligible_rd" value="is_eligible_letter_ahpra" placeholder="Email Id" />
                                                        <label for="">I have a letter from AHPRA referring me to the OBA
                                                        </label>
                                                    </div>

                                                    <div class="e-input">
                                                        <input class="w-100" type="file" name="eligible_document" placeholder="" />

                                                        </label>
                                                    </div>


                                                </div> <input type="button" name="next" class="next action-button"
                                                    value="Next Step" />
                                            </fieldset>

                                            <fieldset>
                                                <div class="form-card">
                                                    <h2 class="fs-title">Identity Document</h2>
                                                    <div class="e-input">
                                                        <input type="radio" name="rd" value="is_id" placeholder="Email Id" />
                                                        <label for="">I have provided a copy of valid ID
                                                        </label>
                                                    </div>

                                                    <div class="e-input">
                                                        <input class="w-100" type="file" name="identity_document" placeholder="" />

                                                        </label>
                                                    </div>
                                                </div> <input type="button" name="previous"
                                                    class="previous action-button-previous" value="Previous" /> 
                                                    <input type="button" name="next" class="next action-button"
                                                    value="Next Step" />
                                            </fieldset>

                                            <fieldset>
                                                <div class="form-card">
                                                    <h2 class="fs-title">Detail Form</h2>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label for="">Company Name <span>*</span></label>
                                                                <input type="text" name="company_name" placeholder="Company Name"
                                                                    class="form-control" id="">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label for="">Email Address <span>*</span></label>
                                                                <input type="email" name="email_address" placeholder="Email Address"
                                                                    class="form-control" id="">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label for="">Contact Number (include country and
                                                                    area code) <span>*</span></label>
                                                                <input type="text"name="contact_number" placeholder="Contact Number"
                                                                    class="form-control" id="">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label for="">Residential Address
                                                                    <span>*</span></label>
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <input type="text"name="country" placeholder="Street ">
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" placeholder="Suburb ">
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" placeholder="Postcode ">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label for="">Referring Agency <span>*</span></label>
                                                                <input type="text" name="message"placeholder="Agency"
                                                                    class="form-control"></input>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-sm-4">
                                                                <button class="btn btn-neta"><a
                                                                        href="#">Submit</a></button>
                                                            </div> -->
                                                    </div>
                                                </div> <input type="button" name="previous"
                                                    class="previous action-button-previous" value="Previous" /> <input
                                                    type="button" name="make_payment" class="next action-button"
                                                    value="Confirm" />
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-card neta-payment">
                                                    <h2 class="fs-title">Payment</h2>
                                                    <div class="row justify-content-center">
                                                        <div class="col-sm-12">
                                                            <div class="order-summary">
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
                                                            </div>


                                                            <h5>You Order Summary</h5>
                                                            <table class="table">
                                                                <tr>
                                                                    <td>Enrol NCLEX</td>
                                                                    <td class="text-right">$2,500</td>
                                                                </tr>

                                                                <tr class="total">
                                                                    <td>Total</td>
                                                                    <td class="text-right">$2,500</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="payment-method">
                                                            <h5>Payment Method</h5>
                                                            <img src="{{ asset('img/eway.png') }}" width="100px" alt="">
                                                                                <img src="{{ asset('img/visaa.png') }}" width="80px"
                                                                                    alt="">
                                                                                <img src="{{ asset('img/mst.png') }}" width="80px"
                                                                                    alt="">
                                                        </div>
                                                    </div>
                                                    <div class="" id="msform">

                                                        <button class="btn action-button">Make Payment</button>
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