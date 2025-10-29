    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title', 'Dashboard')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.tailwindcss.com"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables CSS & JS -->
        <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <style>
    /* === Styling Select2 agar mirip input Tailwind === */
    .select2-container--default .select2-selection--single,
    .select2-container--default .select2-selection--multiple {
        border: 1px solid rgb(209 213 219); /* border-gray-300 */
        border-radius: 0.5rem; /* rounded-md */
        min-height: 2.5rem;
        padding: 0.25rem 0.5rem;
        background-color: white;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered,
    .select2-container--default .select2-selection--multiple .select2-selection__rendered {
        color: rgb(31 41 55); /* text-gray-800 */
        line-height: 1.75rem;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: rgb(199 210 254); /* bg-indigo-100 */
        border: 1px solid rgb(165 180 252);
        color: rgb(49 46 129);
        padding: 0.125rem 0.5rem;
        margin-top: 0.1875rem;
        margin-right: 0.25rem;
        border-radius: 0.375rem;
        font-size: 0.875rem;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        margin-right: 0.25rem;
        color: rgb(79 70 229); /* indigo-600 */
    }

    .select2-results__option {
        padding: 0.5rem 0.75rem;
    }

    .select2-selection__arrow {
        display: none;
    }

    /* Wrapper biar width-nya penuh */
    .select2-container {
        width: 100% !important;
    }
    </style>

        <style>

            .nav-text { opacity: 0; width: 0; overflow: hidden; transition: opacity 0.3s ease, width 0.3s ease; white-space: nowrap; }
            .sidebar:hover .nav-text { opacity: 1; width: auto; margin-left: 12px; }
            .logo-text { opacity: 0; max-height: 0; overflow: hidden; transition: opacity 0.3s ease, max-height 0.3s ease; }
            .sidebar:hover .logo-text { opacity: 1; max-height: 100px; }
            .submenu { max-height: 0; overflow: hidden; transition: max-height 0.3s ease; }
            .submenu.active { max-height: 400px; }
            .chevron { transition: transform 0.3s ease; }
            .chevron.rotate { transform: rotate(180deg); }
            nav::-webkit-scrollbar { display: none; }
            nav { -ms-overflow-style: none; scrollbar-width: none; }
        </style>
    </head>
    <body class="bg-gray-50">
        <div class="flex h-screen">
            {{-- Sidebar --}}
    <div class="flex flex-col items-start w-20 px-4 py-6 transition-all duration-300 bg-white shadow-lg sidebar hover:w-60">
        @include('dashboard.sidebar') <!-- Sudah termasuk logo, menu, dan logout -->
    </div>
            {{-- Main Content --}}
            <div class="flex flex-col flex-1">
                {{-- Header --}}
                @include('dashboard.header')

                {{-- Page Content --}}
                <main class="relative flex-1 p-8 overflow-auto">
                    @yield('content')

                    <button type="submit" class="absolute px-4 py-2 text-white bg-blue-600 rounded-md bottom-4 right-4 hover:bg-blue-700"></button>
                </main>
            </div>
        </div>


        @stack('scripts')
        @push('scripts')
    <script>
        function toggleSubmenu(menuId) {
            var submenu = document.getElementById('submenu-' + menuId);
            var button = document.getElementById('nav-' + menuId);
            var chevron = button.querySelector('.chevron');

            submenu.classList.toggle('active');
            chevron.classList.toggle('rotate');

            var buttons = document.querySelectorAll('.nav-btn');
            buttons.forEach(btn => {
                if (btn.id !== 'nav-' + menuId) {
                    btn.classList.remove('bg-blue-900', 'text-white', 'shadow-lg');
                    btn.classList.add('bg-gray-100', 'text-gray-400');
                }
            });

            button.classList.remove('bg-gray-100', 'text-gray-400');
            button.classList.add('bg-blue-900', 'text-white', 'shadow-lg');
        }

        function setActive(navId) {
            document.querySelectorAll('.submenu').forEach(el => el.classList.remove('active'));
            document.querySelectorAll('.chevron').forEach(el => el.classList.remove('rotate'));

            document.querySelectorAll('.nav-btn').forEach(btn => {
                btn.classList.remove('bg-blue-900', 'text-white', 'shadow-lg');
                btn.classList.add('bg-gray-100', 'text-gray-400');
            });

            const activeBtn = document.getElementById('nav-' + navId);
            activeBtn.classList.remove('bg-gray-100', 'text-gray-400');
            activeBtn.classList.add('bg-blue-900', 'text-white', 'shadow-lg');

            updateContent(navId);
        }

        function setActiveSubmenu(submenuId) {
            document.querySelectorAll('.submenu-btn').forEach(btn =>
                btn.classList.remove('bg-blue-100', 'text-blue-900', 'font-semibold')
            );

            event.target.closest('.submenu-btn').classList.add('bg-blue-100', 'text-blue-900', 'font-semibold');
            updateContent(submenuId);
        }

        function updateContent(pageId) {
            const contentArea = document.getElementById('content-area');
            const titles = {
                'chat': 'Chat',
                'calendar': 'Calendar',
                'user-profile': 'User Profile',
                'role': 'Role Management',
                'module': 'Module Management',
                'method-action': 'Method Action',
                'module-permission': 'Module Permission',
                'user-permission': 'User Permission'
            };

            const title = titles[pageId] || 'Content Area';
            contentArea.innerHTML = `
                <div class="text-left">
                    <h2 class="mb-4 text-2xl font-bold text-gray-800">${title}</h2>
                    <p class="text-gray-600">Content for ${title} will be displayed here.</p>
                </div>`;
        }
    </script>
    @endpush
    </body>
    </html>
