<!-- resources/views/sopr_product_determination/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>SOPR Product Determination Index</title>
</head>
<body>

    <h1>SOPR Product Determination Index</h1>

    <table border="1">
        <thead>
            <tr>
                <th>No SOPR</th>
                <th>No PD</th>
                <th>Code Number</th>
                <th>Qty Order</th>
                <th>Delivery Req</th>
                <th>Notes</th>
                <!-- Add other columns as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach ($soprProductDeterminations as $entry)
                <tr>
                    <td>{{ $entry->soprs->no_sopr }}</td>
                    <td>{{ $entry->productDeterminations->no_pd }}</td>
                    <td>{{ $entry->code_number }}</td>
                    <td>{{ $entry->qty_order }}</td>
                    <td>{{ $entry->delivery_req }}</td>
                    <td>{{ $entry->notes }}</td>
                    <!-- Add other columns as needed -->
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
