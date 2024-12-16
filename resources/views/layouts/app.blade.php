<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr" data-nav-layout="vertical"
    data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Melly') }} @isset($pageTitle) - {{ $pageTitle }} @endisset</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">

    <!-- Choices JS -->
    <script src="{{ asset('libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>

    <!-- Main Theme Js -->
    <script src="{{ asset('js/main.js') }}"></script>

    <!-- Icons Css -->
    <link href="{{ asset('css/icons.css') }}" rel="stylesheet">

    <!-- Node Waves Css -->
    <link href="{{ asset('libs/node-waves/waves.min.css') }}" rel="stylesheet">

    <!-- Simplebar Css -->
    <link href="{{ asset('libs/simplebar/simplebar.min.css') }}" rel="stylesheet">

    <!-- Color Picker Css -->
    <link rel="stylesheet" href="{{ asset('libs/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('libs/@simonwep/pickr/themes/nano.min.css') }}">

    <!-- Choices Css -->
    <link rel="stylesheet" href="{{ asset('libs/choices.js/public/assets/styles/choices.min.css') }}">

    <link rel="stylesheet" href="{{ asset('libs/jsvectormap/css/jsvectormap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('libs/swiper/swiper-bundle.min.css') }}">

    <!-- Select2 -->
    {{-- <link href="{{ asset('libs/select2/css/select2.min.css') }}" rel="stylesheet"> --}}

    <!-- Sweetalerts CSS -->
    <link rel="stylesheet" href="{{ asset('libs/sweetalert2/sweetalert2.min.css') }}">
    
    <!-- Ckeditor -->
    <script src="{{ asset('libs/ckeditor/ckeditor.js') }}"></script>

    <!-- Scripts -->
    @vite('resources/sass/app.scss')
    
    {{-- <link rel="stylesheet" href="{{ asset('libs/jquery-toast-plugin/jquery.toast.min.css') }}" /> --}}

    <!-- Style Css -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    @stack('styles')
</head>

<body>
    @include('layouts.partials.switcher')

    <!-- Loader -->
    <div id="loader">
        <img src="{{ asset('images/media/loader.svg') }}" alt="Loader">
    </div>
    <!-- Loader -->
    <div class="page">
        @include('layouts.partials.header')
        @include('layouts.partials.sidebar')
        <div class="main-content app-content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        @include('layouts.partials.footer')
    </div>

    <!-- Scroll To Top -->
    <div class="scrollToTop">
        <span class="arrow"><i class="ri-arrow-up-s-fill fs-20"></i></span>
    </div>
    <div id="responsive-overlay"></div>
    <!-- Scroll To Top -->

    @vite('resources/js/app.js')

    {{-- jQuery library --}}
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>

    <!-- Popper JS -->
    <script src="{{ asset('libs/@popperjs/core/umd/popper.min.js') }}"></script>

    {{-- jQuery Validation --}}
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>

    {{-- jQuery Additional Methods --}}
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.js"></script>

    <!-- Defaultmenu JS -->
    <script src="{{ asset('js/defaultmenu.min.js') }}"></script>

    <!-- Node Waves JS-->
    <script src="{{ asset('libs/node-waves/waves.min.js') }}"></script>

    <!-- Sticky JS -->
    <script src="{{ asset('js/sticky.js') }}"></script>

    <!-- Simplebar JS -->
    <script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('js/simplebar.js') }}"></script>

    <!-- Color Picker JS -->
    <script src="{{ asset('libs/@simonwep/pickr/pickr.es5.min.js') }}"></script>

    <!-- JSVector Maps JS -->
    <script src="{{ asset('libs/jsvectormap/js/jsvectormap.min.js') }}"></script>

    <!-- JSVector Maps MapsJS -->
    <script src="{{ asset('libs/jsvectormap/maps/world-merc.js') }}"></script>

    <!-- Apex Charts JS -->
    <script src="{{ asset('libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Chartjs Chart JS -->
    <script src="{{ asset('libs/chart.js/chart.min.js') }}"></script>

    <!-- Custom-Switcher JS -->
    <script src="{{ asset('js/custom-switcher.min.js') }}"></script>

    <!-- Sweetalerts JS -->
    <script src="{{ asset('libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- Select2 Cdn -->
    {{-- <script src="{{ asset('libs/select2/js/select2.min.js') }}" ></script> --}}

    {{-- <script src="{{ asset('libs/jquery-toast-plugin/jquery.toast.min.js') }}"></script> --}}

    {{-- moment --}}
    <script src="{{ asset('libs/moment/moment.min.js') }}"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/scripts.js') }}"></script>

    @yield('scripts')

    <!-- Custom JS -->
    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
