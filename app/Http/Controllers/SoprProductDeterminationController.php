<?php

namespace App\Http\Controllers;

use App\Models\ProductDetermination;
use App\Models\Sopr;
use Illuminate\Http\Request;

class SoprProductDeterminationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $soprProductDetermination = Sopr::with('productDeterminations')->get();

        return view('sopr_product_determination.index', compact('soprProductDetermination'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $soprs = Sopr::all();
        $productDeterminations = ProductDetermination::all();

        return view('sopr_product_determination.create', compact('soprs', 'productDeterminations'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'sopr_id' => 'required|exists:soprs,id',
            'product_determination_id' => 'required|exists:product_determinations,id',
            'code_number' => 'required|string',
            'qty_order' => 'required|integer',
            'delivery_req' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        $sopr = Sopr::findOrFail($request->sopr_id);

        // Attach the Product Determination to the SOPR with pivot data
        $sopr->productDeterminations()->attach(
            $request->product_determination_id,
            [
                'code_number' => $request->code_number,
                'qty_order' => $request->qty_order,
                'delivery_req' => $request->delivery_req,
                'notes' => $request->notes,
            ]
        );

        return redirect()->route('sopr_product_determination.index')->with('success', 'SOPR Product Determination created successfully!');

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

    public function getType($id)
{
    $productDetermination = ProductDetermination::find($id);

    return response()->json(['type' => $productDetermination->type]);
}
}
