@extends('dashboard')

@section('title', 'Edit Module Permissions')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Module Permissions for Role: <span class="text-blue-600">{{ $role->name }}</span></h2>

    @if ($errors->any())
        <div class="mb-4 text-red-700 bg-red-100 border border-red-200 px-4 py-2 rounded">
            <ul class="list-disc pl-5 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('module-permissions.store') }}" method="POST">
        @csrf

        <input type="hidden" name="role_id" value="{{ $role->id }}">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            @foreach($modules as $module)
                <div class="border border-gray-300 rounded p-4">
                    <h3 class="text-md font-semibold text-gray-700 mb-2">{{ $module->name }}</h3>
                    <div class="space-y-2">
                        @foreach($methodActions as $action)
                            <div class="flex items-center space-x-2">
                                <input type="checkbox"
                                       name="permissions[{{ $module->id }}][]"
                                       value="{{ $action->id }}"
                                       id="module_{{ $module->id }}_action_{{ $action->id }}"
                                       class="text-blue-600 rounded"
                                       {{ isset($selected[$module->id]) && in_array($action->id, $selected[$module->id]) ? 'checked' : '' }}>
                                <label for="module_{{ $module->id }}_action_{{ $action->id }}" class="text-sm text-gray-700">
                                    {{ $action->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('module-permissions.index') }}"
               class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Cancel</a>
            <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update Permissions</button>
        </div>
    </form>
</div>
@endsection
