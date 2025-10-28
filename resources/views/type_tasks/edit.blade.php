@extends('dashboard')

@section('title', 'Edit Type Task')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Edit Type Task</h2>

    <form action="{{ route('type-tasks.update', $typeTask->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <!-- Teaching Assignment -->
            <div>
                <label class="block text-sm font-medium">Teaching Assignment</label>
                <select name="id_ta" class="mt-1 block w-full border-gray-300 rounded-md" required>
                    <option value="">-- Pilih TA --</option>
                    @foreach($teachingAssignments as $ta)
                        <option value="{{ $ta->id }}" {{ $typeTask->id_ta == $ta->id ? 'selected' : '' }}>
                            {{ $ta->user->name ?? '-' }} - {{ $ta->mapel->name ?? '-' }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-medium">Description</label>
                <input type="text" name="description" value="{{ old('description', $typeTask->description) }}"
                       class="mt-1 block w-full border-gray-300 rounded-md" required>
            </div>

            <!-- Type Task -->
            <div>
                <label class="block text-sm font-medium">Type Task</label>
                @php
                    $typeOptions = [
                        '' => '-- Pilih --',
                        1 => 'Tugas Harian',
                        2 => 'Ulangan',
                        3 => 'UTS',
                        4 => 'UAS'
                    ];
                @endphp
                <select name="type_task" class="mt-1 block w-full border-gray-300 rounded-md" required>
                    @foreach($typeOptions as $value => $label)
                        <option value="{{ $value }}" {{ old('type_task', $typeTask->type_task) == $value ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Start Date -->
            <div>
                <label class="block text-sm font-medium">Start Date</label>
                <input type="date" name="start_date" value="{{ old('start_date', $typeTask->start_date) }}"
                       class="mt-1 block w-full border-gray-300 rounded-md" required>
            </div>

            <!-- End Date -->
            <div>
                <label class="block text-sm font-medium">End Date</label>
                <input type="date" name="end_date" value="{{ old('end_date', $typeTask->end_date) }}"
                       class="mt-1 block w-full border-gray-300 rounded-md" required>
            </div>
        </div>

        <!-- Tombol -->
        <div class="flex space-x-2 mt-4">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Update</button>
            <a href="{{ route('type-tasks.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Batal</a>
        </div>
    </form>
</div>
@endsection
