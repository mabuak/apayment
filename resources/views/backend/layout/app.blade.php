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
    <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600'>

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/font-awesome/css/fontawesome-all.css')}}">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('theme/app/assets/skin/default_skin/css/theme.css')}}">

    <!-- Ladda -->
    <link rel="stylesheet" type="text/css" href="{{asset('theme/app/vendor/plugins/ladda/ladda.min.css')}}">

    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('theme/app/assets/admin-tools/admin-forms/css/admin-forms.css')}}">
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

<body class="dashboard-page sb-l-o sb-r-c">

<!-- Start: Main -->
<div id="main">

    <!-- Start: Header -->
    <header class="navbar navbar-fixed-top bg-info">
        <div class="navbar-branding">
            <a class="navbar-brand" href="{{url('auth')}}">
                {{config('app.name')}}
            </a>
            <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
        </div>

        <ul class="nav navbar-nav navbar-right">

            <!-- Language -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <img src="{{ Session::get('locale') == 'en' ? url('images/flags/english_flag.png') : url('images/flags/english_flag.png')}}" style="margin-top:-1px" align="middle">
                    <b class="fa fa-caret-down"></b></a>
                <ul class="dropdown-menu pv5 animated animated-short flipInX" style="min-width: 60px;" role="menu" aria-labelledby="dLabel">
                    <li>
                        <a href="{{route('language.change', ['en'])}}"><img src="{{url('images/flags/english_flag.png')}}" class="language-img"> &nbsp;&nbsp;English</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="dropdown-toggle fw600" data-toggle="dropdown"> Hi, {{Sentinel::getUser()->first_name}}
                    <span class="caret caret-tp hidden-xs"></span>
                </a>
                <ul class="dropdown-menu list-group dropdown-persist w150" role="menu">
                    <li class="list-group-item">
                        <a href="{{route('change_password.form')}}" class="animated animated-short fadeInUp">
                            <span class="fa fa-lock"></span> Change Password </a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{route('logout')}}" class="animated animated-short fadeInUp">
                            <span class="fa fa-power-off pr5"></span> @lang('auth.logout_heading') </a>
                    </li>
                </ul>
            </li>
        </ul>
    </header>
    <!-- End: Header -->

    <!-- Start: Sidebar Left -->
    <aside id="sidebar_left" class="nano nano-primary">
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

                @include('backend.menu.auth')
            </ul>
            <!-- End: Sidebar Menu -->
        </div>
        <!-- End: Sidebar Left Content -->
    </aside>
    <!-- End: Sidebar Left -->

    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">

        <!-- Start: Topbar -->
    @yield('topbar')
    <!-- End: Topbar -->

        <!-- Begin: Content -->
    @yield('content')
    <!-- End: Content -->
    </section>
    <!-- End: Content-Wrapper -->

    <!-- Begin: Page Footer -->
    <footer id="content-footer">
        <div class="row">
            <div class="col-md-6">
                <span class="footer-legal"> <b>Version</b> 1.0.0 <b>Build</b> 0</span> ||
                <a href="mailto:support@carrymobile.com">Contact Support</a>
            </div>
            <div class="col-md-6 text-right">
                <strong style="margin-right: 40px">Copyright &copy; 2018.</strong>
                <a href="#content" class="footer-return-top">
                    <span class="fa fa-arrow-up"></span>
                </a>
            </div>
        </div>
    </footer>
    <!-- End: Page Footer -->
</div>
<!-- End: Main -->

<!-- BEGIN: PAGE SCRIPTS -->

<!-- Remove Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close btn-sm" data-dismiss="modal" aria-hidden="true">x</button>
                <h4 class="modal-title custom_align text-danger" id="titles">
                    <i class="fa fa-exclamation-triangle"></i> @lang('global.alert_warning')</h4>
            </div>
            <form action="" method="post" id="remove-form">
                {!! csrf_field() !!}

                <input name="_method" type="hidden" id="method" value="DELETE">

                <div class="remove-form-list"></div>

                <div class="modal-body">
                    <div class="alert alert-micro alert-border-left alert-danger alert-dismissable">
                        <i class="fa fa-info pr10"></i>
                        <span id="message"></span>
                    </div>
                </div>

                <div class="modal-footer ">
                    <button type="submit" class="btn ladda-button btn-success btn-sm send-request" data-style="zoom-in">
                        <span class="ladda-label"><span class="fa fa-check"></span> @lang('global.yes')</span>
                        <span class="ladda-spinner"><div class="ladda-progress" style="width: 0px;"></div></span>
                    </button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">
                        <span class="fa fa-times"></span> @lang('global.no')</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

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

<!-- Theme Javascript -->
<script src="{{asset('theme/app/assets/js/utility/utility.js')}}"></script>
<script src="{{asset('theme/app/assets/js/demo/demo.js')}}"></script>
<script src="{{asset('theme/app/assets/js/main.js')}}"></script>

<script type="text/javascript">
    jQuery(document).ready(function () {

        "use strict";

        // Init Theme Core
        Core.init();

        // Init Demo JS
        Demo.init();

        // Init Admin Panels on widgets inside the ".admin-panels" container
        $('.admin-panels').adminpanel({
            grid: '.admin-grid',
            draggable: true,
            preserveGrid: true,
            mobile: false,
            onStart: function () {
                // Do something before AdminPanels runs
            },
            onFinish: function () {
                $('.admin-panels').addClass('animated fadeIn').removeClass('fade-onload');
            },
            onSave: function () {
                $(window).trigger('resize');
            }
        });

        $('.tip').tooltip({
            'placement': 'bottom',
            'container': 'body'
        });
    });

    $('#delete').on('show.bs.modal', function (e) {
        var removedLinkFull = $(e.relatedTarget).data('href');
        var message = $(e.relatedTarget).data('message');
        var title = $(e.relatedTarget).data('title');
        var method = $(e.relatedTarget).data('method');

        $('#title').text(title);
        $('#message').text(message);

        if(typeof method !== "undefined"){
            $('#method').val(method);
        }

        $('#remove-form').attr('action', removedLinkFull);
    });

</script>

<!-- Loading Button -->
<script src="{{asset('theme/app/vendor/plugins/ladda/ladda.min.js')}}"></script>
<script>
    // Init Ladda Plugin on buttons
    Ladda.bind('.ladda-button', {
        timeout: 2000
    });

    // Bind progress buttons and simulate loading progress. Note: Button still requires ".ladda-button" class.
    Ladda.bind('.progress-button', {
        callback: function (instance) {

            $(function () {
                $('form select').select2({
                    theme: "bootstrap",
                    placeholder: "Select",
                    containerCssClass: ':all:'
                });
            });

            var progress = 0;
            var interval = setInterval(function () {
                progress = Math.min(progress + Math.random() * 0.1, 1);
                instance.setProgress(progress);

                if (progress === 1) {
                    instance.stop();
                    clearInterval(interval);
                }
            }, 200);
        }
    });
</script>
@stack('scripts')

<!-- END: PAGE SCRIPTS -->

</body>

</html>
