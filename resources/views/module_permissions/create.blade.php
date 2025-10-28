@extends('dashboard')

@section('title', 'Create Module Permissions')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Assign Module Permissions</h2>

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

        <!-- Pilih Role -->
        <div class="mb-6">
            <label for="role_id" class="block text-sm font-medium text-gray-700">Select Role</label>
            <select name="role_id" id="role_id"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                required>
                <option value="">-- Choose Role --</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Tabel Modul dan Ceklis Aksi -->
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
                                       class="text-blue-600 rounded">
                                <label for="module_{{ $module->id }}_action_{{ $action->id }}" class="text-sm text-gray-700">
                                    {{ $action->name }} <span class="text-gray-400 text-xs">({{ $action->slug }})</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Tombol Submit -->
        <div class="flex justify-end space-x-2">
            <a href="{{ route('module-permissions.index') }}"
               class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Cancel</a>
            <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save Permissions</button>
        </div>
    </form>
</div>
@endsection
