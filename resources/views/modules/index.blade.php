@extends('dashboard')

@section('title', 'Modules')

@section('content')
    <div class="p-6 bg-white rounded-lg shadow-md">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Module Management</h2>
            <div class="space-x-2">

                <a href="{{ route('modules.create') }}"
                    class="inline-flex items-center px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">Add
                    New</a>

                <a href="{{ route('modules.export') }}"
                    class="inline-flex items-center px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-700">Export</a>

                <button type="button"
                    class="inline-flex items-center px-4 py-2 text-white bg-yellow-500 rounded-md hover:bg-yellow-600"
                    onclick="openImportModal()">Import</button>
                <button onclick="window.print()"
                    class="inline-flex items-center px-4 py-2 text-white bg-gray-700 rounded-md hover:bg-gray-800">Print</button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table id="modulesTable" class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-xs font-medium text-left text-gray-500 uppercase">#</th>
                        <th class="px-4 py-2 text-xs font-medium text-left text-gray-500 uppercase">Name</th>
                        <th class="px-4 py-2 text-xs font-medium text-left text-gray-500 uppercase">Slug</th>
                        <th class="px-4 py-2 text-xs font-medium text-left text-gray-500 uppercase">Description</th>
                        <th class="px-4 py-2 text-xs font-medium text-left text-gray-500 uppercase">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($modules as $module)
                        <tr>
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $module->name }}</td>
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $module->slug }}</td>
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $module->description }}</td>
                            <td class="px-4 py-2 space-x-2 text-sm text-gray-700">
                                <a href="{{ route('modules.show', $module->id) }}"
                                    class="text-blue-600 hover:underline">View</a>
                                <a href="{{ route('modules.edit', $module->id) }}"
                                    class="text-yellow-600 hover:underline">Edit</a>
                                <form action="{{ route('modules.destroy', $module->id) }}" method="POST" class="inline">
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
    <div id="importModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-30">
        <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-lg">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Import modules</h3>
                <button onclick="closeImportModal()" class="text-xl text-gray-500 hover:text-gray-700">&times;</button>
            </div>

            {{-- Import form partial --}}
            @include('modules.import')
        </div>
    </div>
@endsection

@push('scripts')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#modulesTable').DataTable();
        });

        function openImportModal() {
            document.getElementById('importModal').classList.remove('hidden');
        }

        function closeImportModal() {
            document.getElementById('importModal').classList.add('hidden');
        }
    </script>
@endpush