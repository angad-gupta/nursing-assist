@extends('admin::layout')
@section('title')Dashboard @stop
@section('breadcrum')Dashboard @stop
@section('content')


    <!-- Main content -->
    <div class="content-wrapper">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-header page-header-dark mb-0" style="background-color: #933873;">
                    <div class="page-header-content header-elements-inline px-3">
                        <div class="page-title">
                            <h5>
                                <i class="icon-arrow-left52 mr-2"></i>
                                <span class="font-weight-semibold">Welcome To Nursing Education &amp; Training Australia(NETA) CMS</span></h5>
                        </div>

                    </div>

                    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline px-3">
                        <div class="d-flex">
                            <div class="breadcrumb">
                                <a href="https://nursingeta.com/admin/dashboard" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content area -->
        <div class="content">

            <section class="quick-links">
                <div class="row">
                    <div class="col-xl-2">
                        <a href="http://lg.bidheegroup.com/admin/organization">
                            <div class="card bd-card card-body bd-card-body bg-gradient-green pt-4 pb-4">
                                <div class="text-center bd-card-info">
                                    <i class="icon-users4 icon-3x rounded-round pb-1"></i>
                                    <h6 class="m-0 font-weight-semibold">Employees</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-2">
                        <a href="http://lg.bidheegroup.com/admin/payroll">
                            <div class="card bd-card card-body bd-card-body bg-gradient-green-2 pt-4 pb-4">
                                <div class="text-center bd-card-info">
                                    <i class="icon-clipboard3 icon-3x rounded-round pb-1"></i>
                                    <h6 class="m-0 font-weight-semibold">Enrollment</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-2">
                        <a href="http://lg.bidheegroup.com/admin/employment">
                            <div class="card bd-card card-body bd-card-body bg-gradient-blue pt-4 pb-4">
                                <div class="text-center bd-card-info">
                                    <i class="icon-collaboration icon-3x rounded-round pb-1"></i>
                                    <h6 class="m-0 font-weight-semibold">Teams</h6>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-2">
                        <a href="http://lg.bidheegroup.com/admin/daily-attendance">
                            <div class="card bd-card card-body bd-card-body bg-gradient-brown pt-4 pb-4">
                                <div class="text-center bd-card-info">
                                    <i class="icon-user-tie icon-3x rounded-round pb-1"></i>
                                    <h6 class="m-0 font-weight-semibold">Agents</h6>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-xl-2">
                        <a href="http://lg.bidheegroup.com/admin/leave">
                            <div class="card bd-card card-body bd-card-body bg-gradient-purple pt-4 pb-4">
                                <div class="text-center bd-card-info">
                                    <i class="icon-menu2 icon-3x rounded-round pb-1"></i>
                                    <h6 class="m-0 font-weight-semibold">Syllabus</h6>
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="col-xl-2">
                        <a href="http://lg.bidheegroup.com/admin/tada">
                            <div class="card bd-card card-body bd-card-body bg-gradient-red pt-4 pb-4">
                                <div class="text-center bd-card-info">
                                    <i class="icon-folder2 icon-3x rounded-round pb-1"></i>
                                    <h6 class="m-0 font-weight-semibold">Resources</h6>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </section>

            <div class="row">
                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body">
                        <div class="media">
                            <div class="mr-3 align-self-center">
                                <i class="icon-user icon-3x text-success-400"></i>
                            </div>

                            <div class="media-body text-right">
                                <h3 class="font-weight-semibold mb-0">652,549</h3>
                                <span class="text-uppercase font-size-sm text-muted">total Students</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body">
                        <div class="media">
                            <div class="mr-3 align-self-center">
                                <i class="icon-clipboard3 icon-3x text-indigo-400"></i>
                            </div>

                            <div class="media-body text-right">
                                <h3 class="font-weight-semibold mb-0">245,382</h3>
                                <span class="text-uppercase font-size-sm text-muted">total enrollment</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body">
                        <div class="media">
                            <div class="media-body">
                                <h3 class="font-weight-semibold mb-0">347</h3>
                                <span class="text-uppercase font-size-sm text-muted">total course</span>
                            </div>

                            <div class="ml-3 align-self-center">
                                <i class="icon-book3 icon-3x text-blue-400"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="card card-body">
                        <div class="media">
                            <div class="media-body">
                                <h3 class="font-weight-semibold mb-0">389,438</h3>
                                <span class="text-uppercase font-size-sm text-muted">Total Registration</span>
                            </div>

                            <div class="ml-3 align-self-center">
                                <i class="icon-profile icon-3x text-danger-400"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card bd-card bd-equal-height">
                        <div class="bg-orange-700 card-header header-elements-inline border-bottom-0">
                            <h5 class="card-title text-uppercase font-weight-semibold">Notice</h5>
                        </div>
                        <div class="card-body">
                            <div class="bd-media-list ccrm-events">
                                <div class="ccrm-events__item cursor-pointer ccrm-events__item-active" data-toggle="modal" data-target="#notice">
                                    <h6>Incoming Meeting</h6>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                        Aenean massa. Cum sociis natoque penatibus et magnis dis parturie</p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="ccrm-time">
                                            <span class="mr-3"><i class="icon-alarm"></i> 10:00 AM</span>
                                            <span><i class="icon-calendar3"></i> 2019-10-15</span>
                                        </div>
                                        <div>
                                            <a href="#" class="d-none d-md-block mb-3 mb-md-0">
                                                    <span class="btn bg-teal-400 btn-icon btn-sm rounded-round">
                                                        <span class="letter-icon">AS</span>
                                                    </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div id="notice" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content modal-top-border">
                                            <div class="modal-header d-flex flex-column justify-content-center align-items-center pb-3">
                                                <div class="p-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="76" viewBox="0 0 512 512"><g fill="#c6cbcb"><path d="M136.046 405.658l-86.059 27.321 1.862 6.111 86.058-27.324zM139.896 418.293l-86.047 27.365 2.05 6.735 86.061-27.325zM131.905 392.063l-86.056 27.322 2.216 7.281 86.057-27.324zM106.651 372.354l-51.223 14.998c-5.748 1.682-10.068 5.811-11.629 10.488l76.908-23.533c-3.573-2.608-8.784-3.494-14.056-1.953zM125.337 380.049L43.855 405.92c-.676 2.189-.742 4.48-.07 6.691l.15.488 86.023-27.316c-.857-2.371-2.48-4.322-4.621-5.734zM77.888 510.375c3.76 1.801 8.594 2.195 13.416.727l54.295-16.533c5.359-1.633 9.451-5.186 11.379-9.305l-79.09 25.111zM143.931 431.545l-86.059 27.324 2.092 6.871 86.058-27.324zM151.97 457.947l-86.059 27.325 2 6.568 86.061-27.326zM157.731 476.857l-1.686-5.529-86.059 27.324 1.371 4.506c.162.533.375 1.039.609 1.531l85.895-27.273c-.044-.184-.075-.373-.13-.559zM147.925 444.658l-86.061 27.324 2.002 6.573 86.061-27.325z"></path></g><path d="M235.685 341.104l48.791 71.992s-9.908 20.648-35.715 31.539c-25.809 10.893-40.91 13.814-51.334 14.854-10.422 1.041-19.865.393-24.953 2.582-5.092 2.186-17.119 6.66-17.119 6.66l-23.59-76.824s9.355-3.762 18.766-22.928c9.41-19.162 14.721-25.355 14.721-25.355s24.625-10.332 40.191-13.92c15.564-3.586 21.424-6.029 24.385-1.193 2.96 4.833 5.857 12.593 5.857 12.593z" fill="#f2b643"></path><path d="M155.003 469.443l-.168-.553-23.738-77.301.463-.188c.092-.037 9.299-3.963 18.482-22.664 9.334-19.008 14.576-25.213 14.795-25.469l.086-.098.117-.049c.248-.105 24.846-10.391 40.279-13.949a631.281 631.281 0 006.57-1.564c6.666-1.617 11.066-2.688 14.062-2.246 1.939.283 3.316 1.195 4.34 2.861 2.812 4.596 5.598 11.881 5.881 12.627l48.928 72.197-.133.281c-.102.207-10.297 20.961-35.996 31.807-27.139 11.455-42.383 13.986-51.492 14.896-3.682.365-7.314.527-10.521.67-5.938.26-11.064.488-14.271 1.865-5.043 2.17-17.021 6.627-17.141 6.674l-.543.203zm-22.578-77.244l23.281 75.818c2.4-.895 12.146-4.557 16.551-6.449 3.391-1.455 8.609-1.689 14.65-1.957 3.35-.145 6.812-.297 10.467-.664 9.037-.904 24.172-3.416 51.176-14.812 23.695-10.002 34.002-28.521 35.295-31l-48.648-71.777-.021-.062c-.029-.076-2.914-7.766-5.812-12.5-.85-1.391-1.949-2.117-3.566-2.355-2.789-.406-7.109.641-13.648 2.227-1.977.48-4.162 1.01-6.586 1.568-14.779 3.406-38.066 13.045-39.977 13.84-.697.857-5.922 7.541-14.564 25.146-8.34 16.975-16.579 21.962-18.598 22.977z" fill="#d89932"></path><path d="M283.347 404.229s-1.609-8.963-9.932-7.254c-9.141 1.877-31.139 9.293-42.193 14.643-9.703 4.695-11.338 7.23-10.162 14.283 1.176 7.055 9.18 8.725 12.445 7.693 3.279-1.031 2.268-.016 44.568-14.043 0 0 7.816-3.418 6.631-8.973l-1.357-6.349z" fill="#f2b643"></path><path d="M229.724 434.291c-3.873-.568-8.326-3.045-9.203-8.299-1.227-7.377.729-10.152 10.465-14.865 11.082-5.363 33.236-12.82 42.32-14.686 1.195-.246 2.33-.293 3.375-.139 5.885.859 7.15 7.547 7.201 7.83l1.355 6.334c1.266 5.918-6.611 9.434-6.947 9.58-34.035 11.293-39.988 12.83-42.848 13.572-.666.174-1.139.295-1.775.496-1.055.331-2.453.396-3.943.177zm46.798-36.91c-.918-.135-1.926-.092-2.998.125-9.023 1.855-31.045 9.27-42.066 14.602-9.84 4.762-10.945 7.199-9.863 13.707.781 4.674 4.793 6.889 8.289 7.4 1.309.193 2.57.141 3.457-.139a31.005 31.005 0 011.828-.51c2.85-.736 8.777-2.275 42.732-13.533.027-.016 7.35-3.287 6.271-8.342l-1.359-6.348c-.013-.079-1.187-6.216-6.291-6.962z" fill="#d89932"></path><path d="M279.005 383.785s-1.473-8.068-9.93-7.256c-8.459.811-36.096 10.908-45.385 16.375-9.287 5.475-14.727 7.838-13.553 14.891 1.178 7.049 9.225 8.738 12.49 7.707 3.264-1.027 51.104-16.398 51.104-16.398s7.816-3.414 6.631-8.971l-1.357-6.348z" fill="#f2b643"></path><path d="M218.851 416.195c-3.896-.57-8.371-3.053-9.248-8.311-1.127-6.771 3.562-9.49 11.332-14.002.791-.459 1.621-.939 2.482-1.445 9.613-5.664 37.318-15.658 45.605-16.449.98-.094 1.918-.076 2.793.051 6.428.941 7.715 7.58 7.727 7.648l1.354 6.332c1.266 5.922-6.609 9.436-6.943 9.584-.531.174-47.932 15.4-51.16 16.418-1.052.333-2.452.393-3.942.174zm52.806-39.078a10.545 10.545 0 00-2.529-.045c-8.193.783-35.627 10.689-45.16 16.305-.861.506-1.691.986-2.486 1.451-7.615 4.416-11.809 6.848-10.805 12.877.781 4.682 4.814 6.898 8.33 7.416 1.312.191 2.572.143 3.457-.137 3.227-1.018 50.625-16.244 51.102-16.398.021-.014 7.344-3.287 6.266-8.338l-1.359-6.348c-.048-.257-1.171-5.957-6.816-6.783z" fill="#d89932"></path><path d="M272.612 363.426s-1.568-8.053-10.016-7.143c-8.445.91-30.324 10.408-39.547 15.984-9.225 5.578-18.197 10.537-16.941 17.574 1.258 7.039 7.242 7.02 10.496 5.951 3.254-1.066 50.912-16.986 50.912-16.986s7.777-3.506 6.525-9.049c-1.249-5.54-1.429-6.331-1.429-6.331z" fill="#f2b643"></path><path d="M211.993 396.758c-2.438-.355-5.529-1.83-6.422-6.818-1.254-7.029 6.99-11.992 15.715-17.242l1.48-.895c9.143-5.527 31.057-15.121 39.773-16.059a11.608 11.608 0 012.906.035c6.342.93 7.688 7.477 7.701 7.541l1.428 6.316c1.332 5.908-6.5 9.514-6.836 9.664-.527.178-47.746 15.955-50.963 17.01-.903.295-2.727.751-4.782.448zm53.297-39.903a10.529 10.529 0 00-2.633-.029c-8.436.906-30.477 10.557-39.326 15.91l-1.484.893c-8.395 5.053-16.326 9.828-15.201 16.119.777 4.352 3.422 5.629 5.506 5.934 1.34.197 2.902.049 4.287-.406 3.211-1.055 50.43-16.828 50.906-16.986.021-.014 7.305-3.371 6.168-8.41l-1.434-6.334c-.049-.253-1.223-5.874-6.789-6.691z" fill="#d89932"></path><path d="M264.999 340.082s-2.334-7.863-10.654-6.146c-8.322 1.715-30.021 12.107-38.668 18.543-8.646 6.439-16.27 13.393-14.342 20.277 1.926 6.885 7.883 6.293 11.018 4.916 3.135-1.375 49.049-21.793 49.049-21.793s7.406-4.234 5.627-9.629l-2.03-6.168z" fill="#f2b643"></path><path d="M207.046 378.998c-2.154-.316-4.986-1.629-6.236-6.098-2.041-7.297 5.783-14.336 14.543-20.855 8.67-6.457 30.475-16.91 38.883-18.645 1.34-.275 2.619-.328 3.801-.152 5.686.83 7.412 6.439 7.484 6.678l2.025 6.152c1.895 5.752-5.557 10.092-5.877 10.271-.508.232-45.998 20.463-49.098 21.822-.838.37-3.062 1.188-5.525.827zm50.832-44.676c-1.055-.154-2.207-.104-3.424.146-8.305 1.711-29.865 12.057-38.451 18.447-8.045 5.988-16.014 13.008-14.145 19.691.875 3.133 2.674 4.92 5.346 5.311 2.184.322 4.176-.414 4.93-.744 3.098-1.359 48.586-21.588 49.043-21.793.023-.016 6.951-4.055 5.336-8.963l-2.031-6.168c-.071-.224-1.616-5.194-6.604-5.927z" fill="#d89932"></path><g fill="#f2b643"><path d="M135.048 389.836l-3.283 2.07s1.248-.504 3.283-2.07zM245.335 359.117c-4.328-6.135-9.217-17.373-9.217-17.373s-3.33-8.4-6.291-13.234c-2.961-4.836-8.82-2.393-24.385 1.193-15.566 3.588-40.191 13.92-40.191 13.92s-5.311 6.193-14.721 25.355c-5.98 12.178-11.932 18.131-15.482 20.857l46.531-29.33c26.529 8.564 34.627-5.383 34.627-5.383 2.357 8.328 7.105 15.352 13.137 19.26 6.029 3.91 18.885 4.418 22.051 1.58 3.168-2.835-1.731-10.708-6.059-16.845z"></path></g><path d="M131.968 392.412l-.408-1.01c.092-.037 9.299-3.963 18.482-22.664 9.334-19.008 14.576-25.213 14.795-25.469l.086-.098.117-.049c.248-.105 24.846-10.391 40.279-13.949a592.746 592.746 0 006.572-1.566c10.773-2.613 15.693-3.805 18.4.617 2.949 4.82 6.297 13.234 6.332 13.318.043.096 4.91 11.24 9.156 17.262 4.611 6.539 9.459 14.445 5.979 17.566-3.594 3.217-16.758 2.332-22.715-1.531-5.834-3.783-10.551-10.49-13.049-18.512-2.475 3.027-12.062 11.967-34.586 4.697l.336-1.039c25.82 8.332 33.912-5 33.988-5.135l.646-1.113.35 1.24c2.332 8.236 7.035 15.139 12.908 18.947 5.814 3.77 18.455 4.266 21.395 1.633 3.205-2.873-3.83-12.848-6.143-16.127-4.311-6.111-9.223-17.357-9.27-17.471-.041-.1-3.355-8.43-6.258-13.166-2.293-3.746-6.658-2.689-17.215-.129-1.977.48-4.162 1.01-6.586 1.568-14.779 3.406-38.066 13.045-39.977 13.84-.697.857-5.922 7.541-14.564 25.146-9.394 19.134-18.662 23.036-19.05 23.194z" fill="#d89932"></path><path d="M256.149 357.631c3.295-1.463 5.07-2.215 5.07-2.215s6.836-3.836 5.283-9.301c-1.408-4.951-2.348-6.74-2.348-6.74s-2.643-6.611-9.762-4.973c-1.5.346-3.539 1.031-5.771 1.836 0 0 2.732.607 4.303 3.037 1.568 2.434 4.867 10.895 4.568 13.877-.298 2.985-1.343 4.479-1.343 4.479zM263.136 379.75c3.273-1.08 5.139-1.908 5.139-1.908s6.654-3.291 5.42-8.836c-1.244-5.59-2.459-7.604-2.459-7.604s-2.045-6.16-9.211-4.744c-1.512.301-3.236.811-5.912 2.162 0 0 2.977.264 4.467 2.742 1.494 2.477 4.529 11.039 4.135 14.01-.394 2.975-1.579 4.178-1.579 4.178zM270.12 399.664c3.787-.82 5.66-2.336 5.66-2.336s5.262-2.115 3.969-8.312c-1.123-5.393-1.814-7.006-1.814-7.006s-2.428-5.033-6.654-4.965c-2.15 1.84-4.328 2.621-7.777 3.629 0 0 2.861.682 4.352 3.16 1.494 2.479 3.939 9.463 3.549 12.436-.396 2.972-1.285 3.394-1.285 3.394z" fill="#f3be54"></path><g><path d="M276.163 419.604c4.115-1.186 9.223-4.59 7.961-10.047-1.217-5.242-2.018-7.219-2.018-7.219s-.77-3.186-4.658-4.881c-2.117 1.777-4.48 2.488-7.629 3.475 0 0 2.785.691 4.219 3.125 1.438 2.436 3.762 9.281 3.352 12.178-.411 2.9-1.227 3.369-1.227 3.369z" fill="#f3be54"></path></g><g><path d="M80.054 235.823l-20.639 5.255s-6.328 20.598 6.598 34.078l19.588-3.75-5.547-35.583z" fill="#f2b643"></path><path d="M84.181 262.301l1.42 9.105-19.588 3.75c-12.926-13.48-6.598-34.078-6.598-34.078s-.111 18.754 7.666 24.4l17.1-3.177z" fill="#d89932"></path><path fill="#a24038" d="M238.999 295.303l2.912 13.722-69.903 12.831-3.023-11.979z"></path><path d="M238.028 317.01s13.916 68.027 42.658 123.605l-55.141 19.725s-27.793-56.24-45.719-131.682l58.202-11.648z" fill="#df584c"></path><path fill="#b9483e" d="M283.249 438.766l-60.869 22.015 4.353 13.596 61.614-23.496z"></path><path d="M391.438.995s-82.82 109.555-131.381 137.206c-48.564 27.653-92.498 23.7-92.498 23.7l24.553 145.158s44.217-15.877 76.434-12.396c32.219 3.48 76.367 14.916 192.137 91.486L391.438.995z" fill="#d1d5d5"></path><path d="M167.56 161.901s-99.186-2.117-89.688 84.956c9.494 87.073 114.24 60.202 114.24 60.202L167.56 161.901z" fill="#df584c"></path><path d="M185.183 265.522l6.93 41.537s44.217-15.877 76.434-12.396c32.219 3.48 76.367 14.916 192.137 91.486l-9.824-54.648-69.477-38.973s-60.453-31.119-102.482-36.658c-42.029-5.539-93.718 9.652-93.718 9.652z" fill="#c6cbcb"></path><path d="M91.2 192.301c-10.002 12.425-16.016 29.92-13.328 54.556 9.494 87.073 114.24 60.202 114.24 60.202l-6.93-41.537s-18.32 3.9-46.379-4.869C94.606 246.839 91.2 192.301 91.2 192.301z" fill="#b9483e"></path><path d="M169.302 172.68l-1.742-10.779s43.934 3.953 92.498-23.7C308.618 110.55 391.438.995 391.438.995l3.047 16.954s-50.555 61.294-63.42 77.19c-14.332 17.708-40.119 44.741-74.186 60.659-13.192 6.165-46.655 16.504-87.577 16.882z" fill="#e2e5e7"></path><path d="M451.603 188.891c18.477 106.615 22.609 194.917 9.234 197.232-13.371 2.32-39.182-82.23-57.658-188.842C384.71 90.669 380.575 2.364 393.944.047c13.375-2.318 39.184 82.232 57.659 188.844z" fill="#a24038"></path><path d="M466.618 302.85c3.986 49.16 2.289 81.877-5.781 83.273-13.371 2.32-39.182-82.23-57.658-188.842C384.71 90.669 380.575 2.364 393.944.047c5.455-.945 12.98 12.559 21.23 36.114 0 0-9.182-17.512-16.404-14.846-7.219 2.668 7.402 140.161 15.697 176.767 8.295 36.604 29.988 159.823 41.785 163.438 11.796 3.611 10.366-58.67 10.366-58.67z" fill="#df584c"></path><path d="M424.354 246.043s44.025-13.365 35.404-56.226c-8.619-42.862-52.873-39.075-52.873-39.075s6.677 47.099 17.469 95.301z" fill="#f2b643"></path><path d="M169.378 172.663l-1.818-10.762s-58.076-1.24-81.094 37.19c0 0 21.467-32.157 82.912-26.428z" fill="#e56761"></path><path d="M437.829 239.552c-7.283 4.61-13.475 6.489-13.475 6.491-10.793-48.202-17.469-95.301-17.469-95.301s1.961-.168 5.135-.033c0 0 5.365 50.068 12.154 67.57 6.79 17.504 13.655 21.273 13.655 21.273z" fill="#d89932"></path><path d="M270.97 420.148c1.092 2.234 8.576 18.268 9.717 20.467l-55.141 19.725s-27.793-56.24-45.719-131.682l15.463-2.871s20.488 75.455 32.453 96.465c7.295 12.809 23.859 2.395 23.859 2.395l19.368-4.499z" opacity=".37" fill="#b9483e"></path><path d="M274.331 427.244s-12.814 2.34-23.453 6.102c-10.637 3.76-24.307 7.85-31.301-2.936 0 0-4.004-6.459-1.703-10.889 0 0-6.639-2.254-8.955-7.73-2.314-5.477-2.354-8.967 1.178-13.031 0 0-4.432-2.301-6.215-6.416-1.781-4.111.547-8.723 2.764-11.334 0 0-6.209-1.459-7.629-5.52-1.424-4.059-1.131-7.316.854-9.596 0 0-7.734.146-10.721-3.223l16.264-3.301 66.426 62.373 2.491 5.501z" fill="#b9483e"></path><path d="M277.679 434.648l-54.705 20.248c1.637 3.553 2.572 5.443 2.572 5.443l55.141-19.725a316.7 316.7 0 01-3.008-5.966z" opacity=".47" fill="#b9483e"></path><path fill="#b9483e" d="M241.679 308.109l2.255 8.901-70.627 14.012-1.411-9.956z"></path></g><g><path d="M283.347 404.229s-1.609-8.963-9.932-7.254c-9.141 1.877-31.139 9.293-42.193 14.643-9.703 4.695-11.338 7.23-10.162 14.283 1.176 7.055 9.18 8.725 12.445 7.693 3.279-1.031 2.268-.016 44.568-14.043 0 0 7.816-3.418 6.631-8.973l-1.357-6.349z" fill="#f2b643"></path><path d="M229.724 434.291c-3.873-.568-8.326-3.045-9.203-8.299-1.227-7.377.729-10.152 10.465-14.865 11.082-5.363 33.236-12.82 42.32-14.686 1.195-.246 2.33-.293 3.375-.139 5.885.859 7.15 7.547 7.201 7.83l1.355 6.334c1.266 5.918-6.611 9.434-6.947 9.58-34.035 11.293-39.988 12.83-42.848 13.572-.666.174-1.139.295-1.775.496-1.055.331-2.453.396-3.943.177zm46.798-36.91c-.918-.135-1.926-.092-2.998.125-9.023 1.855-31.045 9.27-42.066 14.602-9.84 4.762-10.945 7.199-9.863 13.707.781 4.674 4.793 6.889 8.289 7.4 1.309.193 2.57.141 3.457-.139a31.005 31.005 0 011.828-.51c2.85-.736 8.777-2.275 42.732-13.533.027-.016 7.35-3.287 6.271-8.342l-1.359-6.348c-.013-.079-1.187-6.216-6.291-6.962z" fill="#d89932"></path><path d="M279.005 383.785s-1.473-8.068-9.93-7.256c-8.459.811-36.096 10.908-45.385 16.375-9.287 5.475-14.727 7.838-13.553 14.891 1.178 7.049 9.225 8.738 12.49 7.707 3.264-1.027 51.104-16.398 51.104-16.398s7.816-3.414 6.631-8.971l-1.357-6.348z" fill="#f2b643"></path><path d="M218.851 416.195c-3.896-.57-8.371-3.053-9.248-8.311-1.127-6.771 3.562-9.49 11.332-14.002.791-.459 1.621-.939 2.482-1.445 9.613-5.664 37.318-15.658 45.605-16.449.98-.094 1.918-.076 2.793.051 6.428.941 7.715 7.58 7.727 7.648l1.354 6.332c1.266 5.922-6.609 9.436-6.943 9.584-.531.174-47.932 15.4-51.16 16.418-1.052.333-2.452.393-3.942.174zm52.806-39.078a10.545 10.545 0 00-2.529-.045c-8.193.783-35.627 10.689-45.16 16.305-.861.506-1.691.986-2.486 1.451-7.615 4.416-11.809 6.848-10.805 12.877.781 4.682 4.814 6.898 8.33 7.416 1.312.191 2.572.143 3.457-.137 3.227-1.018 50.625-16.244 51.102-16.398.021-.014 7.344-3.287 6.266-8.338l-1.359-6.348c-.048-.257-1.171-5.957-6.816-6.783z" fill="#d89932"></path><path d="M272.612 363.426s-1.568-8.053-10.016-7.143c-8.445.91-30.324 10.408-39.547 15.984-9.225 5.578-18.197 10.537-16.941 17.574 1.258 7.039 7.242 7.02 10.496 5.951 3.254-1.066 50.912-16.986 50.912-16.986s7.777-3.506 6.525-9.049c-1.249-5.54-1.429-6.331-1.429-6.331z" fill="#f2b643"></path><path d="M211.993 396.758c-2.438-.355-5.529-1.83-6.422-6.818-1.254-7.029 6.99-11.992 15.715-17.242l1.48-.895c9.143-5.527 31.057-15.121 39.773-16.059a11.608 11.608 0 012.906.035c6.342.93 7.688 7.477 7.701 7.541l1.428 6.316c1.332 5.908-6.5 9.514-6.836 9.664-.527.178-47.746 15.955-50.963 17.01-.903.295-2.727.751-4.782.448zm53.297-39.903a10.529 10.529 0 00-2.633-.029c-8.436.906-30.477 10.557-39.326 15.91l-1.484.893c-8.395 5.053-16.326 9.828-15.201 16.119.777 4.352 3.422 5.629 5.506 5.934 1.34.197 2.902.049 4.287-.406 3.211-1.055 50.43-16.828 50.906-16.986.021-.014 7.305-3.371 6.168-8.41l-1.434-6.334c-.049-.253-1.223-5.874-6.789-6.691z" fill="#d89932"></path><g><path fill="#e2e5e7" d="M130.185 386.402l27.474 89.452-22.943 8.56-28.469-91.111z"></path></g><g><path d="M264.999 340.082s-2.334-7.863-10.654-6.146c-8.322 1.715-30.021 12.107-38.668 18.543-8.646 6.439-16.27 13.393-14.342 20.277 1.926 6.885 7.883 6.293 11.018 4.916 3.135-1.375 49.049-21.793 49.049-21.793s7.406-4.234 5.627-9.629l-2.03-6.168z" fill="#f2b643"></path><path d="M207.046 378.998c-2.154-.316-4.986-1.629-6.236-6.098-2.041-7.297 5.783-14.336 14.543-20.855 8.67-6.457 30.475-16.91 38.883-18.645 1.34-.275 2.619-.328 3.801-.152 5.686.83 7.412 6.439 7.484 6.678l2.025 6.152c1.895 5.752-5.557 10.092-5.877 10.271-.508.232-45.998 20.463-49.098 21.822-.838.37-3.062 1.188-5.525.827zm50.832-44.676c-1.055-.154-2.207-.104-3.424.146-8.305 1.711-29.865 12.057-38.451 18.447-8.045 5.988-16.014 13.008-14.145 19.691.875 3.133 2.674 4.92 5.346 5.311 2.184.322 4.176-.414 4.93-.744 3.098-1.359 48.586-21.588 49.043-21.793.023-.016 6.951-4.055 5.336-8.963l-2.031-6.168c-.071-.224-1.616-5.194-6.604-5.927z" fill="#d89932"></path></g><g><g fill="#f2b643"><path d="M135.048 389.836l-3.283 2.07s1.248-.504 3.283-2.07zM245.335 359.117c-4.328-6.135-9.217-17.373-9.217-17.373s-3.33-8.4-6.291-13.234c-2.961-4.836-8.82-2.393-24.385 1.193-15.566 3.588-40.191 13.92-40.191 13.92s-5.311 6.193-14.721 25.355c-5.98 12.178-11.932 18.131-15.482 20.857l46.531-29.33c26.529 8.564 34.627-5.383 34.627-5.383 2.357 8.328 7.105 15.352 13.137 19.26 6.029 3.91 18.885 4.418 22.051 1.58 3.168-2.835-1.731-10.708-6.059-16.845z"></path></g><path d="M165.251 343.623s24.625-10.332 40.191-13.92c15.564-3.586 21.424-6.029 24.385-1.193 2.961 4.834 6.291 13.234 6.291 13.234s4.889 11.238 9.217 17.373c4.328 6.137 9.227 14.01 6.059 16.846 0 0 .787-1.578-.914-4.99-1.701-3.416-9.936-14.803-12.268-19.545-2.33-4.744-7.965-17.307-9.17-19.41-1.203-2.102-3.699-4.484-6.471-4.34-2.771.143-17.992 3.553-22.059 5.02-4.064 1.466-35.261 10.925-35.261 10.925z" fill="#f3be54"></path><path d="M131.968 392.412l-.408-1.01c.092-.037 9.299-3.963 18.482-22.664 9.334-19.008 14.576-25.213 14.795-25.469l.086-.098.117-.049c.248-.105 24.846-10.391 40.279-13.949a592.746 592.746 0 006.572-1.566c10.773-2.613 15.693-3.805 18.4.617 2.949 4.82 6.297 13.234 6.332 13.318.043.096 4.91 11.24 9.156 17.262 4.611 6.539 9.459 14.445 5.979 17.566-3.594 3.217-16.758 2.332-22.715-1.531-5.834-3.783-10.551-10.49-13.049-18.512-2.475 3.027-12.062 11.967-34.586 4.697l.336-1.039c25.82 8.332 33.912-5 33.988-5.135l.646-1.113.35 1.24c2.332 8.236 7.035 15.139 12.908 18.947 5.814 3.77 18.455 4.266 21.395 1.633 3.205-2.873-3.83-12.848-6.143-16.127-4.311-6.111-9.223-17.357-9.27-17.471-.041-.1-3.355-8.43-6.258-13.166-2.293-3.746-6.658-2.689-17.215-.129-1.977.48-4.162 1.01-6.586 1.568-14.779 3.406-38.066 13.045-39.977 13.84-.697.857-5.922 7.541-14.564 25.146-9.394 19.134-18.662 23.036-19.05 23.194z" fill="#d89932"></path></g></g><path d="M230.368 391.824s-1.432 12.1 7.766 18.33l-13.893 4.225s-3.355 1.777-7.324.232c-3.969-1.543-5.646-3.717-6.365-7.26s2.131-6.564 2.131-6.564 4.539-4.219 9.09-6.166c4.499-1.611 8.595-2.797 8.595-2.797zM238.44 410.887s-.686 11.252 8.404 18.223l-13.084 3.861s-6.639 2.123-10.969-4.018c-2.266-3.77-1.549-7.721-.928-9.627.623-1.904 3.203-4.002 4.51-4.498 1.314-.496 12.067-3.941 12.067-3.941zM224.032 373.102s-1.154 10.379 6.441 17.361l-12.936 4.434s-6.26 2.66-9.658-1.691c-3.396-4.35.02-8.893.688-9.713 1.061-1.586 6.555-5.918 8.973-7.396 2.418-1.482 6.492-2.995 6.492-2.995zM215.995 356.328s1.703 7.408 9.018 15.084l-12.57 5.68s-7.455 3.309-9.871-2.732c-2.416-6.039.52-9.186 2.326-11.488-.001-.001 6.501-1.077 11.097-6.544zM189.149 362.672s9.873 37.764 33.189 91.436l-11.584 2.705c.001 0-12.837-62.594-21.605-94.141zM132.425 392.199l23.281 75.818 8.209-3.211s-20.404-44.445-29.287-73.945c-.619.459-.928.69-2.203 1.338z" opacity=".29" fill="#d89932"></path></svg>
                                                </div>
                                                <h4 class="mb-2">Meeting with Development Team</h4>

                                                <div class="d-flex align-items-center font-size-lg">
                                                    <div class="bd-time">
                                                        <span class="mr-3"><i class="icon-alarm text-orange"></i> 10:00 AM</span>
                                                        <span><i class="icon-calendar3 text-orange"></i> 2019-10-15</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-body">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <p class="font-size-lg mb-0 line-height-normal">
                                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                                            Aenean massa. Cum sociis natoque penatibus et magnis dis parturieLorem ipsum dolor sit amet,
                                                            consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                                            Aenean massa. Cum sociis natoque penatibus et magnis dis parturieenean massa.
                                                            Cum sociis natoque penatibus et magnis dis parturieLorem ipsum dolor sit amet,
                                                            consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                                            Aenean massa. Cum sociis natoque penatibus et magnis dis partuLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                                            Aenean massa. Cum sociis natoque penatibus et magnis dis parturieLorem ipsum dolor sit amet,
                                                            consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                                            Aenean massa. Cum sociis natoque penatibus et magnis dis parturieenean massa.
                                                            Cum sociis natoque penatibus et magnis dis parturieLorem ipsum dolor sit amet,
                                                            consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                                            Aenean massa. Cum sociis natoque penatibus et magnis dis partuLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                                            Aenean massa. Cum sociis natoque penatibus et magnis dis parturieLorem ipsum dolor sit amet,
                                                            consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                                            Aenean massa. Cum sociis natoque penatibus et magnis dis parturieenean massa.
                                                            Cum sociis natoque penatibus et magnis dis parturieLorem ipsum dolor sit amet,
                                                            consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                                            Aenean massa. Cum sociis natoque penatibus et magnis dis partuLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                                            Aenean massa. Cum sociis natoque penatibus et magnis dis parturieLorem ipsum dolor sit amet,
                                                            consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                                            Aenean massa. Cum sociis natoque penatibus et magnis dis parturieenean massa.
                                                            Cum sociis natoque penatibus et magnis dis parturieLorem ipsum dolor sit amet,
                                                            consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                                            Aenean massa. Cum sociis natoque penatibus et magnis dis partuLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                                            Aenean massa. Cum sociis natoque penatibus et magnis dis parturieLorem ipsum dolor sit amet,
                                                            consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                                            Aenean massa. Cum sociis natoque penatibus et magnis dis parturieenean massa.
                                                            Cum sociis natoque penatibus et magnis dis parturieLorem ipsum dolor sit amet,
                                                            consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                                            Aenean massa. Cum sociis natoque penatibus et magnis dis partuLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                                            Aenean massa. Cum sociis natoque penatibus et magnis dis parturieLorem ipsum dolor sit amet,
                                                            consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                                            Aenean massa. Cum sociis natoque penatibus et magnis dis parturieenean massa.
                                                            Cum sociis natoque penatibus et magnis dis parturieLorem ipsum dolor sit amet,
                                                            consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                                            Aenean massa. Cum sociis natoque penatibus et magnis dis partuLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                                            Aenean massa. Cum sociis natoque penatibus et magnis dis parturieLorem ipsum dolor sit amet,
                                                            consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                                            Aenean massa. Cum sociis natoque penatibus et magnis dis parturieenean massa.
                                                            Cum sociis natoque penatibus et magnis dis parturieLorem ipsum dolor sit amet,
                                                            consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                                            Aenean massa. Cum sociis natoque penatibus et magnis dis partuLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                                            Aenean massa. Cum sociis natoque penatibus et magnis dis parturieLorem ipsum dolor sit amet,
                                                            consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                                            Aenean massa. Cum sociis natoque penatibus et magnis dis parturieenean massa.
                                                            Cum sociis natoque penatibus et magnis dis parturieLorem ipsum dolor sit amet,
                                                            consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                                            Aenean massa. Cum sociis natoque penatibus et magnis dis partuLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                                            Aenean massa. Cum sociis natoque penatibus et magnis dis parturieLorem ipsum dolor sit amet,
                                                            consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                                            Aenean massa. Cum sociis natoque penatibus et magnis dis parturieenean massa.
                                                            Cum sociis natoque penatibus et magnis dis parturieLorem ipsum dolor sit amet,
                                                            consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                                            Aenean massa. Cum sociis natoque penatibus et magnis dis parturie
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="d-flex align-items-center justify-content-center w-100">
                                                    <button type="button" class="btn bg-orange-700" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ccrm-events__item">
                                    <h6>Incoming Meeting</h6>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                        Aenean massa. Cum sociis natoque penatibus et magnis dis parturie</p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="ccrm-time">
                                            <span class="mr-3"><i class="icon-alarm"></i> 10:00 AM</span>
                                            <span><i class="icon-calendar3"></i> 2019-10-15</span>
                                        </div>
                                        <div>
                                            <a href="#">
                                                <img src="http://demo.interface.club/limitless/demo/Template/global_assets/images/demo/users/face1.jpg" class="rounded-circle" width="32" height="32" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="ccrm-events__item">
                                    <h6>Incoming Meeting</h6>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                        Aenean massa. Cum sociis natoque penatibus et magnis dis parturie</p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="ccrm-time">
                                            <span class="mr-3"><i class="icon-alarm"></i> 10:00 AM</span>
                                            <span><i class="icon-calendar3"></i> 2019-10-15</span>
                                        </div>
                                        <div>
                                            <a href="#">
                                                <img src="http://demo.interface.club/limitless/demo/Template/global_assets/images/demo/users/face1.jpg" class="rounded-circle" width="32" height="32" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="ccrm-events__item">
                                    <h6>Incoming Meeting</h6>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                        Aenean massa. Cum sociis natoque penatibus et magnis dis parturie</p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="ccrm-time">
                                            <span class="mr-3"><i class="icon-alarm"></i> 10:00 AM</span>
                                            <span><i class="icon-calendar3"></i> 2019-10-15</span>
                                        </div>
                                        <div>
                                            <a href="#">
                                                <img src="http://demo.interface.club/limitless/demo/Template/global_assets/images/demo/users/face1.jpg" class="rounded-circle" width="32" height="32" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="ccrm-events__item">
                                    <h6>Incoming Meeting</h6>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                        Aenean massa. Cum sociis natoque penatibus et magnis dis parturie</p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="ccrm-time">
                                            <span class="mr-3"><i class="icon-alarm"></i> 10:00 AM</span>
                                            <span><i class="icon-calendar3"></i> 2019-10-15</span>
                                        </div>
                                        <div>
                                            <a href="#">
                                                <img src="http://demo.interface.club/limitless/demo/Template/global_assets/images/demo/users/face1.jpg" class="rounded-circle" width="32" height="32" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="ccrm-events__item">
                                    <h6>Incoming Meeting</h6>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                        Aenean massa. Cum sociis natoque penatibus et magnis dis parturie</p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="ccrm-time">
                                            <span class="mr-3"><i class="icon-alarm"></i> 10:00 AM</span>
                                            <span><i class="icon-calendar3"></i> 2019-10-15</span>
                                        </div>
                                        <div>
                                            <a href="#">
                                                <img src="http://demo.interface.club/limitless/demo/Template/global_assets/images/demo/users/face1.jpg" class="rounded-circle" width="32" height="32" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card bd-card bd-equal-height">
                        <div class="bg-danger-400 card-header header-elements-inline border-bottom-0">
                            <h5 class="card-title text-uppercase font-weight-semibold">Reminders</h5>
                            <a href="http://devconstruction.bidheegroup.com/admin/reminder/create" class="btn btn-light btn-sm border-0"><i class="icon-plus2"></i> Add</a>
                        </div>
                        <div class="card-body">
                            <div class="bd-media-list ccrm-remind">
                                <a href="" class="d-block" data-toggle="modal" data-target="#reminder_modal_3">
                                    <div class="ccrm-remind__item d-flex align-items-center">
                                        <div class="ccrm-remind__calender text-center">
                            <span class="ccrm-remind__date">
                                                                04</span>
                                            <br>
                                            <span class="ccrm-remind__day text-uppercase">
                                Sat
                            </span>
                                        </div>
                                        <div class="ccrm-remind__desc">
                                            <p>Meeting</p>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="ccrm-remind-year">
                                                                                <span class="mr-3 text-muted">
                                        Jan 2020
                                    </span>
                                                    <span class="badge badge-flat border-danger text-danger-600">
                                            reminder type 1
                                        </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div id="reminder_modal_3" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="card bg-pink-400 text-white text-center p-3" style="background-image: url(../../../../global_assets/images/backgrounds/panel_bg.png); background-size: contain;">
                                                    <div>
                                                        <a href="#" class="btn btn-lg btn-icon mb-3 mt-1 btn-outline text-white border-white bg-white rounded-round border-2">
                                                            <i class="icon-quotes-right"></i>
                                                        </a>
                                                    </div>
                                                    <blockquote class="blockquote mb-0">
                                                        <p>"Meeting"</p>
                                                        <p></p>
                                                        <p></p>
                                                        <footer class="blockquote-footer text-white">
                                            <span>
                                                <cite title="Source Title">
                                                    2020-01-01
                                                </cite>
                                            </span>
                                                        </footer>
                                                    </blockquote>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="" class="d-block" data-toggle="modal" data-target="#reminder_modal_2">
                                    <div class="ccrm-remind__item d-flex align-items-center">
                                        <div class="ccrm-remind__calender text-center">
                            <span class="ccrm-remind__date">
                                                                04</span>
                                            <br>
                                            <span class="ccrm-remind__day text-uppercase">
                                Sat
                            </span>
                                        </div>
                                        <div class="ccrm-remind__desc">
                                            <p>Project deadline reminder</p>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="ccrm-remind-year">
                                                                                <span class="mr-3 text-muted">
                                        Jan 2020
                                    </span>
                                                    <span class="badge badge-flat border-danger text-danger-600">
                                            reminder type 1
                                        </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div id="reminder_modal_2" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="card bg-pink-400 text-white text-center p-3" style="background-image: url(../../../../global_assets/images/backgrounds/panel_bg.png); background-size: contain;">
                                                    <div>
                                                        <a href="#" class="btn btn-lg btn-icon mb-3 mt-1 btn-outline text-white border-white bg-white rounded-round border-2">
                                                            <i class="icon-quotes-right"></i>
                                                        </a>
                                                    </div>
                                                    <blockquote class="blockquote mb-0">
                                                        <p>"Project deadline reminder"</p>
                                                        <p></p>
                                                        <p></p>
                                                        <footer class="blockquote-footer text-white">
                                            <span>
                                                <cite title="Source Title">
                                                    2020-01-01
                                                </cite>
                                            </span>
                                                        </footer>
                                                    </blockquote>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="" class="d-block" data-toggle="modal" data-target="#reminder_modal_1">
                                    <div class="ccrm-remind__item d-flex align-items-center">
                                        <div class="ccrm-remind__calender text-center">
                            <span class="ccrm-remind__date">
                                                                06</span>
                                            <br>
                                            <span class="ccrm-remind__day text-uppercase">
                                Mon
                            </span>
                                        </div>
                                        <div class="ccrm-remind__desc">
                                            <p>Mardi Himal Trek</p>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="ccrm-remind-year">
                                                                                <span class="mr-3 text-muted">
                                        Dec 2019
                                    </span>
                                                    <span class="badge badge-flat border-danger text-danger-600">
                                            reminder type 1
                                        </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div id="reminder_modal_1" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="card bg-pink-400 text-white text-center p-3" style="background-image: url(../../../../global_assets/images/backgrounds/panel_bg.png); background-size: contain;">
                                                    <div>
                                                        <a href="#" class="btn btn-lg btn-icon mb-3 mt-1 btn-outline text-white border-white bg-white rounded-round border-2">
                                                            <i class="icon-quotes-right"></i>
                                                        </a>
                                                    </div>
                                                    <blockquote class="blockquote mb-0">
                                                        <p>"Mardi Himal Trek"</p>
                                                        <p>Nothing</p>
                                                        <p></p>
                                                        <footer class="blockquote-footer text-white">
                                            <span>
                                                <cite title="Source Title">
                                                    2019-12-31
                                                </cite>
                                            </span>
                                                        </footer>
                                                    </blockquote>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card bd-card">
                        <div class="bg-info-600 card-header header-elements-inline">
                            <h5 class="card-title text-uppercase font-weight-semibold">New Enrollment</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped text-nowrap font-size-lg">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Student Name</th>
                                    <th>Agent</th>
                                    <th>Intake Date</th>
                                    <th>Payment Status</th>
                                    <th>Enrollment Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="mr-3">
                                                <a href="#" class="btn bg-primary-400 rounded-round btn-icon btn-sm">
                                                    <span class="letter-icon">S</span>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="#" class="text-default font-weight-semibold letter-icon-title">Vishwa Govindbhai Patel</a>
                                                <div class="text-muted font-size-sm"><i class="icon-envelop5 font-size-sm mr-1"></i> patelvishwa051@gmail.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>None</td>
                                    <td>20th Dec, 2020</td>
                                    <td><span class="badge bg-success-400 font-size-12">Paid</span></td>
                                    <td><span class="badge bg-primary-400 font-size-12">Pending</span></td>
                                    <td class="text-right">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-more2"></i></a>
                                                <div class="dropdown-menu bd-card dropdown-menu-right" x-placement="bottom-end">
                                                    <a href="#" class="dropdown-item">Edit</a>
                                                    <a href="#" class="dropdown-item">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="mr-3">
                                                <a href="#" class="btn bg-primary-400 rounded-round btn-icon btn-sm">
                                                    <span class="letter-icon">S</span>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="#" class="text-default font-weight-semibold letter-icon-title">Vishwa Govindbhai Patel</a>
                                                <div class="text-muted font-size-sm"><i class="icon-envelop5 font-size-sm mr-1"></i> patelvishwa051@gmail.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>None</td>
                                    <td>20th Dec, 2020</td>
                                    <td><span class="badge bg-success-400 font-size-12">Paid</span></td>
                                    <td><span class="badge bg-primary-400 font-size-12">Pending</span></td>
                                    <td class="text-right">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-more2"></i></a>
                                                <div class="dropdown-menu bd-card dropdown-menu-right" x-placement="bottom-end">
                                                    <a href="#" class="dropdown-item">Edit</a>
                                                    <a href="#" class="dropdown-item">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="mr-3">
                                                <a href="#" class="btn bg-primary-400 rounded-round btn-icon btn-sm">
                                                    <span class="letter-icon">S</span>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="#" class="text-default font-weight-semibold letter-icon-title">Vishwa Govindbhai Patel</a>
                                                <div class="text-muted font-size-sm"><i class="icon-envelop5 font-size-sm mr-1"></i> patelvishwa051@gmail.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>None</td>
                                    <td>20th Dec, 2020</td>
                                    <td><span class="badge bg-success-400 font-size-12">Paid</span></td>
                                    <td><span class="badge bg-primary-400 font-size-12">Pending</span></td>
                                    <td class="text-right">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-more2"></i></a>
                                                <div class="dropdown-menu bd-card dropdown-menu-right" x-placement="bottom-end">
                                                    <a href="#" class="dropdown-item">Edit</a>
                                                    <a href="#" class="dropdown-item">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="mr-3">
                                                <a href="#" class="btn bg-primary-400 rounded-round btn-icon btn-sm">
                                                    <span class="letter-icon">S</span>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="#" class="text-default font-weight-semibold letter-icon-title">Vishwa Govindbhai Patel</a>
                                                <div class="text-muted font-size-sm"><i class="icon-envelop5 font-size-sm mr-1"></i> patelvishwa051@gmail.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>None</td>
                                    <td>20th Dec, 2020</td>
                                    <td><span class="badge bg-success-400 font-size-12">Paid</span></td>
                                    <td><span class="badge bg-primary-400 font-size-12">Pending</span></td>
                                    <td class="text-right">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-more2"></i></a>
                                                <div class="dropdown-menu bd-card dropdown-menu-right" x-placement="bottom-end">
                                                    <a href="#" class="dropdown-item">Edit</a>
                                                    <a href="#" class="dropdown-item">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="mr-3">
                                                <a href="#" class="btn bg-primary-400 rounded-round btn-icon btn-sm">
                                                    <span class="letter-icon">S</span>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="#" class="text-default font-weight-semibold letter-icon-title">Vishwa Govindbhai Patel</a>
                                                <div class="text-muted font-size-sm"><i class="icon-envelop5 font-size-sm mr-1"></i> patelvishwa051@gmail.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>None</td>
                                    <td>20th Dec, 2020</td>
                                    <td><span class="badge bg-danger-400 font-size-12">Pending</span></td>
                                    <td><span class="badge bg-primary-400 font-size-12">Pending</span></td>
                                    <td class="text-right">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-more2"></i></a>
                                                <div class="dropdown-menu bd-card dropdown-menu-right" x-placement="bottom-end">
                                                    <a href="#" class="dropdown-item">Edit</a>
                                                    <a href="#" class="dropdown-item">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="mr-3">
                                                <a href="#" class="btn bg-primary-400 rounded-round btn-icon btn-sm">
                                                    <span class="letter-icon">S</span>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="#" class="text-default font-weight-semibold letter-icon-title">Vishwa Govindbhai Patel</a>
                                                <div class="text-muted font-size-sm"><i class="icon-envelop5 font-size-sm mr-1"></i> patelvishwa051@gmail.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>None</td>
                                    <td>20th Dec, 2020</td>
                                    <td><span class="badge bg-success-400 font-size-12">Paid</span></td>
                                    <td><span class="badge bg-primary-400 font-size-12">Pending</span></td>
                                    <td class="text-right">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-more2"></i></a>
                                                <div class="dropdown-menu bd-card dropdown-menu-right" x-placement="bottom-end">
                                                    <a href="#" class="dropdown-item">Edit</a>
                                                    <a href="#" class="dropdown-item">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="mr-3">
                                                <a href="#" class="btn bg-primary-400 rounded-round btn-icon btn-sm">
                                                    <span class="letter-icon">S</span>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="#" class="text-default font-weight-semibold letter-icon-title">Vishwa Govindbhai Patel</a>
                                                <div class="text-muted font-size-sm"><i class="icon-envelop5 font-size-sm mr-1"></i> patelvishwa051@gmail.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>None</td>
                                    <td>20th Dec, 2020</td>
                                    <td><span class="badge bg-success-400 font-size-12">Paid</span></td>
                                    <td><span class="badge bg-primary-400 font-size-12">Pending</span></td>
                                    <td class="text-right">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-more2"></i></a>
                                                <div class="dropdown-menu bd-card dropdown-menu-right" x-placement="bottom-end">
                                                    <a href="#" class="dropdown-item">Edit</a>
                                                    <a href="#" class="dropdown-item">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="mr-3">
                                                <a href="#" class="btn bg-primary-400 rounded-round btn-icon btn-sm">
                                                    <span class="letter-icon">S</span>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="#" class="text-default font-weight-semibold letter-icon-title">Vishwa Govindbhai Patel</a>
                                                <div class="text-muted font-size-sm"><i class="icon-envelop5 font-size-sm mr-1"></i> patelvishwa051@gmail.com</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>None</td>
                                    <td>20th Dec, 2020</td>
                                    <td><span class="badge bg-success-400 font-size-12">Paid</span></td>
                                    <td><span class="badge bg-primary-400 font-size-12">Pending</span></td>
                                    <td class="text-right">
                                        <div class="list-icons">
                                            <div class="dropdown">
                                                <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-more2"></i></a>
                                                <div class="dropdown-menu bd-card dropdown-menu-right" x-placement="bottom-end">
                                                    <a href="#" class="dropdown-item">Edit</a>
                                                    <a href="#" class="dropdown-item">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card bd-card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title text-uppercase font-weight-semibold">Students Directory</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped text-nowrap font-size-lg">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email Address</th>
                                <th>Intake Month</th>
                                <th>Agency</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Ram Shakya</td>
                                <td>ran123</td>
                                <td>ran@gmail.com</td>
                                <td>30th Dec, 2020</td>
                                <td>-</td>
                                <td>
                                    <span class="badge bg-primary font-size-12">
                                        Active
                                    </span>
                                </td>
                                <td class="text-right">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-more2"></i></a>
                                            <div class="dropdown-menu bd-card dropdown-menu-right" x-placement="bottom-end">
                                                <a href="#" class="dropdown-item">Edit</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Ram Shakya</td>
                                <td>ran123</td>
                                <td>ran@gmail.com</td>
                                <td>30th Dec, 2020</td>
                                <td>-</td>
                                <td>
                                    <span class="badge bg-primary font-size-12">
                                        Active
                                    </span>
                                </td>
                                <td class="text-right">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-more2"></i></a>
                                            <div class="dropdown-menu bd-card dropdown-menu-right" x-placement="bottom-end">
                                                <a href="#" class="dropdown-item">Edit</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Ram Shakya</td>
                                <td>ran123</td>
                                <td>ran@gmail.com</td>
                                <td>30th Dec, 2020</td>
                                <td>-</td>
                                <td>
                                    <span class="badge bg-primary font-size-12">
                                        Active
                                    </span>
                                </td>
                                <td class="text-right">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-more2"></i></a>
                                            <div class="dropdown-menu bd-card dropdown-menu-right" x-placement="bottom-end">
                                                <a href="#" class="dropdown-item">Edit</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Ram Shakya</td>
                                <td>ran123</td>
                                <td>ran@gmail.com</td>
                                <td>30th Dec, 2020</td>
                                <td>-</td>
                                <td>
                                    <span class="badge bg-primary font-size-12">
                                        Active
                                    </span>
                                </td>
                                <td class="text-right">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-more2"></i></a>
                                            <div class="dropdown-menu bd-card dropdown-menu-right" x-placement="bottom-end">
                                                <a href="#" class="dropdown-item">Edit</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Ram Shakya</td>
                                <td>ran123</td>
                                <td>ran@gmail.com</td>
                                <td>30th Dec, 2020</td>
                                <td>-</td>
                                <td>
                                    <span class="badge bg-primary font-size-12">
                                        Active
                                    </span>
                                </td>
                                <td class="text-right">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-more2"></i></a>
                                            <div class="dropdown-menu bd-card dropdown-menu-right" x-placement="bottom-end">
                                                <a href="#" class="dropdown-item">Edit</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Ram Shakya</td>
                                <td>ran123</td>
                                <td>ran@gmail.com</td>
                                <td>30th Dec, 2020</td>
                                <td>-</td>
                                <td>
                                    <span class="badge bg-primary font-size-12">
                                        Active
                                    </span>
                                </td>
                                <td class="text-right">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-more2"></i></a>
                                            <div class="dropdown-menu bd-card dropdown-menu-right" x-placement="bottom-end">
                                                <a href="#" class="dropdown-item">Edit</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Ram Shakya</td>
                                <td>ran123</td>
                                <td>ran@gmail.com</td>
                                <td>30th Dec, 2020</td>
                                <td>-</td>
                                <td>
                                    <span class="badge bg-primary font-size-12">
                                        Active
                                    </span>
                                </td>
                                <td class="text-right">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-more2"></i></a>
                                            <div class="dropdown-menu bd-card dropdown-menu-right" x-placement="bottom-end">
                                                <a href="#" class="dropdown-item">Edit</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Ram Shakya</td>
                                <td>ran123</td>
                                <td>ran@gmail.com</td>
                                <td>30th Dec, 2020</td>
                                <td>-</td>
                                <td>
                                    <span class="badge bg-danger font-size-12">
                                        In Active
                                    </span>
                                </td>
                                <td class="text-right">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-more2"></i></a>
                                            <div class="dropdown-menu bd-card dropdown-menu-right" x-placement="bottom-end">
                                                <a href="#" class="dropdown-item">Edit</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Ram Shakya</td>
                                <td>ran123</td>
                                <td>ran@gmail.com</td>
                                <td>30th Dec, 2020</td>
                                <td>-</td>
                                <td>
                                    <span class="badge bg-primary font-size-12">
                                        Active
                                    </span>
                                </td>
                                <td class="text-right">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-more2"></i></a>
                                            <div class="dropdown-menu bd-card dropdown-menu-right" x-placement="bottom-end">
                                                <a href="#" class="dropdown-item">Edit</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Ram Shakya</td>
                                <td>ran123</td>
                                <td>ran@gmail.com</td>
                                <td>30th Dec, 2020</td>
                                <td>-</td>
                                <td>
                                    <span class="badge bg-primary font-size-12">
                                        Active
                                    </span>
                                </td>
                                <td class="text-right">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown" aria-expanded="false"><i class="icon-more2"></i></a>
                                            <div class="dropdown-menu bd-card dropdown-menu-right" x-placement="bottom-end">
                                                <a href="#" class="dropdown-item">Edit</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /content area -->


@stop
