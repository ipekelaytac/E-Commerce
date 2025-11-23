<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', config('app.name'))</title>
    @include('management.layouts.partials.header')
    @yield('header')
</head>
<body>
                        @include('management.layouts.partials.navbar')
                        @yield('content')
                        @include('management.layouts.partials.footer')
                        <script src="/management/plugins/jquery/jquery.min.js"></script>
                        <script src="/management/plugins/popper/popper.js"></script>
                        <script src="/management/plugins/jquery-ui/jquery-ui.js"></script>
                        <script src="/management/plugins/bootstrap/js/bootstrap.min.js"></script>
                        <script src="/management/plugins/pace/pace.min.js"></script>
                        <script src="/management/plugins/feather-icon/feather.min.js"></script>
                        <script src="/management/js/jquery.slimscroll.min.js"></script>
                        <script src="/management/js/highlight.min.js"></script>
                        <script src="/management/js/app.js"></script>
                        <script src="/management/js/custom.js"></script>
@yield('footer')
</body>

</html>

