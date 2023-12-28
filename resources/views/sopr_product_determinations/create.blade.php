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
            <option value="{{ $productDetermination->id }}" data-type="{{ $productDetermination->type }}">
                {{ $productDetermination->no_pd }}
            </option>
        @endforeach
    </select><br>

        <!-- Add a new div to display the "type" based on the selected "no_pd" -->
        <div id="productTypeContainer">
            Type: <span id="productType"></span>
        </div>
        {{-- <!-- Type (Automatically Filled) -->
        <label for="type">Type (Automatically Filled):</label>
        <input type="text" name="type" id="type" readonly><br> --}}

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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Use jQuery to handle the change event of the product_determination_id dropdown
        $(document).ready(function() {
            $('#product_determination_id').on('change', function() {
                // Get the selected option's data-type attribute
                var productType = $(this).find('option:selected').data('type');
    
                // Update the content of the #productType element
                $('#productType').text(productType);
            });
        });
    </script>

</body>
</html>
