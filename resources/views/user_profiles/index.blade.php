@extends('dashboard')

@section('title', 'User Profiles')

@section('content')
<div class="p-6 bg-white rounded-lg shadow-md">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-800">User Profiles</h2>
        <div class="space-x-2">
            <a href="{{ route('user_profiles.create') }}"
               class="inline-flex items-center px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">Add New</a>

            {{-- Tombol Export --}}
            <button type="button" onclick="openExportModal()" 
                class="inline-flex items-center px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-700">
                Export
            </button>

            {{-- Tombol Import --}}
            <button type="button"
               class="inline-flex items-center px-4 py-2 text-white bg-yellow-500 rounded-md hover:bg-yellow-600"
               onclick="openImportModal()">Import</button>

            {{-- Tombol Print --}}
            <button onclick="window.print()"
               class="inline-flex items-center px-4 py-2 text-white bg-gray-700 rounded-md hover:bg-gray-800">Print</button>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table id="userProfilesTable" class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-xs font-medium text-left text-gray-500 uppercase">#</th>
                    <th class="px-4 py-2 text-xs font-medium text-left text-gray-500 uppercase">Full Name</th>
                    <th class="px-4 py-2 text-xs font-medium text-left text-gray-500 uppercase">Email</th>
                    <th class="px-4 py-2 text-xs font-medium text-left text-gray-500 uppercase">NIK</th>
                    <th class="px-4 py-2 text-xs font-medium text-left text-gray-500 uppercase">Birth</th>
                    <th class="px-4 py-2 text-xs font-medium text-left text-gray-500 uppercase">Phone</th>
                    <th class="px-4 py-2 text-xs font-medium text-left text-gray-500 uppercase">Gender</th>
                    <th class="px-4 py-2 text-xs font-medium text-left text-gray-500 uppercase">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($profiles as $profile)
                    <tr>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $profile->full_name }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $profile->email }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $profile->national_id }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $profile->birth_place }}, {{ $profile->birth_date }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $profile->phone_number }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ ucfirst($profile->gender) }}</td>
                        <td class="px-4 py-2 space-x-2 text-sm text-gray-700">
                            <a href="{{ route('user_profiles.show', $profile->id) }}"
                               class="text-blue-600 hover:underline">View</a>
                            <a href="{{ route('user_profiles.edit', $profile->id) }}"
                               class="text-yellow-600 hover:underline">Edit</a>
                            <form action="{{ route('user_profiles.destroy', $profile->id) }}" method="POST" class="inline">
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
            <h3 class="text-lg font-semibold text-gray-800">Import User Profile</h3>
            <button onclick="closeImportModal()" class="text-xl text-gray-500 hover:text-gray-700">&times;</button>
        </div>

        {{-- Include import form --}}
        @include('user_profiles.import')
    </div>
</div>

<!-- Export Modal -->
<div id="exportModal" class="fixed inset-0 z-50 items-center justify-center hidden bg-black bg-opacity-50">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-lg">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-700">Export Data</h3>
            <button onclick="closeExportModal()" class="text-xl text-gray-500 hover:text-gray-700">&times;</button>
        </div>

        <form id="exportForm">
            <div class="mb-4">
                <label for="start_date" class="block mb-1 text-sm text-gray-600">Start Date</label>
                <input type="date" id="start_date" name="start_date" 
                    class="w-full px-3 py-2 border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="end_date" class="block mb-1 text-sm text-gray-600">End Date</label>
                <input type="date" id="end_date" name="end_date" 
                    class="w-full px-3 py-2 border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="flex justify-between mt-6 space-x-2">
                <button type="button" onclick="submitExport('pdf')" 
                    class="flex-1 px-4 py-2 text-white bg-red-600 rounded-md hover:bg-red-700">
                    PDF
                </button>
                <button type="button" onclick="submitExport('excel')" 
                    class="flex-1 px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-700">
                    Excel
                </button>
                <button type="button" onclick="submitExport('word')" 
                    class="flex-1 px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">
                    Word
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#userProfilesTable').DataTable();
    });

    function openImportModal() {
        document.getElementById('importModal').classList.remove('hidden');
    }

    function closeImportModal() {
        document.getElementById('importModal').classList.add('hidden');
    }

    function openExportModal() {
        document.getElementById('exportModal').classList.remove('hidden');
        document.getElementById('exportModal').classList.add('flex');
    }

    function closeExportModal() {
        document.getElementById('exportModal').classList.remove('flex');
        document.getElementById('exportModal').classList.add('hidden');
    }

    function submitExport(format) {
        const startDate = document.getElementById('start_date').value;
        const endDate = document.getElementById('end_date').value;

        if (!startDate || !endDate) {
            alert('Please select start and end date!');
            return;
        }

        // URL export sesuai format yang Anda buat di routes/controller
        const url = `{{ url('user-profiles/export') }}/${format}?start_date=${startDate}&end_date=${endDate}`;
        window.open(url, '_blank');
    }
</script>
@endpush
