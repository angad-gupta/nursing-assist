<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/global/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/css/layout.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/css/components.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/css/colors.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/css/extra.css')}}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{asset('admin/global/js/main/jquery.min.js')}}"></script>
    <script src="{{asset('admin/global/js/main/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin/global/js/plugins/loaders/blockui.min.js')}}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{asset('admin/global/js/plugins/ui/moment/moment.min.js')}}"></script>

    <script src="{{asset('admin/js/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/js/custom.js')}}"></script>
    <!-- Extra JS files -->
    <script src="{{asset('admin/assets/js/extra/newsticker.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>

    <script src="{{asset('admin/global/js/plugins/visualization/d3/d3.min.js')}}"></script>
    <script src="{{asset('admin/global/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>

    <script src="{{asset('admin/contech.js')}}"></script>

    <script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>


    <script src="{{asset('admin/global/js/demo_pages/datatables_basic.js')}}"></script>
    {{--<!--    <script src="{{asset('admin/global/js/demo_pages/dashboard.js')}}"></script>-->--}}


    <!-- /theme JS files -->
    @yield('script')

</head>

<body>


    @include('admin::includes.header')

    <!-- Page content -->
    <div class="page-content">

        @include('admin::includes.sidebar')

        <!-- Main content -->
        <div class="content-wrapper">
            @if (!Request::is('admin/dashboard'))
            @include('admin::includes.page_header')
            @endif

            <!-- Content area -->
            <div class="content">

                @include('alertify::alertify')

                @yield('content')
            </div>
            <!-- /content area -->

            @include('admin::includes.footer')

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</body>

</html>
