<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/font-awesome/css/fontawesome-all.css')}}">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('theme/app/assets/skin/default_skin/css/theme.css')}}">
</head>
<body>

@yield('content')

<script type="text/javascript">
    window.onload = function () {
        window.print();
    }
</script>

</body>
</html>