<?php

namespace App\Http\Controllers;

use App\Models\Sopr;
use Illuminate\Http\Request;

class SoprController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all SOPR records from the database
        $soprs = Sopr::all();

        return view('sopr.index', compact('soprs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sopr.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'no_sopr' => 'required|string|max:255',
            'customer' => 'required|string|max:255',
            'no_po' => 'required|string|max:255',
        ]);

        // Create a new SOPR record
        Sopr::create($validatedData);

        // Redirect to the SOPR index page with a success message
        return redirect()->route('sopr.index')->with('success', 'SOPR record created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Retrieve the SOPR with associated Product Determinations
        $sopr = Sopr::with('productDeterminations')->findOrFail($id);

        return view('sopr.show', compact('sopr'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Retrieve the SOPR for editing
        $sopr = Sopr::findOrFail($id);

        return view('sopr.edit', compact('sopr'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // Validate the incoming request data
        $validatedData = $request->validate([
            'no_sopr' => 'required|string|max:255',
            'customer' => 'required|string|max:255',
            'no_po' => 'required|string|max:255',
        ]);

        // Update the SOPR record
        $sopr = Sopr::findOrFail($id);
        $sopr->update($validatedData);

        // Redirect to the SOPRs index page with a success message
        return redirect()->route('sopr.index')->with('success', 'SOPR updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Delete the SOPR record
        $sopr = Sopr::findOrFail($id);
        $sopr->delete();

        // Redirect to the SOPRs index page with a success message
        return redirect()->route('sopr.index')->with('success', 'SOPR deleted successfully!');

    }
}
