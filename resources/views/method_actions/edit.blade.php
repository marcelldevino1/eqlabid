@extends('dashboard')

@section('title', 'Edit Method Action')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md max-w-2xl mx-auto">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Method Action</h2>

    <form action="{{ route('method-actions.update', $methodAction->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div class="mb-4">
            <label class="block text-sm font-medium">Name</label>
            <input type="text" name="name" class="mt-1 block w-full border-gray-300 rounded-md" value="{{ $methodAction->name }}" required>
        </div>

        <!-- Slug -->
        <div class="mb-4">
            <label class="block text-sm font-medium">Slug</label>
            <input type="text" name="slug" class="mt-1 block w-full border-gray-300 rounded-md" value="{{ $methodAction->slug }}" required>
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label class="block text-sm font-medium">Description</label>
            <textarea name="description" class="mt-1 block w-full border-gray-300 rounded-md" rows="3">{{ $methodAction->description }}</textarea>
        </div>

        <!-- Modules multi-select -->
        <div class="mb-4">
            <label class="block text-sm font-medium">Modules</label>
            <select name="modules[]" class="mt-1 block w-full border-gray-300 rounded-md select2" multiple="multiple" required>
                @foreach($modules as $module)
                    <option value="{{ $module->id }}" {{ in_array($module->id, $selectedModules) ? 'selected' : '' }}>
                        {{ $module->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex space-x-2">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Update</button>
            <a href="{{ route('method-actions.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Cancel</a>
        </div>
    </form>
</div>
@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.select2').select2({
        placeholder: "Select Modules",
        allowClear: true,
        width: '100%'
    });
});
</script>
@endpush
