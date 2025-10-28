<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/icons/logo-white.svg') }}">
    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:400,500,600,700&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
    <!-- Scripts -->
    <link rel="stylesheet" href=" http://eqlabid.jh-beon.cloud/build/assets/app-mnQoiJVb.css ">
</head>

<body class="font-[Poppins] antialiased bg-[#ffffff] text-gray-900">
    <main>
        {{ $slot }}
    </main>
</body>
<script src="http://eqlabid.jh-beon.cloud/build/assets/app-CXDpL9bK.js"></script>">

</html>