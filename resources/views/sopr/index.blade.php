<!-- resources/views/sopr/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>SOPR Records</title>
</head>
<body>

    <h1>SOPR Records</h1>

    <!-- Display SOPR records -->
    <table border="1">
        <thead>
            <tr>
                <th>No SOPR</th>
                <th>Customer</th>
                <th>No PO</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($soprs as $sopr)
                <tr>
                    <td>{{ $sopr->no_sopr }}</td>
                    <td>{{ $sopr->customer }}</td>
                    <td>{{ $sopr->no_po }}</td>
                    <td>{{ $sopr->created_at }}</td>
                    <td>{{ $sopr->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Link to create new SOPR -->
    <a href="{{ route('sopr.create') }}">Create New SOPR</a>

</body>
</html>
