<head>
    <title>NETA</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link href="{{asset('home/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('home/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('home/css/custom.css')}}" rel="stylesheet">

</head>

@if($status == 'download')
    <body onload="window.print();">
@else
    <body>
@endif

<section class="neta-invoice">
    <div class="container">
        <div class="row">
            <div class="neta-invoice__wrap">
                <div class="col-sm-12">
                    <div class="neta-invoice__header">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="{{asset('home/img/logo.svg')}}" width="150px" alt="">
                            </div>

                            <div class="col-sm-6">
                                <h5>Nursing Education & Training Australia</h5>
                                <ul class="list-unstyled">
                                    <li>+61 434048478</li>
                                    <li>accounts@nursingeta.com</li>
                                    <li>www.nursingeta.com</li>
                                    <li>ABN 88641245187</li>
                                </ul>
                            </div>

                            <div class="col-sm-3">
                                <h4>Tax Invoice {{ $student_puchase_info->id }}</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="neta-invoice__to b-line">
                        <div class="row">
                            <div class="col-sm-6">
                                <h5>INVOICE TO</h5>
                                <ul class="list-unstyled">
                                    <li>{{optional($student_puchase_info->studentInfo)->full_name}}</li>
                                    <li>{{optional($student_puchase_info->studentInfo)->phone_no}}</li>
                                    <li>{{optional($student_puchase_info->studentInfo)->primary_address}}</li>
                                    <li>{{optional($student_puchase_info->studentInfo)->email}}</li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                               <div class="pay-box d-flex">
                                   <ul class="list-unstyled">
                                       <li>
                                           <h5>Date</h5>
                                           <span>{{ date('d M, Y',strtotime($student_puchase_info->created_at))}}</span>
                                       </li>
                                   </ul>

                                   <ul class="list-unstyled p-pay">
                                    <li>
                                        <h5>Please Pay</h5>
                                        @if(optional($student_puchase_info->courseInfo)->payment_mode != 'one off payment')
                                        <span>A${{str_replace(',', '', optional($student_puchase_info->courseInfo)->course_fee) + 137.50 }}</span>
                                        @else
                                        <span>A${{optional($student_puchase_info->courseInfo)->course_fee}}</span>
                                        @endif
                                    </li>
                                </ul>

                              <!--   <ul class="list-unstyled">
                                    <li>
                                        <h5>Due Date</h5>
                                        <span>2020/12/25</span>
                                    </li>
                                </ul> -->
                               </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="neta-invoice__method b-line">
                        <div class="row">
                            <div class="col-sm-12 mb-3">
                                <h5 class="mb-0">PMT Method</h5>
                                <span>Bank Deposit</span>
                            </div>

                            <div class="col-sm-12">
                                <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Activity</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">GST</th>
                                        <th scope="col">QTY</th>
                                        <th scope="col">Rate</th>
                                        <th scope="col">Paid Amount</th>
                                        <th scope="col">Remaining Amount</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th>{{ date('Y/m/d',strtotime($student_puchase_info->created_at))}}</th>
                                        <td>{{optional($student_puchase_info->courseInfo)->course_program_title}} Package</td>
                                        <td width="30%">{!! optional($student_puchase_info->courseInfo)->short_content !!}</td>
                                        <td>GST</td>
                                        <td>1</td>
                                        <td>A${{ numberFormat(str_replace(',', '', optional($student_puchase_info->courseInfo)->course_fee))}}</td>
                                        <td>A${{numberFormat($student_puchase_info->amount_paid)}}</td>
                                        <td>A${{ numberFormat($student_puchase_info->amount_left) }}</td>
                                      </tr>
                    
                                    </tbody>
                                  </table>
                            </div>
                            
                        </div>
                    </div>
                </div>

                 @php 
                    $course_fee = optional($student_puchase_info->courseInfo)->course_fee;
                    $gst = (10/100) * str_replace(',', '', $course_fee);
                @endphp
                <div class="col-sm-12">
                    <div class="neta-invoice__total b-line">
                        <div class="row">
                            <div class="col-sm-6 offset-6">
                                <table class="table">
                                    <tr>
                                        <th>INCLUDES GST TOTAL</th>
                                        <td>A${{numberFormat($gst)}}</td>
                                    </tr>
                                    @if(optional($student_puchase_info->courseInfo)->payment_mode != 'one off payment')
                                        <tr>
                                            <th>Intial Payment + Administration Fee(2.5%)</th>
                                            <td>A$1,637.50</td>
                                        </tr>
                                        <tr>
                                            <th>Second Installment</th>
                                            <td>A$2,500</td>
                                        </tr>
                                        <tr>
                                            <th>Final Installment</th>
                                            <td>A$1,500</td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td>A$5,637.50</td>
                                        </tr>
                                    @else 
                                    <tr>
                                        <th>Total</th>
                                        <td>A${{numberFormat(str_replace(',', '', optional($student_puchase_info->courseInfo)->course_fee))}}</td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <th>Deposit(-)</th>
                                        <td>A${{numberFormat($student_puchase_info->amount_paid)}}</td>
                                    </tr>
                                    <tr class="t-top">
                                        <th>Total</th>
                                        <td class="f-bold">A${{ numberFormat($student_puchase_info->amount_left)}}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Thank You</td>
                                    </tr>
                                
                                  </table>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="neta-invoice__method b-line">
                        <div class="row">
                            <div class="col-sm-12 mb-3">
                                <h5 class="mb-0">BAS Summary</h5>
                              
                            </div>

                           
                            <div class="col-sm-12">
                                <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th scope="col">Rate</th>
                                        <th scope="col">GST</th>
                                        <th scope="col">NET</th>
                                        @if(optional($student_puchase_info->courseInfo)->payment_mode != 'one off payment')
                                        <th scope="col">Administration Fee(2.5%)</th>
                                        @endif
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th>GST @ 10%</th>
                                        <td>A${{numberFormat($gst)}}</td>
                                        <td>A${{numberFormat(str_replace(',', '', optional($student_puchase_info->courseInfo)->course_fee))}}</td>
                                        @if(optional($student_puchase_info->courseInfo)->payment_mode != 'one off payment')
                                            <td>A$137.50</td>
                                        @endif
                                      </tr>
                                    </tbody>
                                  </table>
                            </div>

                            <div class="col-sm-12 bank-detail">
                                <ul class="list-unstyled">
                                    <li>Bank Details</li>
                                    <li>Nursing Education & Training Australia</li>
                                    <li>BSB: 062 692</li>
                                    <li>Account Number: 4067 0654</li>
                                </ul>
                            </div>                            
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="section-padding"></section>

</body>