@extends('dashboard')

@section('title', 'User Access')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">

    @if (session('success'))
        <div class="mb-4 text-green-700 bg-green-100 border border-green-200 px-4 py-2 rounded text-center">
            {{ session('success') }}
        </div>
    @endif

    <table id="userAccessTable" class="min-w-full divide-y divide-gray-200 border border-gray-300 text-center">
        <thead class="bg-gray-100">
            <tr>
                <th>No</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Password</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->userProfile->full_name ?? '-' }}</td>
                    <td>
                        <form action="{{ route('user-access.update', $user->id) }}" method="POST" class="flex justify-center items-center space-x-2">
                            @csrf
                            @method('PUT')
                            <input type="text" name="username" value="{{ $user->username }}" class="border px-2 py-1 rounded">
                    </td>
                    <td>
                            <input type="password" name="password" placeholder="New Password" class="border px-2 py-1 rounded">
                    </td>
                    <td>{{ $user->role->name ?? '-' }}</td>
                    <td class="flex justify-center space-x-2">
                            <button type="submit" class="px-2 py-1 bg-green-600 text-white rounded hover:bg-green-700">Update</button>
                        </form>
                        <form action="{{ route('user-access.deactivate', $user->id) }}" method="POST" class="inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">Nonactive</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#userAccessTable').DataTable({
        "paging": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "lengthChange": true,
        "autoWidth": false
    });
});
</script>
@endpush
