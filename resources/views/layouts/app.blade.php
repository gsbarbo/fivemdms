<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ 'darkMode': true }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{ 'dark': darkMode === true }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mrs+Saint+Delafield&family=Reenie+Beanie&display=swap"
        rel="stylesheet">

    <link href="{{ asset('bladewind/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <script>
        var notification_timeout, user_function, el_name, momo_obj, delete_obj;
        var dropdownIsOpen = false;
    </script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('bladewind/js/helpers.js') }}" type="text/javascript"></script>
</head>

<body class="bg-gray-400 dark:bg-primary">
    <div class="font-sans antialiased text-gray-900 dark:text-off-white">

        <x-portal-navbar></x-portal-navbar>
        <div class="mt-8">{{ $slot }}</div>

    </div>

    @if (session('alert'))
        <div class="">
            <div class="absolute right-0 z-50 top-9">
                <x-alert />
            </div>
        </div>
    @endif

</body>

</html>
