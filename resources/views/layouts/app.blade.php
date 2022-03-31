<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>..::E-buy::..</title>
    <link rel="stylesheet" href="{{ asset('public/contents/website/assets') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('public/contents/website/assets') }}/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('public/contents/website/assets') }}/css/venobox.min.css">
    <link rel="stylesheet" href="{{ asset('public/contents/website/assets') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('public/contents/website/assets') }}/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{ asset('public/contents/website/assets') }}/css/zoomy.css">
    <link rel="stylesheet" href="{{ asset('public/contents/website/assets') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('public/contents/website/assets') }}/css/responisive.css">
    <script src="{{ asset('public/contents/website/assets') }}/js/jquery-2.1.3.min.js"></script>
    <script src="{{ asset('public/contents/website/assets') }}/js/modernizr-2.8.3.min.js"></script>
</head>

<body>

    @include('website.common.header')
@stack('banner')


@yield('content')


    @include('website.common.footer')


    <script src="{{ asset('public/contents/website/assets') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('public/contents/website/assets') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('public/contents/website/assets') }}/js/waypoints.min.js"></script>
    <script src="{{ asset('public/contents/website/assets') }}/js/jquery.counterup.min.js"></script>
    <script src="{{ asset('public/contents/website/assets') }}/js/venobox.min.js"></script>
    <script src="{{ asset('public/contents/website/assets') }}/js/menu-plugins.js"></script>
    <script src="{{ asset('public/contents/website/assets') }}/js/menu_active.js"></script>
    <script src="{{ asset('public/contents/website/assets') }}/js/zoomy.js"></script>
    <script src="{{ asset('public/contents/website/assets') }}/js/bootstrap-input-spinner.js"></script>
    <script src="{{ asset('public/contents/website/assets') }}/js/countdown.js"></script>
    <script src="{{ asset('public/contents/website/assets') }}/js/custom.js"></script>
    @stack('js')
</body>

</html>
