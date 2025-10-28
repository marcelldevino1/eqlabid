@extends('dashboard')

@section('title', 'View Module')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Module Details</h2>
        <a href="{{ route('modules.index') }}"
           class="inline-flex items-center px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 transition">
            ← Back to List
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm text-gray-700">
        <!-- Name -->
        <div>
            <span class="font-semibold">Name:</span>
            <div class="mt-1 text-gray-900">{{ $module->name }}</div>
        </div>

        <!-- Slug -->
        <div>
            <span class="font-semibold">Slug:</span>
            <div class="mt-1 text-gray-900">{{ $module->slug }}</div>
        </div>

        <!-- Description -->
        <div class="md:col-span-2">
            <span class="font-semibold">Description:</span>
            <div class="mt-1 text-gray-900">{{ $module->description ?? '-' }}</div>
        </div>

        <!-- Created At -->
        <div>
            <span class="font-semibold">Created At:</span>
            <div class="mt-1 text-gray-900">{{ $module->created_at->format('d M Y, H:i') }}</div>
        </div>

        <!-- Updated At -->
        <div>
            <span class="font-semibold">Updated At:</span>
            <div class="mt-1 text-gray-900">{{ $module->updated_at->format('d M Y, H:i') }}</div>
        </div>
    </div>

    <div class="mt-6 flex justify-end space-x-2">
        <a href="{{ route('modules.edit', $module->id) }}"
           class="inline-flex items-center px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">Edit</a>
        <form action="{{ route('modules.destroy', $module->id) }}" method="POST"
              onsubmit="return confirm('Are you sure?')">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                Delete
            </button>
        </form>
    </div>
</div>
@endsection
