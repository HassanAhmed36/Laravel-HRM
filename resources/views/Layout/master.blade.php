<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | HRM - Human Resources managment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets/js/plugin.js') }}"></script>
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet"
        type="text/css">
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>


</head>

<body data-sidebar="dark">
    <div id="layout-wrapper">
        @include('partials.app_header')
        @include('partials.sidebar')
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                    @session('success')
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ $value }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                                fdprocessedid="bavcca"></button>
                        </div>
                    @endsession
                    @session('error')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $value }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                                fdprocessedid="bavcca"></button>
                        </div>
                    @endsession

                    @yield('main_section')
                </div>
            </div>
        </div>
    </div>
    <div class="right-bar">
        <div data-simplebar class="h-100" style="background: white !important;">
            @include('partials.notification')
        </div>
        <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <div class="rightbar-overlay"></div>
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>
        <script src="assets/js/app.js"></script>
        <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

        <script>
            $('#datatable').DataTable();
        </script>
</body>

</html>
