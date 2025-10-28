<body class="font-sans antialiased">
    
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation') {{-- optional --}}
        <main>
            @yield('content')
        </main>
    </div>
</body>
