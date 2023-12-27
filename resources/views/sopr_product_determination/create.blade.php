<!-- resources/views/sopr_product_determination/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Create SOPR Product Determination</title>
</head>
<body>

    <h1>Create SOPR Product Determination</h1>

    <form method="POST" action="{{ route('sopr_product_determination.store') }}">
        @csrf

        <!-- Select SOPR -->
        <label for="sopr_id">Select SOPR:</label>
        <select name="sopr_id">
            @foreach ($soprs as $sopr)
                <option value="{{ $sopr->id }}">{{ $sopr->no_sopr }}</option>
            @endforeach
        </select><br>

        <!-- Select Product Determination -->
        <label for="product_determination_id">Select Product Determination:</label>
        <select name="product_determination_id" id="product_determination_id">
            @foreach ($productDeterminations as $productDetermination)
                <option value="{{ $productDetermination->id }}">{{ $productDetermination->no_pd }}</option>
            @endforeach
        </select><br>

        <!-- Type (Automatically Filled) -->
        <label for="type">Type (Automatically Filled):</label>
        <input type="text" name="type" id="type" readonly><br>

        <!-- Other Fields -->
        <label for="code_number">Code Number:</label>
        <input type="text" name="code_number"><br>

        <label for="qty_order">Qty Order:</label>
        <input type="number" name="qty_order"><br>

        <label for="delivery_req">Delivery Requirement:</label>
        <input type="date" name="delivery_req"><br>

        <label for="notes">Notes:</label>
        <textarea name="notes"></textarea><br>

        <button type="submit">Create SOPR Product Determination</button>
    </form>

    <script>
        // Add an event listener to the product_determination_id dropdown
        document.getElementById('product_determination_id').addEventListener('change', function () {
            // Get the selected option
            var selectedOption = this.options[this.selectedIndex];
            
            // Update the 'type' textbox with the 'type' attribute of the selected option
            document.getElementById('type').value = selectedOption.getAttribute('data-type');
        });
    </script>

</body>
</html>
