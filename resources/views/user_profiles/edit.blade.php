@extends('dashboard')

@section('title', 'Edit User Profile')

@section('content')
<form method="POST" action="{{ route('user_profiles.update', $userProfile->id) }}">
    @csrf
    @method('PUT')

    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Edit User Profile</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Full Name -->
            <div>
                <label for="full_name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" name="full_name" id="full_name" value="{{ old('full_name', $userProfile->full_name) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Additional Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $userProfile->email) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <!-- National ID -->
            <div>
                <label for="national_id" class="block text-sm font-medium text-gray-700">National ID (NIK)</label>
                <input type="text" name="national_id" id="national_id" value="{{ old('national_id', $userProfile->national_id) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
            </div>

            <!-- Family Card Number -->
            <div>
                <label for="family_card_number" class="block text-sm font-medium text-gray-700">Family Card Number (KK)</label>
                <input type="text" name="family_card_number" id="family_card_number" value="{{ old('family_card_number', $userProfile->family_card_number) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <!-- Phone -->
            <div>
                <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                <input type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $userProfile->phone_number) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <!-- Birth Place -->
            <div>
                <label for="birth_place" class="block text-sm font-medium text-gray-700">Birth Place</label>
                <input type="text" name="birth_place" id="birth_place" value="{{ old('birth_place', $userProfile->birth_place) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <!-- Birth Date -->
            <div>
                <label for="birth_date" class="block text-sm font-medium text-gray-700">Birth Date</label>
                <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date', $userProfile->birth_date) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <!-- Gender -->
            <div>
                <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                <select name="gender" id="gender"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="">-- Select --</option>
                    <option value="male" {{ old('gender', $userProfile->gender) == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender', $userProfile->gender) == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender', $userProfile->gender) == 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            <!-- Nationality -->
            <div>
                <label for="nationality" class="block text-sm font-medium text-gray-700">Nationality</label>
                <input type="text" name="nationality" id="nationality" value="{{ old('nationality', $userProfile->nationality) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <!-- Address -->
            <div class="md:col-span-2">
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <textarea name="address" id="address" rows="3"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('address', $userProfile->address) }}</textarea>
            </div>

            <!-- Regional Fields -->
            @foreach(['province', 'city_district', 'sub_district', 'village'] as $field)
                <div>
                    <label for="{{ $field }}" class="block text-sm font-medium text-gray-700">{{ ucwords(str_replace('_', ' ', $field)) }}</label>
                    <input type="text" name="{{ $field }}" id="{{ $field }}" value="{{ old($field, $userProfile->$field) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
            @endforeach

            <!-- RT/RW/Postal -->
            @foreach(['rt', 'rw', 'postal_code'] as $field)
                <div>
                    <label for="{{ $field }}" class="block text-sm font-medium text-gray-700">{{ strtoupper($field) }}</label>
                    <input type="text" name="{{ $field }}" id="{{ $field }}" value="{{ old($field, $userProfile->$field) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
            @endforeach

            <!-- Parents -->
            <div>
                <label for="father_name" class="block text-sm font-medium text-gray-700">Father's Name</label>
                <input type="text" name="father_name" id="father_name" value="{{ old('father_name', $userProfile->father_name) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label for="mother_name" class="block text-sm font-medium text-gray-700">Mother's Name</label>
                <input type="text" name="mother_name" id="mother_name" value="{{ old('mother_name', $userProfile->mother_name) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <!-- Sibling & Child -->
            <div>
                <label for="siblings_count" class="block text-sm font-medium text-gray-700">Siblings Count</label>
                <input type="number" name="siblings_count" id="siblings_count" value="{{ old('siblings_count', $userProfile->siblings_count) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label for="child_number" class="block text-sm font-medium text-gray-700">Child Number</label>
                <input type="number" name="child_number" id="child_number" value="{{ old('child_number', $userProfile->child_number) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>

            <!-- Bio -->
            <div class="md:col-span-2">
                <label for="bio" class="block text-sm font-medium text-gray-700">Bio</label>
                <textarea name="bio" id="bio" rows="3"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('bio', $userProfile->bio) }}</textarea>
            </div>
        </div>

        <div class="mt-6 flex gap-3">
            <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition">
                Update
            </button>
            <a href="{{ route('user_profiles.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-300 text-gray-800 font-semibold rounded-md hover:bg-gray-400 transition">
                Kembali
            </a>
        </div>
    </div>
</form>
@endsection
