<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>{{config('app.name')}}</title>
    <meta name="author" content="RamaDhan">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Font CSS (Via CDN) -->
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600'>

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('theme/app/assets/skin/default_skin/css/theme.css')}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/font-awesome/css/fontawesome-all.css')}}">
@stack('css')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="{{asset('theme/app/vendor/jquery/jquery-1.11.1.min.js')}}"></script>
    <script src="{{asset('theme/app/vendor/jquery/jquery_ui/jquery-ui.min.js')}}"></script>

    <!-- Embed browser icon -->
    <link rel="icon" href="{!! asset('favicon.ico') !!}"/>

    <style>
        .form-group {
            margin-bottom: 2px;
        !important;
        }
    </style>

</head>

<body class="sb-top onload-check sb-top-collapsed">

<!-- Start: Main -->
<div id="main">

    <!-- Start: Header -->
    <header class="navbar navbar-fixed-top bg-info">

    </header>
    <!-- End: Header -->

    <!-- Start: Sidebar Left -->
    <aside id="sidebar_left" class="" style="visibility: hidden !important;">
        <!-- Start: Sidebar Left Content -->
        <div class="sidebar-left-content nano-content">

            <!-- Start: Sidebar Left Menu -->
            <ul class="nav sidebar-menu">
                <li class="sidebar-label pt20">Menu</li>

                <li class="{{ request()->path() == 'auth' ? 'active' : '' }}">
                    <a href="{{url('/auth')}}">
                        <span class="fa fa-tachometer-alt"></span>
                        <span class="sidebar-title">Dashboard</span>
                    </a>
                </li>
            </ul>
            <!-- End: Sidebar Menu -->
        </div>
        <!-- End: Sidebar Left Content -->
    </aside>
    <!-- End: Sidebar Left -->

    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">

        <!-- Begin: Content -->
    @yield('content')
    <!-- End: Content -->
    </section>
    <!-- End: Content-Wrapper -->
</div>
<!-- End: Main -->

<!-- Alert Modal -->
<div class="modal fade" id="alertModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="padding-top: 2%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title text-danger" id="myModalLabel">
                    <i class="fa fa-exclamation-triangle"></i> @lang('global.alert_warning')</h4>
            </div>
            <div class="modal-body">
                <p id="modal-text"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-flat btn-danger btn-sm btn-flat pull-left" data-dismiss="modal">
                    <i class="fa fa-times"></i> Close
                </button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    (function () {
        window.alert = function () {
            $("#alertModal #modal-text").text(arguments[0]);
            $("#alertModal").modal('show');
        };
    })();
</script>

<!-- BEGIN: PAGE SCRIPTS -->

<!-- Theme Javascript -->
<script src="{{asset('theme/app/assets/js/utility/utility.js')}}"></script>
<script src="{{asset('theme/app/assets/js/demo/demo.js')}}"></script>
<script src="{{asset('theme/app/assets/js/main.js')}}"></script>

<script type="text/javascript">
    jQuery(document).ready(function () {

        "use strict";

        // Init Theme Core
        Core.init();

    });
</script>

@stack('scripts')

<!-- END: PAGE SCRIPTS -->

</body>

</html>
