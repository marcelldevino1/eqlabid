@extends('dashboard')

@section('title', 'Add Student to Class')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md max-w-lg mx-auto">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Add Student to Class</h2>

    <form action="{{ route('classes-students.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-sm font-medium">Student</label>
            <select name="user_id" class="mt-1 block w-full border-gray-300 rounded-md" required>
                <option value="">-- Select Student --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->full_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Class</label>
            <select name="classes_id" class="mt-1 block w-full border-gray-300 rounded-md" required>
                <option value="">-- Select Class --</option>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->nm_kelas }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Tahun</label>
            <select name="tahun_id" class="mt-1 block w-full border-gray-300 rounded-md" required>
                <option value="">-- Select Tahun --</option>
                @foreach($tahuns as $tahun)
                    <option value="{{ $tahun->id }}">{{ $tahun->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex space-x-2">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Save</button>
            <a href="{{ route('classes-students.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Cancel</a>
        </div>
    </form>
</div>
@endsection
