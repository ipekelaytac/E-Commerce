<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', config('app.name'))</title>
    @include('customer.layouts.partials.head')
    @yield('head')
</head>

<body>
<div id="page">

    @include('customer.layouts.partials.navbar')
    @yield('content')
    @include('customer.layouts.partials.footer')


</div>

<div id="toTop"></div>


@include('customer.layouts.partials.js')
@yield('js')
</body>

</html>
