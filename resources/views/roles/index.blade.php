@extends('dashboard')

@section('title', 'Roles')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Role Management</h2>
        <div class="space-x-2">
            <a href="{{ route('roles.create') }}"
               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Add New</a>
            <a href="{{ route('roles.export') }}"
   class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Export</a>

            <button type="button"
                class="inline-flex items-center px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600"
                onclick="openImportModal()">Import</button>
            <button onclick="window.print()"
               class="inline-flex items-center px-4 py-2 bg-gray-700 text-white rounded-md hover:bg-gray-800">Print</button>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table id="rolesTable" class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Slug</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Description</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($roles as $role)
                    <tr>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $role->name }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $role->slug }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $role->description }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700 space-x-2">
                            <a href="{{ route('roles.show', $role->id) }}"
                               class="text-blue-600 hover:underline">View</a>
                            <a href="{{ route('roles.edit', $role->id) }}"
                               class="text-yellow-600 hover:underline">Edit</a>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')"
                                        class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Import Modal -->
<div id="importModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-30 z-50 hidden">
    <div class="bg-white rounded-lg p-6 w-full max-w-md shadow-lg">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-800">Import Roles</h3>
            <button onclick="closeImportModal()" class="text-gray-500 hover:text-gray-700 text-xl">&times;</button>
        </div>

        {{-- Import form partial --}}
        @include('roles.import')
    </div>
</div>
@endsection

@push('scripts')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#rolesTable').DataTable();
    });

    function openImportModal() {
        document.getElementById('importModal').classList.remove('hidden');
    }

    function closeImportModal() {
        document.getElementById('importModal').classList.add('hidden');
    }
</script>
@endpush
