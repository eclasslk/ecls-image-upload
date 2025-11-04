<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CIMS') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Vite Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Custom Auth Theme -->
    <link rel="stylesheet" href="{{ asset('css/auth-theme.css') }}">
</head>
<body class="font-sans text-gray-900 antialiased">
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">

    <!-- Logo -->
    <div>
        <a href="/">
            <img src="{{ asset('image/logo/logo.png') }}" alt="Logo" class="w-40 h-20 logo-img">
        </a>
    </div>

    <!-- Auth Card -->
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 auth-card">
        {{ $slot }}
    </div>
</div>
</body>
</html>
