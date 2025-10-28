@extends('dashboard')

@section('title', 'Create Module')

@section('content')
<form action="{{ route('modules.store') }}" method="POST">
    @csrf
    <div class="bg-white p-6 rounded-lg shadow-md space-y-4">
        <div>
            <label for="name">Name</label>
            <input name="name" class="w-full border rounded" required>
        </div>
        <div>
            <label for="slug">Slug</label>
            <input name="slug" class="w-full border rounded" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" class="w-full border rounded"></textarea>
        </div>
        <div class="mt-4">
            <button class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
        </div>
    </div>
</form>
@endsection
