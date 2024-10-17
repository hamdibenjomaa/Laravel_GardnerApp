<?php

namespace App\Http\Controllers;

use App\Models\Reclamation;
use Illuminate\Http\Request;

class ReclamationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reclamations = Reclamation::all(); // Retrieve all reclamations
        return view('frontOffice.reclamations', compact('reclamations')); // Pass the reclamations to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontOffice.addReclamation'); // View for adding reclamation
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string', // Ensure description is not null
        ]);

        // Create a new reclamation
        $reclamation = new Reclamation();
        $reclamation->title = $request->input('title');
        $reclamation->description = $request->input('description');
        $reclamation->user_id = auth()->id(); // Assuming reclamation is tied to a user
        $reclamation->save();

        return redirect()->route('reclamations.index')->with('success', 'Reclamation added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $reclamation = Reclamation::findOrFail($id); // Find reclamation by ID
        return view('frontOffice.updateReclamation', compact('reclamation')); // Show edit form
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Find the reclamation by ID
        $reclamation = Reclamation::findOrFail($id);

        // Update the reclamation attributes
        $reclamation->title = $request->input('title');
        $reclamation->description = $request->input('description');
        $reclamation->save();

        return redirect()->route('reclamations.index')->with('success', 'Reclamation updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $reclamation = Reclamation::findOrFail($id); // Find reclamation by ID
        $reclamation->delete();
        return redirect()->route('reclamations.index')->with('success', 'Reclamation deleted successfully');
    }
}
