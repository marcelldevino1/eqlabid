@extends('dashboard')

@section('title', 'Method Actions')

@section('content')
<div class="p-6 bg-white rounded-lg shadow-md">

    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Method Actions</h2>
        <div class="relative flex space-x-2">
            <a href="{{ route('method-actions.create') }}" class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700">Add</a>
            <button id="exportBtn" class="px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-700">Export</button>
            <div id="exportDropdown" class="absolute right-0 z-50 hidden w-32 mt-1 bg-white border rounded shadow top-full">
                <a href="{{ route('method-actions.export','pdf') }}" class="block px-4 py-2 hover:bg-gray-100">PDF</a>
                <a href="{{ route('method-actions.export','excel') }}" class="block px-4 py-2 hover:bg-gray-100">Excel</a>
                <a href="{{ route('method-actions.export','doc') }}" class="block px-4 py-2 hover:bg-gray-100">Word</a>
            </div>
            <a href="{{ route('method-actions.import-view') }}" class="px-4 py-2 text-white bg-yellow-500 rounded-md hover:bg-yellow-600">Import</a>
            <a href="{{ route('method-actions.print') }}" target="_blank" class="px-4 py-2 text-white bg-gray-600 rounded-md hover:bg-gray-700">Print</a>
        </div>
    </div>

    <table id="methodActionsTable" class="min-w-full text-left border border-gray-300 divide-y divide-gray-200">
        <thead class="bg-gray-100">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Description</th>
                <th>Modules</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($methodActions as $index => $action)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $action->name }}</td>
                <td>{{ $action->slug }}</td>
                <td>{{ $action->description }}</td>
                <td>
                    @foreach($action->modules as $module)
                        <span class="inline-block px-2 py-1 mr-1 text-xs text-blue-800 bg-blue-200 rounded">{{ $module->name }}</span>
                    @endforeach
                </td>
                <td class="flex space-x-2">
                    <a href="{{ route('method-actions.edit', $action->id) }}" class="px-2 py-1 text-white bg-yellow-500 rounded hover:bg-yellow-600">Edit</a>
                    <form action="{{ route('method-actions.destroy', $action->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-2 py-1 text-white bg-red-500 rounded hover:bg-red-600">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#methodActionsTable').DataTable();

    // Export dropdown toggle
    $('#exportBtn').click(function(e){
        e.stopPropagation();
        $('#exportDropdown').toggle();
    });
    $(document).click(function(){
        $('#exportDropdown').hide();
    });
});
</script>
@endpush
