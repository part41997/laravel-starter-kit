<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <!-- Meta Data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Starter') }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">

    {{-- Fontawesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <!-- Style Css -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <!-- Icons Css -->
    <link href="{{ asset('css/icons.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        body {
            background-image: url('https://images.pexels.com/photos/268976/pexels-photo-268976.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
        }
    </style>
</head>

<body>
    <div class="container">
        @yield('content')
    </div>
    {{-- jQuery library --}}
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>

    {{-- jQuery Validation --}}
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>

    {{-- Custom Scripts --}}
    <script src="{{ asset('js/scripts.js') }}"></script>
    
    @yield('scripts')
</body>

</html>
