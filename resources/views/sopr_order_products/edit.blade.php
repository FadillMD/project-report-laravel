<!-- resources/views/sopr_order_products/edit.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Edit SOPR Order Product</title>
</head>
<body>

    <h1>Edit SOPR Order Product</h1>

    <!-- SOPR Order Product Input Form -->
    <form method="POST" action="{{ route('sopr_order_products.update', $soprOrderProduct->id) }}">
        @csrf
        @method('PUT')
        <label for="no_sopr">No SOPR:</label>
        <select name="no_sopr" required>
            @foreach($soprs as $sopr)
                <option value="{{ $sopr->no_sopr }}" {{ $sopr->no_sopr === $soprOrderProduct->no_sopr ? 'selected' : '' }}>
                    {{ $sopr->no_sopr }}
                </option>
            @endforeach
        </select><br>

        <label for="no_pd">No PD:</label>
        <select name="no_pd" required>
            @foreach($productDeterminations as $productDetermination)
                <option value="{{ $productDetermination->no_pd }}" {{ $productDetermination->no_pd === $soprOrderProduct->no_pd ? 'selected' : '' }}>
                    {{ $productDetermination->no_pd }}
                </option>
            @endforeach
        </select><br>

        <label for="qty_order">Qty Order:</label>
        <input type="number" name="qty_order" value="{{ $soprOrderProduct->qty_order }}" required><br>

        <label for="delivery_req">Delivery Req:</label>
        <input type="date" name="delivery_req" value="{{ $soprOrderProduct->delivery_req }}" required><br>

        <label for="notes">Notes:</label>
        <textarea name="notes">{{ $soprOrderProduct->notes }}</textarea><br>

        <button type="submit">Update SOPR Order Product</button>
    </form>

    <!-- Link back to SOPR Order Products index -->
    <a href="{{ route('sopr_order_products.index') }}">Back to SOPR Order Products</a>

</body>
</html>
