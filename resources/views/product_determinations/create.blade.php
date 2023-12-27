<!-- resources/views/product_determinations/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Create Product Determination</title>
</head>
<body>

    <h1>Create Product Determination</h1>

    <!-- Product Determination Input Form -->
    <form method="POST" action="{{ route('product-determinations.store') }}">
        @csrf
        <label for="no_pd">No PD:</label>
        <input type="text" name="no_pd" required><br>

        <label for="type">Type:</label>
        <input type="text" name="type" required><br>

        <label for="cable_marking">Cable Marking:</label>
        <input type="text" name="cable_marking" required><br>

        <button type="submit">Create Product Determination</button>
    </form>

</body>
</html>

