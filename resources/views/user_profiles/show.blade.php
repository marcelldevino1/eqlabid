@extends('dashboard')

@section('title', 'Detail User Profile')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">User Profile Details</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-700">
        <div><strong>Full Name:</strong> {{ $userProfile->full_name }}</div>
        <div><strong>Email:</strong> {{ $userProfile->email }}</div>
        <div><strong>National ID (NIK):</strong> {{ $userProfile->national_id }}</div>
        <div><strong>Family Card Number (KK):</strong> {{ $userProfile->family_card_number }}</div>
        <div><strong>Phone Number:</strong> {{ $userProfile->phone_number }}</div>
        <div><strong>Birth Place:</strong> {{ $userProfile->birth_place }}</div>
        <div><strong>Birth Date:</strong> {{ $userProfile->birth_date }}</div>
        <div><strong>Gender:</strong> {{ ucfirst($userProfile->gender) }}</div>
        <div><strong>Nationality:</strong> {{ $userProfile->nationality }}</div>
        <div class="md:col-span-2"><strong>Address:</strong> {{ $userProfile->address }}</div>

        <div><strong>Province:</strong> {{ $userProfile->province }}</div>
        <div><strong>City/District:</strong> {{ $userProfile->city_district }}</div>
        <div><strong>Sub District:</strong> {{ $userProfile->sub_district }}</div>
        <div><strong>Village:</strong> {{ $userProfile->village }}</div>
        <div><strong>RT:</strong> {{ $userProfile->rt }}</div>
        <div><strong>RW:</strong> {{ $userProfile->rw }}</div>
        <div><strong>Postal Code:</strong> {{ $userProfile->postal_code }}</div>

        <div><strong>Father's Name:</strong> {{ $userProfile->father_name }}</div>
        <div><strong>Mother's Name:</strong> {{ $userProfile->mother_name }}</div>
        <div><strong>Siblings Count:</strong> {{ $userProfile->siblings_count }}</div>
        <div><strong>Child Number:</strong> {{ $userProfile->child_number }}</div>

        <div class="md:col-span-2"><strong>Bio:</strong><br>{{ $userProfile->bio }}</div>
    </div>

    <div class="mt-6 flex gap-2">
        <a href="{{ route('user_profiles.edit', $userProfile->id) }}"
           class="inline-block px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition">
            Edit
        </a>
        <a href="{{ route('user_profiles.index') }}"
           class="inline-block px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 transition">
            Kembali
        </a>
    </div>
</div>
@endsection
