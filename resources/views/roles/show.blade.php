@extends('dashboard')
@section('title', 'Role Detail')
@section('content')
<div class="bg-white p-6 rounded-lg shadow-md max-w-lg mx-auto">
<h2 class="text-2xl font-bold mb-6 text-gray-800">Role Details</h2>
<div class="mb-4">
<p><strong>Name:</strong> {{ $role->name }}</p>
<p><strong>Slug:</strong> {{ $role->slug }}</p>
<p><strong>Description:</strong> {{ $role->description }}</p>
</div>
<a href="{{ route('roles.index') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">Back</a>
</div>
@endsection