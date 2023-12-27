<?php

namespace App\Http\Controllers;

use App\Models\ProductDetermination;
use App\Models\Sopr;
use App\Models\SoprOrderProduct;
use Illuminate\Http\Request;

class SoprOrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // Retrieve all SOPR order products from the database
       $soprOrderProducts = SoprOrderProduct::all();

       return view('sopr_order_products.index', compact('soprOrderProducts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retrieve SOPRs and Product Determinations for dropdowns
        $soprs = Sopr::all();
        $productDeterminations = ProductDetermination::all();

        return view('sopr_order_products.create', compact('soprs', 'productDeterminations'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'no_sopr' => 'required|exists:sopr,no_sopr',
            'no_pd' => 'required|exists:product_determinations,no_pd',
            'qty_order' => 'required|integer',
            'delivery_req' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        // Create a new SOPR order product record
        SoprOrderProduct::create($validatedData);

        // Redirect to the SOPR order products index page with a success message
        return redirect()->route('sopr_order_products.index')->with('success', 'SOPR Order Product created successfully!');

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
        // Retrieve the SOPR order product for editing
        $soprOrderProduct = SoprOrderProduct::findOrFail($id);

        // Retrieve SOPRs and Product Determinations for dropdowns
        $soprs = Sopr::all();
        $productDeterminations = ProductDetermination::all();

        return view('sopr_order_products.edit', compact('soprOrderProduct', 'soprs', 'productDeterminations'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'no_sopr' => 'required|exists:sopr,no_sopr',
            'no_pd' => 'required|exists:product_determinations,no_pd',
            'qty_order' => 'required|integer',
            'delivery_req' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        // Update the SOPR order product record
        $soprOrderProduct = SoprOrderProduct::findOrFail($id);
        $soprOrderProduct->update($validatedData);

        // Redirect to the SOPR order products index page with a success message
        return redirect()->route('sopr_order_products.index')->with('success', 'SOPR Order Product updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Delete the SOPR order product record
        $soprOrderProduct = SoprOrderProduct::findOrFail($id);
        $soprOrderProduct->delete();

        // Redirect to the SOPR order products index page with a success message
        return redirect()->route('sopr_order_products.index')->with('success', 'SOPR Order Product deleted successfully!');

    }
}
