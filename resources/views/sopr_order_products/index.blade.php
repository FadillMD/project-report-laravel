<!-- resources/views/sopr_order_products/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>SOPR Order Products</title>
</head>
<body>

    <h1>SOPR Order Products</h1>

    <!-- Display SOPR Order Products -->
    <table border="1">
        <thead>
            <tr>
                <th>No SOPR</th>
                <th>No PD</th>
                <th>Qty Order</th>
                <th>Delivery Req</th>
                <th>Notes</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($soprOrderProducts as $soprOrderProduct)
                <tr>
                    <td>{{ $soprOrderProduct->sopr->no_sopr }}</td>
                    <td>{{ $soprOrderProduct->productDetermination->no_pd }}</td>
                    <td>{{ $soprOrderProduct->qty_order }}</td>
                    <td>{{ $soprOrderProduct->delivery_req }}</td>
                    <td>{{ $soprOrderProduct->notes }}</td>
                    <td>{{ $soprOrderProduct->created_at }}</td>
                    <td>{{ $soprOrderProduct->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Link to create new SOPR Order Product -->
    <a href="{{ route('sopr_order_products.create') }}">Create New SOPR Order Product</a>

</body>
</html>
