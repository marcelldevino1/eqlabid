@extends('dashboard')

@section('title', 'User Profiles')

@section('content')
<form method="POST" action="{{ route('user_profiles.store') }}">
    @csrf
    <div class="bg-white p-6 rounded-lg shadow-md">
<div class="bg-white p-6 rounded-lg shadow-md">
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <!-- Full Name -->
    <div>
        <label for="full_name" class="block text-sm font-medium text-gray-700">Full Name</label>
        <input type="text" name="full_name" id="full_name"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            value="{{ old('full_name', $userProfile->full_name ?? '') }}" required>
    </div>

    <!-- Email -->
    <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Additional Email</label>
        <input type="email" name="email" id="email"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            value="{{ old('email', $userProfile->email ?? '') }}">
    </div>

    <!-- National ID (NIK) -->
    <div>
        <label for="national_id" class="block text-sm font-medium text-gray-700">National ID (NIK)</label>
        <input type="text" name="national_id" id="national_id"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            value="{{ old('national_id', $userProfile->national_id ?? '') }}" required>
    </div>

    <!-- Family Card Number (KK) -->
    <div>
        <label for="family_card_number" class="block text-sm font-medium text-gray-700">Family Card Number (KK)</label>
        <input type="text" name="family_card_number" id="family_card_number"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            value="{{ old('family_card_number', $userProfile->family_card_number ?? '') }}">
    </div>

    <!-- Phone Number -->
    <div>
        <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
        <input type="text" name="phone_number" id="phone_number"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            value="{{ old('phone_number', $userProfile->phone_number ?? '') }}">
    </div>

    <!-- Birth Place -->
    <div>
        <label for="birth_place" class="block text-sm font-medium text-gray-700">Birth Place</label>
        <input type="text" name="birth_place" id="birth_place"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            value="{{ old('birth_place', $userProfile->birth_place ?? '') }}">
    </div>

    <!-- Birth Date -->
    <div>
        <label for="birth_date" class="block text-sm font-medium text-gray-700">Birth Date</label>
        <input type="date" name="birth_date" id="birth_date"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            value="{{ old('birth_date', $userProfile->birth_date ?? '') }}">
    </div>

    <!-- Gender -->
    <div>
        <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
        <select name="gender" id="gender"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            <option value="">-- Select --</option>
            <option value="male" {{ old('gender', $userProfile->gender ?? '') == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ old('gender', $userProfile->gender ?? '') == 'female' ? 'selected' : '' }}>Female</option>
           
        </select>
    </div>

    <!-- Nationality -->
    <div>
        <label for="nationality" class="block text-sm font-medium text-gray-700">Nationality</label>
        <input type="text" name="nationality" id="nationality"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            value="{{ old('nationality', $userProfile->nationality ?? '') }}">
    </div>

    <!-- Address -->
    <div class="md:col-span-2">
        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
        <textarea name="address" id="address" rows="3"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('address', $userProfile->address ?? '') }}</textarea>
    </div>

    <!-- Regional Data -->
    @foreach(['province', 'city_district', 'sub_district', 'village'] as $field)
        <div>
            <label for="{{ $field }}" class="block text-sm font-medium text-gray-700">{{ ucwords(str_replace('_', ' ', $field)) }}</label>
            <input type="text" name="{{ $field }}" id="{{ $field }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                value="{{ old($field, $userProfile->$field ?? '') }}">
        </div>
    @endforeach

    <!-- RT / RW / Postal Code -->
    @foreach(['rt', 'rw', 'postal_code'] as $field)
        <div>
            <label for="{{ $field }}" class="block text-sm font-medium text-gray-700">{{ strtoupper($field) }}</label>
            <input type="text" name="{{ $field }}" id="{{ $field }}"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                value="{{ old($field, $userProfile->$field ?? '') }}">
        </div>
    @endforeach

    <!-- Father Name -->
    <div>
        <label for="father_name" class="block text-sm font-medium text-gray-700">Father's Name</label>
        <input type="text" name="father_name" id="father_name"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            value="{{ old('father_name', $userProfile->father_name ?? '') }}">
    </div>

    <!-- Mother Name -->
    <div>
        <label for="mother_name" class="block text-sm font-medium text-gray-700">Mother's Name</label>
        <input type="text" name="mother_name" id="mother_name"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            value="{{ old('mother_name', $userProfile->mother_name ?? '') }}">
    </div>

    <!-- Siblings Count -->
    <div>
        <label for="siblings_count" class="block text-sm font-medium text-gray-700">Siblings Count</label>
        <input type="number" name="siblings_count" id="siblings_count"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            value="{{ old('siblings_count', $userProfile->siblings_count ?? '') }}">
    </div>

    <!-- Child Number -->
    <div>
        <label for="child_number" class="block text-sm font-medium text-gray-700">Child Number</label>
        <input type="number" name="child_number" id="child_number"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            value="{{ old('child_number', $userProfile->child_number ?? '') }}">
    </div>

    <!-- Bio -->
    <div class="md:col-span-2">
        <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
        <textarea name="bio" id="bio" rows="3"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('bio', $userProfile->bio ?? '') }}</textarea>
    </div>
</div>

<div class="mt-8">
    <button type="submit"
        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition">
        Simpan
    </button>
    <a href="{{ route('user_profiles.index') }}"
        class="inline-flex items-center px-4 py-2 bg-gray-300 text-gray-800 font-semibold rounded-md hover:bg-gray-400 transition">
        Kembali
    </a>
</div>

</div>
    </div>
</form>
@endsection