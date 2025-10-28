@extends('dashboard')
@section('title', 'Edit Role')
@section('content')
<div class="bg-white p-6 rounded-lg shadow-md max-w-lg mx-auto">
<h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Role</h2>


<form action="{{ route('roles.update', $role) }}" method="POST">
@csrf
@method('PUT')
<div class="mb-4">
<label for="name" class="block text-sm font-medium text-gray-700">Name</label>
<input type="text" name="name" id="name" value="{{ old('name', $role->name ?? '') }}"
class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring focus:ring-blue-200" required>
</div>
<div class="mb-4">
<label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
<input type="text" name="slug" id="slug" value="{{ old('slug', $role->slug ?? '') }}"
class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring focus:ring-blue-200" required>
</div>
<div class="mb-4">
<label for="description" class="block text-sm font-medium text-gray-700">Description</label>
<textarea name="description" id="description" rows="3"
class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:ring focus:ring-blue-200">{{ old('description', $role->description ?? '') }}</textarea>
</div>

<div class="mt-6">
<button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
<a href="{{ route('roles.index') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">Back</a>
</div>
</form>
</div>
@endsection