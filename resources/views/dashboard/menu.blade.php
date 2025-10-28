<!-- Access Management dengan Submenu -->
<div class="flex flex-col w-full h-full">
    <button onclick="toggleSubmenu('access')" id="nav-access"
        class="flex items-center justify-between w-full px-3 py-3 text-gray-400 transition-all bg-gray-100 nav-btn rounded-xl hover:bg-gray-200">
        <div class="flex items-center">
            <svg class="flex-shrink-0 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <rect x="3" y="3" width="7" height="7" stroke-width="2"></rect>
                <rect x="14" y="3" width="7" height="7" stroke-width="2"></rect>
                <rect x="14" y="14" width="7" height="7" stroke-width="2"></rect>
                <rect x="3" y="14" width="7" height="7" stroke-width="2"></rect>
            </svg>
            <span class="font-medium nav-text">Access Management</span>
        </div>
        <svg class="flex-shrink-0 w-4 h-4 chevron nav-text" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
    </button>

    <!-- Submenu dengan scroll -->
    <div id="submenu-access" class="max-h-screen pr-2 mt-2 overflow-y-auto submenu ml-9">
        <a href="{{ route('user_profiles.index') }}"
            class="flex items-center w-full px-3 py-2 text-sm text-gray-600 transition-all rounded-lg submenu-btn hover:bg-gray-100">
            <svg class="flex-shrink-0 w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="3" stroke-width="2"></circle>
            </svg>
            <span class="nav-text">User Profiles</span>
        </a>

        <!-- Role -->
        <a href="{{ route('roles.index') }}"
            class="flex items-center w-full px-3 py-2 text-sm text-gray-600 transition-all rounded-lg submenu-btn hover:bg-gray-100">
            <svg class="flex-shrink-0 w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M10 6h4m-2 -2v4m0 4v4m0 4h.01" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <span class="nav-text">Roles</span>
        </a>

        <a href="{{ route('modules.index') }}"
            class="flex items-center w-full px-3 py-2 text-sm text-gray-600 transition-all rounded-lg submenu-btn hover:bg-gray-100">
            <svg class="flex-shrink-0 w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M10 6h4m-2 -2v4m0 4v4m0 4h.01" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <span class="nav-text">Modules</span>
        </a>

        <a href="{{ route('method-actions.index') }}"
            class="flex items-center w-full px-3 py-2 text-sm text-gray-600 transition-all rounded-lg submenu-btn hover:bg-gray-100">
            <svg class="flex-shrink-0 w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M10 6h4m-2 -2v4m0 4v4m0 4h.01" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <span class="nav-text">Method Actions</span>
        </a>

        <a href="{{ route('kelas.index') }}"
            class="flex items-center w-full px-3 py-2 text-sm text-gray-600 transition-all rounded-lg submenu-btn hover:bg-gray-100">
            <svg class="flex-shrink-0 w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M10 6h4m-2 -2v4m0 4v4m0 4h.01" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <span class="nav-text">Clasess</span>
        </a>
        <a href="{{ route('classes-students.index') }}"
            class="flex items-center w-full px-3 py-2 text-sm text-gray-600 transition-all rounded-lg submenu-btn hover:bg-gray-100">
            <svg class="flex-shrink-0 w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M10 6h4m-2 -2v4m0 4v4m0 4h.01" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <span class="nav-text">Clasess Students</span>
        </a>

        <a href="{{ route('module-permissions.index') }}"
            class="flex items-center w-full px-3 py-2 text-sm text-gray-600 transition-all rounded-lg submenu-btn hover:bg-gray-100">
            <svg class="flex-shrink-0 w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M10 6h4m-2 -2v4m0 4v4m0 4h.01" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <span class="nav-text">Module Permissions</span>
        </a>

        <a href="{{ route('user-assignments.index') }}"
            class="flex items-center w-full px-3 py-2 text-sm text-gray-600 transition-all rounded-lg submenu-btn hover:bg-gray-100">
            <svg class="flex-shrink-0 w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M10 6h4m-2 -2v4m0 4v4m0 4h.01" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <span class="nav-text">User Assignments</span>
        </a>

        <a href="{{ route('user-access.index') }}"
            class="flex items-center w-full px-3 py-2 text-sm text-gray-600 transition-all rounded-lg submenu-btn hover:bg-gray-100">
            <svg class="flex-shrink-0 w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M10 6h4m-2 -2v4m0 4v4m0 4h.01" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <span class="nav-text">User Access</span>
        </a>

        <a href="{{ route('user-permissions.index') }}"
            class="flex items-center w-full px-3 py-2 text-sm text-gray-600 transition-all rounded-lg submenu-btn hover:bg-gray-100">
            <svg class="flex-shrink-0 w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M10 6h4m-2 -2v4m0 4v4m0 4h.01" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <span class="nav-text">User Permissions</span>
        </a>

        <a href="{{ route('mapels.index') }}"
            class="flex items-center w-full px-3 py-2 text-sm text-gray-600 transition-all rounded-lg submenu-btn hover:bg-gray-100">
            <svg class="flex-shrink-0 w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M10 6h4m-2 -2v4m0 4v4m0 4h.01" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <span class="nav-text">Subjects</span>
        </a>

        <a href="{{ route('teaching_assignments.index') }}"
            class="flex items-center w-full px-3 py-2 text-sm text-gray-600 transition-all rounded-lg submenu-btn hover:bg-gray-100">
            <svg class="flex-shrink-0 w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M10 6h4m-2 -2v4m0 4v4m0 4h.01" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <span class="nav-text">teaching_assignments</span>
        </a>

        <a href="{{ route('tahun.index') }}"
            class="flex items-center w-full px-3 py-2 text-sm text-gray-600 transition-all rounded-lg submenu-btn hover:bg-gray-100">
            <svg class="flex-shrink-0 w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M10 6h4m-2 -2v4m0 4v4m0 4h.01" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <span class="nav-text">Years</span>
        </a>

        <a href="{{ route('type-tasks.index') }}"
            class="flex items-center w-full px-3 py-2 text-sm text-gray-600 transition-all rounded-lg submenu-btn hover:bg-gray-100">
            <svg class="flex-shrink-0 w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M10 6h4m-2 -2v4m0 4v4m0 4h.01" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <span class="nav-text">Type of Task</span>
        </a>
        <a href="{{ route('scores.index') }}"
            class="flex items-center w-full px-3 py-2 text-sm text-gray-600 transition-all rounded-lg submenu-btn hover:bg-gray-100">
            <svg class="flex-shrink-0 w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M10 6h4m-2 -2v4m0 4v4m0 4h.01" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <span class="nav-text">Score</span>
        </a>
        <a href=""
            class="flex items-center w-full px-3 py-2 text-sm text-gray-600 transition-all rounded-lg submenu-btn hover:bg-gray-100">
            <svg class="flex-shrink-0 w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M10 6h4m-2 -2v4m0 4v4m0 4h.01" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <span class="nav-text">Type of Task Students</span>
        </a>
        <a href="{{ route('prestasi.index') }}"
            class="flex items-center w-full px-3 py-2 text-sm text-gray-600 transition-all rounded-lg submenu-btn hover:bg-gray-100">
            <svg class="flex-shrink-0 w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M10 6h4m-2 -2v4m0 4v4m0 4h.01" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <span class="nav-text">Achievements</span>
        </a>
        <a href="{{ route('berita.index') }}"
            class="flex items-center w-full px-3 py-2 text-sm text-gray-600 transition-all rounded-lg submenu-btn hover:bg-gray-100">
            {{-- Anda bisa mengganti SVG ini dengan ikon yang lebih mewakili "Berita" --}}
            <svg class="flex-shrink-0 w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M16 8v8a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2h2m4 0h6a2 2 0 012 2v6m-3-3h.01"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <span class="nav-text">News (Berita)</span>
        </a>
        <a href=""
            class="flex items-center w-full px-3 py-2 text-sm text-gray-600 transition-all rounded-lg submenu-btn hover:bg-gray-100">
            <svg class="flex-shrink-0 w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M10 6h4m-2 -2v4m0 4v4m0 4h.01" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <span class="nav-text">Disciplinary Points</span>
        </a>
        <a href=""
            class="flex items-center w-full px-3 py-2 text-sm text-gray-600 transition-all rounded-lg submenu-btn hover:bg-gray-100">
            <svg class="flex-shrink-0 w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path d="M10 6h4m-2 -2v4m0 4v4m0 4h.01" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <span class="nav-text">Student Violations</span>
        </a>
        <!-- Tambahkan menu lain seperti Role, Module, dll -->
    </div>
</div>