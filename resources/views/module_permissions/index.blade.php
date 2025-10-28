@extends('dashboard')

@section('title', 'Module Permissions')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Module Permissions</h2>
        <div class="space-x-2">
            <a href="{{ route('module-permissions.create') }}"
               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Add New</a>
            <a href="{{ route('module-permissions.export') }}"
               class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Export</a>
            <button onclick="openImportModal()"
               class="inline-flex items-center px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">Import</button>
            <a href="{{ route('module-permissions.download-template') }}"
               class="inline-flex items-center px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Download Template</a>
        </div>
    </div>

    @if (session('success'))
        <div class="mb-4 text-green-700 bg-green-100 border border-green-200 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase border-r">No</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase border-r">Role</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase border-r">Modules & Actions</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @php $no = 1; @endphp
                @foreach($groupedPermissions as $roleName => $modules)
                    @php $roleId = \App\Models\Role::where('name', $roleName)->value('id'); @endphp
                    <tr>
                        <td class="px-4 py-2 text-sm text-gray-700 border-r align-top">{{ $no++ }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700 border-r align-top">{{ $roleName }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700 border-r">
                            @foreach($modules as $moduleName => $actions)
                                @foreach($actions as $action)
                                    <span class="inline-block bg-blue-600 text-white text-xs px-3 py-1 rounded-full mr-2 mb-1">
                                        {{ $moduleName }}.{{ $action }}
                                    </span>
                                @endforeach
                            @endforeach
                        </td>
                        <td class="px-4 py-2 text-sm text-gray-700">
                            <a href="{{ route('module-permissions.edit', $roleId) }}"
                               class="inline-flex items-center px-3 py-1 bg-yellow-500 text-white text-xs rounded hover:bg-yellow-600">
                                Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Import -->
<div id="importModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-30 z-50 hidden">
    <div class="bg-white rounded-lg p-6 w-full max-w-md shadow-lg">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-800">Import Module Permissions</h3>
            <button onclick="closeImportModal()" class="text-gray-500 hover:text-gray-700 text-xl">&times;</button>
        </div>
        @include('module_permissions.import')
    </div>
</div>
@endsection

@push('scripts')
<script>
    function openImportModal() {
        document.getElementById('importModal').classList.remove('hidden');
    }

    function closeImportModal() {
        document.getElementById('importModal').classList.add('hidden');
    }
</script>
@endpush
