@extends('dashboard')

@section('title', 'Create Method Action')

@push('styles')
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <style>
        /* Styling agar cocok dengan Tailwind */
        .select2-container--default .select2-selection--single {
            height: 2.5rem;
            padding: 0.375rem 0.75rem;
            border-radius: 0.5rem;
            border: 1px solid rgba(156,163,175,1);
            background-color: white;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 1.75rem;
            color: rgba(31,41,55,1);
        }
        .select2-container--default .select2-selection--multiple {
            min-height: 2.5rem;
            padding: 0.375rem 0.5rem;
            border-radius: 0.5rem;
            border: 1px solid rgba(156,163,175,1);
            background-color: white;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: rgba(99,102,241,0.1);
            border: 1px solid rgba(99,102,241,0.2);
            color: rgba(49,46,129,1);
            padding: 0.125rem 0.5rem;
            margin-top: 0.1875rem;
            margin-right: 0.25rem;
            border-radius: 0.375rem;
        }
        .select2-selection__arrow { display: none; }
        .select2-results__option { padding: 0.5rem 0.75rem; }
        .select2-wrapper { width: 100%; }
    </style>
@endpush

@section('content')
<div class="bg-white p-6 rounded-2xl shadow max-w-3xl mx-auto">
    <h1 class="text-2xl font-semibold mb-6 text-gray-800">Create Method Action</h1>

    {{-- Notifikasi Error --}}
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('method-actions.store') }}" method="POST" class="space-y-6">
        @csrf

        {{-- Name --}}
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}"
                class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-gray-800"
                placeholder="Masukkan nama..." required>
        </div>

        {{-- Slug --}}
        <div>
            <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">Slug</label>
            <input type="text" id="slug" name="slug" value="{{ old('slug') }}"
                class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-gray-800"
                placeholder="Masukkan slug..." required>
        </div>

        {{-- Description --}}
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
            <textarea id="description" name="description" rows="3"
                class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-gray-800"
                placeholder="Masukkan deskripsi...">{{ old('description') }}</textarea>
        </div>

        {{-- Modules (multiselect with tags) --}}
        <div>
            <label for="modules" class="block text-sm font-medium text-gray-700 mb-2">Modules</label>
            <div class="select2-wrapper">
                <select id="modules" name="modules[]" multiple class="select2-tags w-full">
                    @foreach($modules as $module)
                        <option value="{{ $module->id }}"
                            {{ in_array($module->id, old('modules', [])) ? 'selected' : '' }}>
                            {{ $module->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <p class="text-xs text-gray-500 mt-1">Bisa pilih lebih dari satu, atau tambah sendiri jika diperlukan.</p>
        </div>

        {{-- Submit --}}
        <div class="flex justify-end">
            <a href="{{ route('method-actions.index') }}"
               class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 mr-2">Cancel</a>
            <button type="submit"
                class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Save</button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#modules').select2({
        tags: true,
        tokenSeparators: [',', ' '],
        placeholder: 'Pilih atau tambahkan module...',
        width: '100%'
    });
});
</script>
@endpush

