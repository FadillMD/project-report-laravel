<?php

namespace App\Http\Controllers;

use App\Models\ProductDetermination;
use Illuminate\Http\Request;

class ProductDeterminationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all product determinations from the database
        $productDeterminations = ProductDetermination::all();

        return view('product_determinations.index', compact('productDeterminations'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product_determinations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validate the incoming request data
         $validatedData = $request->validate([
            'no_pd' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'cable_marking' => 'required|string|max:255',
        ]);

        // Create a new product determination record
        ProductDetermination::create($validatedData);

        // Redirect to the product determinations index page with a success message
        return redirect()->route('product_determinations.index')->with('success', 'Product Determination created successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Retrieve the Product Determination with associated SOPRs
        $productDetermination = ProductDetermination::with('soprs')->findOrFail($id);

        return view('product_determinations.show', compact('productDetermination'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Retrieve the Product Determination for editing
        $productDetermination = ProductDetermination::findOrFail($id);

        return view('product_determinations.edit', compact('productDetermination'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'no_pd' => 'required|unique:product_determinations,no_pd,' . $id,
            'type' => 'required|string|max:255',
            'cable_marking' => 'required|string|max:255',
        ]);

        // Update the Product Determination record
        $productDetermination = ProductDetermination::findOrFail($id);
        $productDetermination->update($validatedData);

        // Redirect to the Product Determinations index page with a success message
        return redirect()->route('product_determinations.index')->with('success', 'Product Determination updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Delete the Product Determination record
        $productDetermination = ProductDetermination::findOrFail($id);
        $productDetermination->delete();

        // Redirect to the Product Determinations index page with a success message
        return redirect()->route('product_determinations.index')->with('success', 'Product Determination deleted successfully!');

    }
}
