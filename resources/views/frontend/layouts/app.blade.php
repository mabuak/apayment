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

    <!-- Ladda -->
    <link rel="stylesheet" type="text/css" href="{{asset('theme/app/vendor/plugins/ladda/ladda.min.css')}}">

    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('theme/app/assets/admin-tools/admin-forms/css/admin-forms.css')}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/font-awesome/css/fontawesome-all.css')}}">

@stack('css')

<!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}">

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
        #main:before {
            background: #f5f5f5 url('{{Storage::url('uploads/images/symphony.png')}}') repeat !important;
        }
    </style>
</head>

<body class="dashboard-page sb-l-o sb-r-c">

<div id="main">

<!-- Begin: Content -->
@yield('content')
<!-- End: Content -->
</div>

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

        // Init Demo JS
        Demo.init();
    });
</script>


@stack('scripts')

<!-- END: PAGE SCRIPTS -->

</body>

</html>
