<!-- resources/views/product_determinations/edit.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product Determination</title>
</head>
<body>

    <h1>Edit Product Determination</h1>

    <!-- Product Determination Input Form -->
    <form method="POST" action="{{ route('product_determinations.update', $productDetermination->id) }}">
        @csrf
        @method('PUT')

        <label for="no_pd">No PD:</label>
        <input type="text" name="no_pd" value="{{ $productDetermination->no_pd }}" required><br>

        <label for="type">Type:</label>
        <input type="text" name="type" value="{{ $productDetermination->type }}" required><br>

        <label for="cable_marking">Cable Marking:</label>
        <input type="text" name="cable_marking" value="{{ $productDetermination->cable_marking }}" required><br>

        <!-- Add other Product Determination fields as needed -->

        <button type="submit">Update Product Determination</button>
    </form>

    <!-- Link back to Product Determinations index -->
    <a href="{{ route('product_determinations.index') }}">Back to Product Determinations</a>

</body>
</html>
