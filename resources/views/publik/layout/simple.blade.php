<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'EQLAB.id')</title>
  <link rel="icon" type="image/svg+xml" href="{{ asset('images/icons/logo-white.svg') }}">
  @vite('resources/css/app.css')

  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f9fafb;
      color: #1f2937;
    }
  </style>
</head>

<body class="flex flex-col min-h-screen">

  {{-- Header minimal --}}
  <header class="bg-white shadow-sm">
    <div class="flex items-center justify-between max-w-6xl px-6 py-4 mx-auto">
      <a href="/" class="flex items-center space-x-2">
        <img src="{{ asset('images/icons/logo.svg') }}" alt="Logo" class="w-auto h-9">
      </a>
    </div>
  </header>

  {{-- Konten utama --}}
  <main class="flex-grow px-6 py-10">
    @yield('content')
  </main>

  {{-- Footer --}}
  <footer class="bg-[#0C3C6C] text-white text-center py-4 text-sm">
    <p>&copy; {{ date('Y') }} EQLAB.id. Semua hak dilindungi.</p>
  </footer>

</body>

</html>
