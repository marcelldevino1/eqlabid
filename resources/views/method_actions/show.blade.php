@extends('dashboard')

@section('title', 'View Method Action')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-xl font-bold mb-4">Method Action Details</h2>

    <div class="mb-4">
        <strong class="block text-gray-600">Name:</strong>
        <p>{{ $methodAction->name }}</p>
    </div>

    <div class="mb-4">
        <strong class="block text-gray-600">Slug:</strong>
        <p>{{ $methodAction->slug }}</p>
    </div>

    <div class="mb-4">
        <strong class="block text-gray-600">Description:</strong>
        <p>{{ $methodAction->description ?? '-' }}</p>
    </div>

    <a href="{{ route('method-actions.index') }}"
       class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">Back</a>
</div>
@endsection
