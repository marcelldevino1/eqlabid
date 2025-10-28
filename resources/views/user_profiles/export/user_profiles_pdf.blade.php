<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #999; padding: 8px; text-align: left; }
        th { background: #f0f0f0; }
    </style>
</head>
<body>
    <h2>User Profiles Export</h2>
    <p>Date: {{ now()->format('d M Y') }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>NIK</th>
                <th>Birth</th>
                <th>Phone</th>
                <th>Gender</th>
            </tr>
        </thead>
        <tbody>
            @foreach($profiles as $i => $p)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $p->full_name }}</td>
                <td>{{ $p->email }}</td>
                <td>{{ $p->national_id }}</td>
                <td>{{ $p->birth_place }}, {{ $p->birth_date }}</td>
                <td>{{ $p->phone_number }}</td>
                <td>{{ ucfirst($p->gender) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
