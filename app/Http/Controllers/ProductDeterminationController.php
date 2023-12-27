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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
