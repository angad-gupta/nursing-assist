@extends('admin::layout')
@section('title')Employee @stop
@section('breadcrum')Create Employee @stop

@section('script')
    <!-- Theme JS files -->
    <script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script src="{{asset('admin/global/js/demo_pages/form_inputs.js')}}"></script>

    <script src="{{ asset('admin/global/js/plugins/pickers/pickadate/picker.js')}}"></script>
    <script src="{{ asset('admin/global/js/plugins/pickers/pickadate/picker.date.js')}}"></script>
    <script src="{{ asset('admin/global/js/plugins/pickers/pickadate/picker.time.js')}}"></script>
    <script src="{{ asset('admin/global/js/plugins/pickers/daterangepicker.js')}}"></script>
    <script src="{{ asset('admin/global/js/plugins/pickers/anytime.min.js')}}"></script>
    <script src="{{ asset('admin/global/js/plugins/pickers/pickadate/legacy.js')}}"></script>
    <script src="{{ asset('admin/global/js/demo_pages/picker_date.js')}}"></script>
    <script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script src="{{ asset('admin/global/js/plugins/forms/styling/switch.min.js')}}"></script>

    <!-- /theme JS files -->

    <script src="{{ asset('admin/validation/employee.js')}}"></script>

@stop @section('content')


    {!! Form::open(['route'=>'employment.store','method'=>'POST','id'=>'employee_submit','class'=>'form-horizontal','role'=>'form','files' => true]) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header header-elements-inline bg-teal">
                    <h5 class="card-title">Employee Details</h5>
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                    </div>
                </div>

                <div class="card-body">
                    @include('employment::employment.partial.basicEmployeeDetail')
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
                                {{-- <a data-toggle="collapse" class="text-white collapsed" href="#accordion-styled-group1"
                                   aria-expanded="false"> Employee Documents</a> --}}

                                   <a> Salary Details</a>
                            </h6>
                        </div>
                        <div class="card-body">
                                @include('employment::employment.partial.salarydetail')
                            </div>

                        {{-- <div id="accordion-styled-group1" class="collapse" data-parent="#accordion-styled" style="">
                            <div class="card-body">
                                @include('employment::employment.partial.additional')
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <div class="text-right">
                        <button type="submit" class="btn bg-teal-400">Save <i class="icon-database-insert"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- /form inputs -->
    {!! Form::close() !!}
@stop