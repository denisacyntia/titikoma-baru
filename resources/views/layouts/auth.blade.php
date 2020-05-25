<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">

    @yield('title')

    <link href="{{ asset('admin/css/coreui-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/flag-icon.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/simple-line-icons.css') }}" rel="stylesheet">

    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/pace.min.css') }}" rel="stylesheet">
</head>
<body class="app flex-row align-items-center">
    <div class="container">
        @yield('content')
    </div>

    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/pace.min.js') }}"></script>
    <script src="{{ asset('admin/js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/js/coreui.min.js') }}"></script>
    <script>
        $('#ui-view').ajaxLoad();
        $(document).ajaxComplete(function() {
            Pace.restart()
        });
    </script>
</body>
</html>
