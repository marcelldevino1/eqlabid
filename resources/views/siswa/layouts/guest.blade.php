<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/icons/logo-white.svg') }}">
    <title>{{ config('app.name', 'EQLAB.id') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-[Poppins] antialiased bg-[#f5f7fb] text-gray-900">
    <div class="flex flex-col items-center justify-center min-h-screen">
        <div class="w-full max-w-md p-8 bg-white shadow-lg rounded-2xl">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
