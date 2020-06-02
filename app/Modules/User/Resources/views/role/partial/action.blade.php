<script src="{{asset('admin/global/js/plugins/ui/fab.min.js')}}"></script>

<script src="{{asset('admin/global/js/plugins/ui/sticky.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/ui/prism.min.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/extra_fab.js')}}"></script>

<!-- Top right menu -->
<ul class="fab-menu fab-menu-absolute fab-menu-top-right" data-fab-toggle="hover" id="fab-menu-affixed-demo-right">
    <li>
        <button type="submit" class="fab-menu-btn btn bg-pink-300 btn-float rounded-round btn-icon"><i
                    class="icon-database-insert" data-popup="tooltip" data-placement="bottom"
                    data-original-title="{{ $btnType }}"></i></button>

    </li>
</ul>
<!-- /top right menu -->


<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>
    <div class="form-group row">
        <div class="col-lg-12">
            <div class="row">
                <label class="col-form-label col-lg-3">Role Name :<span class="text-danger">*</span></label>
                <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-envelop2"></i></span>
                        </span>
                        {!! Form::text('name', $value = null, ['id'=>'name','placeholder'=>'Enter Role Name','class'=>'form-control','required' =>'required']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-12">
            <div class="row">
                <label class="col-form-label col-lg-3">Select User Type :<span class="text-danger">*</span></label>
                <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-envelop2"></i></span>
                        </span>
                        {!! Form::select('user_type',$user_type ,$value = null, ['id'=>'user_type','class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</fieldset>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-dark text-white d-flex justify-content-between">
                <h6 class="card-title">List of Modules</h6>
            </div>
        </div>
    </div>
</div>

@php
    $module =array();
    $num = 1;
    $route_name = array();
    $route_list = array();
@endphp

@foreach($routes as $key => $value)
    @php $explode_module = explode(' ',$value);
        $route = $explode_module[0];
        $module[$route][$key] = $value;
        $route_name[] = $route;
        $num++;
    @endphp
@endforeach
@php
    $unique_route = array_unique($route_name);
@endphp

<div class="row">
    @foreach($unique_route as $routeKey => $routeVal)
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-grey-400 text-white header-elements-inline">
                    <h6 class="card-title">{{$routeVal}}</h6>
                    <div class="header-elements">
                        <button type="button" class="btn bg-success btn-icon select_all" data-popup="tooltip"
                                data-placement="top" data-original-title="Select All"><i
                                    class="icon-checkmark-circle2"></i></button>
                        <button type="button" class="btn bg-warning btn-icon ml-3 clear_all" data-popup="tooltip"
                                data-placement="top" data-original-title="Clear All"><i class="icon-eraser2"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    @php
                        $new_module = array_shift($module);
                    @endphp
                    @foreach($new_module as $modkey => $modVal)
                        @php
                            $explode_module = explode(' ',$modVal);
                            $checked = '';
                            $name_1=(isset($explode_module[1])) ? $explode_module[1] : $explode_module[0];
                            $name_2=(isset($explode_module[2])) ? $explode_module[2] : "";
                            $name_3=(isset($explode_module[3])) ? $explode_module[3] : "";
                            $name_4=(isset($explode_module[4])) ? $explode_module[4] : "";
                            $name_5=(isset($explode_module[5])) ? $explode_module[5] : "";
                            $name_6=(isset($explode_module[6])) ? $explode_module[6] : "";
                            $module_name = $name_1." ".$name_2." ".$name_3." ".$name_4." ".$name_5." ".$name_6;
                        @endphp
                        @if($routeVal == $explode_module[0])
                            @if(count($permission) > 0)
                                @php
                                    $test['route_name']=$modkey;
                                if(in_array($test,$permission))
                                {
                                    $checked = "checked='checked'";
                                }
                                @endphp
                            @endif

                            <div class="form-check">
                                <label class="form-check-label">
                                    <input {{$checked}} type="checkbox" name="route_name[]" value="{{$modkey}}"
                                           class='form-check-input module_checkbox'/> {{$module_name}}
                                </label>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="text-right">
    <button type="submit" class="btn bg-teal-400">{{ $btnType }} <i class="icon-database-insert"></i></button>
</div>


<script type="text/javascript">

    $(document).ready(function () {

        $(document).on('click', '.select_all', function () {
            $(this).parent().parent().siblings().find('.module_checkbox').prop('checked', 'true');
        });

        $(document).on('click', '.clear_all', function () {
            $(this).parent().parent().siblings().find('.module_checkbox').prop('checked', false);
        });

    });

</script>
