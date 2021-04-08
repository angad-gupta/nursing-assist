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
                    <a href="{{url('admin/dashboard')}}" class="nav-link @if($Route[0]=='dashboard') active @endif" data-popup="tooltip" data-original-title="Dashboard" data-placement="right">
                        <i class="icon-home4"></i><span>Dashboard</span>
                    </a>
                </li>
                @if($menuRoles->assignedRoles('employment.index'))
                    <li class="nav-item">
                        <a href="{{route('employment.index')}}" class="nav-link @if($Route[0]=='employment') active @endif" data-popup="tooltip" data-original-title="Employee Management" data-placement="right">
                            <i class="icon-users4"></i><span>Employee Management</span>
                        </a>
                    </li>
                @endif
                @if($menuRoles->assignedRoles('employee.list'))
                    <li class="nav-item">
                        <a href="{{route('employee.list')}}" class="nav-link @if($Route[0]=='employee') active @endif" data-popup="tooltip" data-original-title="Employee Directory" data-placement="right">
                            <i class="icon-address-book2"></i><span>Employee Directory</span>
                        </a>
                    </li>
                @endif

                @if($menuRoles->assignedRoles('setting.create'))
                    <li class="nav-item">
                        <a href="{{route('setting.create')}}" class="nav-link @if($Route[0]=='setting') active @endif" data-popup="tooltip" data-original-title="Setting Management" data-placement="right">
                            <i class="icon-question7"></i><span>Setting Management</span>
                        </a>
                    </li>
                @endif
              <!--   @if($menuRoles->assignedRoles('dropdown.index') || Auth::user()->user_type == 'super_admin')
                    <li class="nav-item">
                        <a href="{{route('dropdown.index')}}"
                           class="nav-link @if($Route[0]=='dropdown') active @endif"
                           data-popup="tooltip" data-original-title="Dropdown Management"
                           data-placement="right">
                            <i class="icon-move-vertical"></i>
                            <span>Dropdown Management</span>
                        </a>
                    </li>
                @endif -->

                @if($menuRoles->assignedRoles('role.index') || Auth::user()->user_type == 'super_admin')
                    <li class="nav-item">
                        <a href="{{route('role.index')}}" class="nav-link @if($Route[0]=='role') active @endif" data-popup="tooltip" data-original-title="Role Management" data-placement="right">
                            <i class="icon-pencil5"></i><span>Role Management</span>
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
                        <a href="{{route('banner.index')}}" class="nav-link @if($Route[0]=='banner') active @endif" data-popup="tooltip" data-original-title="Banner Management" data-placement="right">
                            <i class="icon-newspaper"></i><span>Banner Management</span>
                        </a>
                    </li>
                    @endif

                      @if($menuRoles->assignedRoles('team.index'))
                    <li class="nav-item">
                        <a href="{{route('team.index')}}" class="nav-link @if($Route[0]=='team') active @endif" data-popup="tooltip" data-original-title="Team Management" data-placement="right">
                            <i class="icon-newspaper"></i><span>Team Management</span>
                        </a>
                    </li>
                    @endif

                      @if($menuRoles->assignedRoles('page.index'))
                    <li class="nav-item">
                        <a href="{{route('page.index')}}" class="nav-link @if($Route[0]=='page') active @endif" data-popup="tooltip" data-original-title="Page Management" data-placement="right">
                            <i class="icon-newspaper"></i><span>Page Management</span>
                        </a>
                    </li>
                    @endif

                      @if($menuRoles->assignedRoles('agent.index'))
                    <li class="nav-item">
                        <a href="{{route('agent.index')}}" class="nav-link @if($Route[0]=='agent') active @endif" data-popup="tooltip" data-original-title="Agents Management" data-placement="right">
                            <i class="icon-users"></i><span>Agents Management</span>
                        </a>
                    </li>
                    @endif  

                      @if($menuRoles->assignedRoles('faq.index'))
                    <li class="nav-item">
                        <a href="{{route('faq.index')}}" class="nav-link @if($Route[0]=='faq') active @endif" data-popup="tooltip" data-original-title="FAQ Management" data-placement="right">
                            <i class="icon-bubbles9"></i><span>FAQ Management</span>
                        </a>
                    </li>
                    @endif   

                    @if($menuRoles->assignedRoles('announcement.index'))
                    <li class="nav-item">
                        <a href="{{route('announcement.index')}}" class="nav-link @if($Route[0]=='announcement') active @endif" data-popup="tooltip" data-original-title="Announcement Management" data-placement="right">
                            <i class="icon-megaphone"></i><span>Announcement Management</span>
                        </a>
                    </li>
                    @endif   

                    @if($menuRoles->assignedRoles('message.index'))
                    <li class="nav-item">
                        <a href="{{route('message.index')}}" class="nav-link @if($Route[0]=='message') active @endif" data-popup="tooltip" data-original-title="Message From Student" data-placement="right">
                            <i class="icon-bubbles6"></i><span>Message From Student</span>
                        </a>
                    </li>
                    @endif   


                      @if($menuRoles->assignedRoles('quiz.index'))
                    <li class="nav-item">
                        <a href="{{route('quiz.index')}}" class="nav-link @if($Route[0]=='quiz') active @endif" data-popup="tooltip" data-original-title="Quiz Management" data-placement="right">
                            <i class="icon-question7"></i><span>Quiz Management</span>
                        </a>
                    </li>
                    @endif  

                      @if($menuRoles->assignedRoles('mockup.index'))
                    <li class="nav-item">
                        <a href="{{route('mockup.index')}}" class="nav-link @if($Route[0]=='mockup') active @endif" data-popup="tooltip" data-original-title="Mockup Test Management" data-placement="right">
                            <i class="icon-paste"></i><span>Mock Test Management</span>
                        </a>
                    </li>
                    @endif   

                    @if($menuRoles->assignedRoles('readiness.index'))
                    <li class="nav-item">
                        <a href="{{route('readiness.index')}}" class="nav-link @if($Route[0]=='readiness') active @endif" data-popup="tooltip" data-original-title="Readiness Exam Management" data-placement="right">
                            <i class="icon-clipboard2"></i><span>Readiness Exam Management</span>
                        </a>
                    </li>
                    @endif   

                    @if($menuRoles->assignedRoles('contactus.index'))
                    <li class="nav-item">
                        <a href="{{route('contactus.index')}}" class="nav-link @if($Route[0]=='contactus') active @endif" data-popup="tooltip" data-original-title="Contact Us" data-placement="right">
                            <i class="icon-address-book"></i><span>Contact Us</span>
                        </a>
                    </li>
                    @endif

                    @if($menuRoles->assignedRoles('student.index'))
                    <li class="nav-item">
                        <a href="{{route('student.index')}}" class="nav-link @if($Route[0]=='student') active @endif" data-popup="tooltip" data-original-title="Student Management" data-placement="right">
                            <i class="icon-users4"></i><span>Student Management</span>
                        </a>
                    </li>
                    @endif

                    @if($menuRoles->assignedRoles('enrolment.index'))
                    <li class="nav-item">
                        <a href="{{route('enrolment.index')}}" class="nav-link @if($Route[0]=='enrolment') active @endif" data-popup="tooltip" data-original-title="Enrolment" data-placement="right">
                            <i class="icon-reading"></i><span>Enrolment</span>
                        </a>
                    </li>
                    @endif

                    @if($menuRoles->assignedRoles('invoice.logs'))
                    <li class="nav-item">
                        <a href="{{route('invoice.logs')}}" class="nav-link @if($Route[0]=='invoice') active @endif" data-popup="tooltip" data-original-title="Invoice History" data-placement="right">
                            <i class="icon-profile"></i><span>Invoice History</span>
                        </a>
                    </li>
                    @endif

                    @if($menuRoles->assignedRoles('course.index'))
                    <li class="nav-item">
                        <a href="{{route('course.index')}}" class="nav-link @if($Route[0]=='course') active @endif" data-popup="tooltip" data-original-title="Course Management" data-placement="right">
                            <i class="icon-graduation2"></i><span>Course Management</span>
                        </a>
                    </li>
                    @endif      

                    @if($menuRoles->assignedRoles('courseinfo.index'))
                    <li class="nav-item">
                        <a href="{{route('courseinfo.index')}}" class="nav-link @if($Route[0]=='courseinfo') active @endif" data-popup="tooltip" data-original-title="CourseInfo Management" data-placement="right">
                            <i class="icon-archive"></i><span>CourseInfo Management</span>
                        </a>
                    </li>
                    @endif


                    @if($menuRoles->assignedRoles('syllabus.index'))
                    <li class="nav-item">
                        <a href="{{route('syllabus.index')}}" class="nav-link @if($Route[0]=='syllabus') active @endif" data-popup="tooltip" data-original-title="Syllabus Management" data-placement="right">
                            <i class="icon-book"></i><span>Syllabus Management</span>
                        </a>
                    </li>
                    @endif

                    @if($menuRoles->assignedRoles('coursecontent.index'))
                    <li class="nav-item">
                        <a href="{{route('coursecontent.index')}}" class="nav-link @if($Route[0]=='coursecontent') active @endif" data-popup="tooltip" data-original-title="Course Content Management" data-placement="right">
                            <i class="icon-book3"></i><span>Course Content Management</span>
                        </a>
                    </li>
                    @endif


                    @if($menuRoles->assignedRoles('resource.index'))
                    <li class="nav-item">
                        <a href="{{route('resource.index')}}" class="nav-link @if($Route[0]=='resource') active @endif" data-popup="tooltip" data-original-title="Resource Management" data-placement="right">
                            <i class="icon-archive"></i><span>Resource Management</span>
                        </a>
                    </li>
                    @endif

                    @if($menuRoles->assignedRoles('registration.index'))
                    <li class="nav-item">
                        <a href="{{route('registration.index')}}" class="nav-link @if($Route[0]=='registration') active @endif" data-popup="tooltip" data-original-title="Registration Management" data-placement="right">
                            <i class="icon-profile"></i><span>Registration Management</span>
                        </a>
                    </li>
                    @endif

                    @if($menuRoles->assignedRoles('blog.index'))
                    <li class="nav-item">
                        <a href="{{route('blog.index')}}" class="nav-link @if($Route[0]=='blog') active @endif" data-popup="tooltip" data-original-title="Blog Management" data-placement="right">
                            <i class="icon-blogger"></i><span>Blog Management</span>
                        </a>
                    </li>
                    @endif

                    @if($menuRoles->assignedRoles('gallery.index'))
                    <li class="nav-item">
                        <a href="{{route('gallery.index')}}" class="nav-link @if($Route[0]=='gallery') active @endif" data-popup="tooltip" data-original-title="Gallery Management" data-placement="right">
                            <i class="icon-images2"></i><span>Gallery Management</span>
                        </a>
                    </li>
                    @endif

                    @if($menuRoles->assignedRoles('video.index'))
                    <li class="nav-item">
                        <a href="{{route('video.index')}}" class="nav-link @if($Route[0]=='video') active @endif" data-popup="tooltip" data-original-title="Video Management" data-placement="right">
                            <i class="icon-play"></i><span>Video Management</span>
                        </a>
                    </li>
                    @endif

                    @if($menuRoles->assignedRoles('newsletter.index'))
                    <li class="nav-item">
                        <a href="{{route('newsletter.index')}}" class="nav-link @if($Route[0]=='newsletter') active @endif" data-popup="tooltip" data-original-title="Newsletter Management" data-placement="right">
                            <i class="icon-mailbox"></i><span>Newsletter Management</span>
                        </a>
                    </li>
                    @endif


                    @if($menuRoles->assignedRoles('forum.index'))
                    <li class="nav-item">
                        <a href="{{route('forum.index')}}" class="nav-link @if($Route[0]=='forum') active @endif" data-popup="tooltip" data-original-title="Forums" data-placement="right">
                            <i class="icon-bubbles6"></i><span>Forums</span>
                        </a>
                    </li>
                    @endif

                    @if($menuRoles->assignedRoles('whatourstudentsay.index'))
                    <li class="nav-item">
                        <a href="{{route('whatourstudentsay.index')}}" class="nav-link @if($Route[0]=='whatourstudentsay') active @endif" data-popup="tooltip" data-original-title="What Our Student Say" data-placement="right">
                            <i class="icon-bubbles4"></i><span>What Our Student Say</span>
                        </a>
                    </li>
                    @endif


            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>
