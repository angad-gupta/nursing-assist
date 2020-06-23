{{--<div class="row">--}}
    {{--<div class="col-md-12">--}}
        {{--<div id="accordion-styled">--}}
            {{--<div class="card-group-control card-group-control-right" id="accordion-control-right">--}}
                {{--<div class="card">--}}
                    {{--<div class="card-header bg-teal">--}}
                        {{--<h6 class="card-title">--}}
                            {{--<a data-toggle="collapse" class="text-white collapsed" href="#accordion-styled-group5"--}}
                                   {{--aria-expanded="false">Employee Medical Information</a>--}}
                            {{--</h6>--}}
                        {{--</div>--}}

                    {{--<div id="accordion-styled-group5" class="collapse" data-parent="#accordion-styled" style="display: block">--}}
                        {{--<div class="card-body">--}}
                            {{--@include('employment::employment.partial.employee_medical')--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

<div class="row">
    <div class="col-md-12">
        <div id="accordion-styled">
            <div class="card-group-control card-group-control-right" id="accordion-control-right">
                <div class="card">
                    <div class="card-header bg-teal">
                        <h6 class="card-title">
                            <a data-toggle="collapse" class="text-white collapsed" href="#accordion-styled-group6"
                               aria-expanded="false">Employee Interest Information</a>
                        </h6>
                    </div>

                    <div id="accordion-styled-group6" class="collapse" data-parent="#accordion-styled" style="">
                        <div class="card-body">
                            @include('employment::employment.partial.employee_interest')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div id="accordion-styled">
            <div class="card-group-control card-group-control-right" id="accordion-control-right">
                <div class="card">
                    <div class="card-header bg-teal">
                        <h6 class="card-title">
                            <a data-toggle="collapse" class="text-white collapsed" href="#accordion-styled-group7"
                               aria-expanded="false">Disclosure of Relatives Working in This Office</a>
                        </h6>
                    </div>

                    <div id="accordion-styled-group7" class="collapse" data-parent="#accordion-styled" style="">
                        <div class="card-body">
                            @include('employment::employment.partial.employee_relative')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div id="accordion-styled">
            <div class="card-group-control card-group-control-right" id="accordion-control-right">
                <div class="card">
                    <div class="card-header bg-teal">
                        <h6 class="card-title">
                            <a data-toggle="collapse" class="text-white collapsed" href="#accordion-styled-group8"
                               aria-expanded="false">Location Map of Employee's Residence</a>
                        </h6>
                    </div>

                    <div id="accordion-styled-group8" class="collapse" data-parent="#accordion-styled" style="">
                        <div class="card-body">
                            @include('employment::employment.partial.employee_location')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>