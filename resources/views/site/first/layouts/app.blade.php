<!DOCTYPE html>
<html lang="en">
<head>
    @php
        session('lang') ?? session()->put('lang', app()->getLocale());
    @endphp


    <!-- PAGE TITLE HERE -->
    <title> {{ setting('website_title') }} </title>

    <meta charset="utf-8">
    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <meta name="keywords" content="{{ setting('meta_keywords') }}" />
    <meta name="author" content="{{ setting('meta_author') }}" />
    <meta name="description" content="{{ setting('meta_description') }}" />

    <!-- FAVICONS ICON -->
    <link rel="icon" href="{{ asset('site/images/favicon.png') }}" type="image/x-icon" />


    <!-- Bootstrap Stylesheet -->
    <link rel="stylesheet" href="{{ asset('site/css/bootstrap-rtl-4.4.1.min.css') }}">


    <!-- Sidebar Stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('site/css/jquery.mCustomScrollbar.min.css') }}">

    <!-- Font Awesome Stylesheet -->
    <link rel="stylesheet" href="{{ asset('site/css/font-awesome.min.css') }}">

    <!-- Custom Stylesheets -->
    <link rel="stylesheet" href="{{ asset('site/css/style-rtl.css') }}">
    <link rel="stylesheet" id="cpswitch" href="{{ asset('site/css/orange.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/responsive-rtl.css') }}">

    <!-- Owl Carousel Stylesheet -->
    <link rel="stylesheet" href="{{ asset('site/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/owl.theme.css') }}">

    <!-- Flex Slider Stylesheet -->
    <link rel="stylesheet" href="{{ asset('site/css/flexslider.css') }}" type="text/css" />

    <!--Date-Picker Stylesheet-->
    <link rel="stylesheet" href="{{ asset('site/css/datepicker.css') }}">

    <!-- Magnific Gallery -->
    <link rel="stylesheet" href="{{ asset('site/css/magnific-popup.css') }}">

    @if(session('lang') == 'ar')
    @else
    @endif


    @stack('styles')

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ setting('google_analytics') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', '{{ setting('google_analytics') }}');
    </script>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i%7CMerriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
</head>
<body id="main-homepage">
<div class="wrapper">
    <div class="loader"></div>

    @include('site.first.layouts.header')

    @yield('content')

    @include('site.first.layouts.footer')

</div>

<!-- JAVASCRIPT FILES ========================================= -->
<script src="{{ asset('site/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('site/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('site/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('site/js/bootstrap-rtl-4.4.1.min.js') }}"></script>
<script src="{{ asset('site/js/jquery.flexslider.js') }}"></script>
<script src="{{ asset('site/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('site/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('site/js/custom-navigation.js') }}"></script>
<script src="{{ asset('site/js/custom-flex.js') }}"></script>
<script src="{{ asset('site/js/custom-owl.js') }}"></script>
<script src="{{ asset('site/js/custom-date-picker.js') }}"></script>
<script src="{{ asset('site/js/custom-video.js') }}"></script>

@stack('scripts')

</body>
</html>
