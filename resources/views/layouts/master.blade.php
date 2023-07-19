<!DOCTYPE html>
<html>

<head>
    <title>Pressroom - @yield('title')</title>
    <!--meta-->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.2" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="keywords" content="Medic, Medical Center" />
    <meta name="description" content="Responsive Medical Health Template" />
    <!--style-->
    @include('parts.styles')

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
</head>

<body>
    <div class="site_container">
        @include('parts.header-nav')
        @yield('content')
        @include('parts.footer')
    </div>
    <div class="background_overlay"></div>
    <!--js-->
    @include('parts.scripts')
</body>

</html>
