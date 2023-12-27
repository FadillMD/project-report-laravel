<!-- resources/views/product_determinations/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Product Determinations</title>
</head>
<body>

    <h1>Product Determinations</h1>

    <!-- Display Product Determinations -->
    <table border="1">
        <thead>
            <tr>
                <th>No PD</th>
                <th>Type</th>
                <th>Cable Marking</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productDeterminations as $productDetermination)
                <tr>
                    <td>{{ $productDetermination->no_pd }}</td>
                    <td>{{ $productDetermination->type }}</td>
                    <td>{{ $productDetermination->cable_marking }}</td>
                    <td>{{ $productDetermination->created_at }}</td>
                    <td>{{ $productDetermination->updated_at }}</td>
                    <td>
                        <a href="{{ route('product_determinations.edit', $productDetermination->id) }}">Edit</a>
                        |
                        <form method="POST" action="{{ route('product_determinations.destroy', $productDetermination->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Link to create new Product Determination -->
    <a href="{{ route('product_determinations.create') }}">Create New Product Determination</a>

</body>
</html>
