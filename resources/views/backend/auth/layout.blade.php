<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>{{config('app.name')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Font CSS (Via CDN) -->
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700'>

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/font-awesome/css/fontawesome-all.css')}}">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="{{url('theme/app/assets/skin/default_skin/css/theme.css')}}">
    
    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css" href="{{url('theme/app/assets/admin-tools/admin-forms/css/admin-forms.css')}}">
    
    <!-- Favicon -->
    {{--<link rel="shortcut icon" href="{{url('theme/admin/assets/img/favicon.ico')}}">--}}

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body class="external-page sb-l-c sb-r-c">

<!-- Start: Main -->
<div id="main" class="animated fadeIn">
    
    <!-- Start: Content-Wrapper -->
    <section id="content_wrapper">
        
        <div id="canvas-wrapper">
            <canvas id="demo-canvas"></canvas>
        </div>
        
        <!-- Begin: Content -->
        @yield('content')
        <!-- End: Content -->
    
    </section>
    <!-- End: Content-Wrapper -->

</div>
<!-- End: Main -->

<!-- BEGIN: PAGE SCRIPTS -->

<!-- jQuery -->
<script src="{{url('theme/app/vendor/jquery/jquery-1.11.1.min.js')}}"></script>
<script src="{{url('theme/app/vendor/jquery/jquery_ui/jquery-ui.min.js')}}"></script>

<!-- CanvasBG Plugin(creates mousehover effect) -->
<script src="{{url('theme/app/vendor/plugins/canvasbg/canvasbg.js')}}"></script>

<!-- Theme Javascript -->
<script src="{{url('theme/app/assets/js/utility/utility.js')}}"></script>
<script src="{{url('theme/app/assets/js/demo/demo.js')}}"></script>
<script src="{{url('theme/app/assets/js/main.js')}}"></script>

<!-- Page Javascript -->
<script type="text/javascript">
    jQuery(document).ready(function () {

        "use strict";

        // Init Theme Core
        Core.init();

        // Init CanvasBG and pass target starting location
        CanvasBG.init({
            Loc: {
                x: window.innerWidth / 2,
                y: window.innerHeight / 3.3
            },
        });

    });
</script>

<!-- END: PAGE SCRIPTS -->

</body>

</html>
