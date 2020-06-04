@inject('menuRoles', '\App\Modules\User\Services\CheckUserRoles')
@php
    $currentRoute = Request::route()->getName();
    $Route = explode('.',$currentRoute);
@endphp

<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md" @if($setting != null)) style="background-color: {{$setting->secondary_navbar_color}};" @endif>

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center"> 
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->
    
    <!-- Sidebar content -->
    <div class="sidebar-content">
        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header">
                    <div class="text-uppercase font-size-xs line-height-xs">General</div>
                    <i class="icon-menu" title="General"></i></li>

                <li class="nav-item">
                    <a href="{{url('admin/dashboard')}}" class="nav-link @if($Route[0]=='dashboard') active @endif"
                       data-popup="tooltip" data-original-title="Dashboard" data-placement="right">
                        <i class="icon-home4"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @if($menuRoles->assignedRoles('employment.index'))
                    <li class="nav-item">
                        <a href="{{route('employment.index')}}"
                           class="nav-link @if($Route[0]=='employment') active @endif" data-popup="tooltip"
                           data-original-title="Employee Management" data-placement="right">
                            <i class="icon-users4"></i>
                            <span>Employee Management</span>
                        </a>
                    </li>
                @endif
                @if($menuRoles->assignedRoles('employee.list'))
                    <li class="nav-item">
                        <a href="{{route('employee.list')}}"
                           class="nav-link @if($Route[0]=='employee') active @endif"
                           data-popup="tooltip" data-original-title="Employee Directory" data-placement="right">
                            <i class="icon-address-book2"></i>
                            <span>Employee Directory</span>
                        </a>
                    </li>
                @endif

                @if($menuRoles->assignedRoles('setting.create'))
                    <li class="nav-item">
                        <a href="{{route('setting.create')}}"
                           class="nav-link @if($Route[0]=='setting') active @endif" data-popup="tooltip"
                           data-original-title="Setting Management" data-placement="right">
                            <i class="icon-question7"></i>
                            <span>Setting Management</span>
                        </a>
                    </li>
                @endif
                @if($menuRoles->assignedRoles('dropdown.index') || Auth::user()->user_type == 'super_admin')
                    <li class="nav-item">
                        <a href="{{route('dropdown.index')}}"
                           class="nav-link @if($Route[0]=='dropdown') active @endif"
                           data-popup="tooltip" data-original-title="Dropdown Management"
                           data-placement="right">
                            <i class="icon-move-vertical"></i>
                            <span>Dropdown Management</span>
                        </a>
                    </li>
                @endif

                @if($menuRoles->assignedRoles('role.index') || Auth::user()->user_type == 'super_admin')
                    <li class="nav-item">
                        <a href="{{route('role.index')}}"
                           class="nav-link @if($Route[0]=='role') active @endif"
                           data-popup="tooltip" data-original-title="Role Management"
                           data-placement="right">
                            <i class="icon-pencil5"></i>
                            <span>Role Management</span>
                        </a>
                    </li>
                @endif


                <li class="nav-item-header">
                    <div class="text-uppercase font-size-xs line-height-xs">Advance NAI Features
                    </div>
                    <i class="icon-menu" title="Advance Covid-19 Features"></i>
                </li>

                  @if($menuRoles->assignedRoles('banner.index'))
                    <li class="nav-item">
                        <a href="{{route('banner.index')}}"
                           class="nav-link @if($Route[0]=='banner') active @endif"
                           data-popup="tooltip" data-original-title="Banner Management"
                           data-placement="right">
                            <i class="icon-newspaper"></i>
                            <span>Banner Management</span>
                        </a>
                    </li>
                    @endif

                      @if($menuRoles->assignedRoles('team.index'))
                    <li class="nav-item">
                        <a href="{{route('team.index')}}"
                           class="nav-link @if($Route[0]=='team') active @endif"
                           data-popup="tooltip" data-original-title="Team Management"
                           data-placement="right">
                            <i class="icon-newspaper"></i>
                            <span>Team Management</span>
                        </a>
                    </li>
                    @endif

                      @if($menuRoles->assignedRoles('page.index'))
                    <li class="nav-item">
                        <a href="{{route('page.index')}}"
                           class="nav-link @if($Route[0]=='page') active @endif"
                           data-popup="tooltip" data-original-title="Page Management"
                           data-placement="right">
                            <i class="icon-newspaper"></i>
                            <span>Page Management</span>
                        </a>
                    </li>
                    @endif

                      @if($menuRoles->assignedRoles('agent.index'))
                    <li class="nav-item">
                        <a href="{{route('agent.index')}}"
                           class="nav-link @if($Route[0]=='agent') active @endif"
                           data-popup="tooltip" data-original-title="Agents Management"
                           data-placement="right">
                            <i class="icon-users"></i>
                            <span>Agents Management</span>
                        </a>
                    </li>
                    @endif   

                    @if($menuRoles->assignedRoles('contactus.index'))
                    <li class="nav-item">
                        <a href="{{route('contactus.index')}}"
                           class="nav-link @if($Route[0]=='contactus') active @endif"
                           data-popup="tooltip" data-original-title="Contact Us"
                           data-placement="right">
                            <i class="icon-address-book"></i>
                            <span>Contact Us</span>
                        </a>
                    </li>
                    @endif

                    @if($menuRoles->assignedRoles('course.index'))
                    <li class="nav-item">
                        <a href="{{route('course.index')}}"
                           class="nav-link @if($Route[0]=='course') active @endif"
                           data-popup="tooltip" data-original-title="Course Management"
                           data-placement="right">
                            <i class="icon-graduation2"></i>
                            <span>Course Management</span>
                        </a>
                    </li>
                    @endif      

                    @if($menuRoles->assignedRoles('courseinfo.index'))
                    <li class="nav-item">
                        <a href="{{route('courseinfo.index')}}"
                           class="nav-link @if($Route[0]=='courseinfo') active @endif"
                           data-popup="tooltip" data-original-title="CourseInfo Management"
                           data-placement="right">
                            <i class="icon-archive"></i>
                            <span>CourseInfo Management</span>
                        </a>
                    </li>
                    @endif

                    @if($menuRoles->assignedRoles('courseintake.index'))
                        <li class="nav-item">
                            <a href="{{route('courseintake.index')}}"
                               class="nav-link @if($Route[0]=='courseintake') active @endif"
                               data-popup="tooltip" data-original-title="Course Intake"
                               data-placement="right">
                                <i class="icon-stack-text"></i>
                                <span>Course Intake</span>
                            </a>
                        </li>
                    @endif

            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>
