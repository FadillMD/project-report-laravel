<!-- resources/views/sopr/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Create SOPR Record</title>
</head>
<body>

    <h1>Create SOPR Record</h1>

    <!-- SOPR Input Form -->
    <form method="POST" action="{{ route('sopr.store') }}">
        @csrf
        <label for="no_sopr">No SOPR:</label>
        <input type="text" name="no_sopr" required><br>

        <label for="customer">Customer:</label>
        <input type="text" name="customer" required><br>

        <label for="no_po">No PO:</label>
        <input type="text" name="no_po" required><br>

        <button type="submit">Create SOPR</button>
    </form>

</body>
</html>
