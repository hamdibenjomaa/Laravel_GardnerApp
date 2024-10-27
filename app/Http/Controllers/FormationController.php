<?php
namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function index()
    {
        $formations = Formation::all();
        return view('formations.index', compact('formations'));
    }

    public function create()
    {
        return view('formations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048', // Adjust the validation as needed
            'starting_date' => 'required|date',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Formation::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath ?? null,
            'starting_date' => $request->starting_date,
        ]);

        return redirect()->route('formations.index')->with('success', 'Formation created successfully.');
    }

    public function show(Formation $formation)
    {
        return view('formations.show', compact('formation'));
    }

    public function edit(Formation $formation)
    {
        return view('formations.edit', compact('formation'));
    }

    public function update(Request $request, Formation $formation)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'starting_date' => 'required|date',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $formation->image = $imagePath; // Update image path
        }

        $formation->update($request->only(['name', 'description', 'starting_date']));

        return redirect()->route('formations.index')->with('success', 'Formation updated successfully.');
    }

    public function destroy(Formation $formation)
    {
        $formation->delete();
        return redirect()->route('formations.index')->with('success', 'Formation deleted successfully.');
    }
    public function frontofficeIndex()
    {
        $formations = Formation::all(); // Get all formations
        return view('frontOffice.formations.index', compact('formations'));
    }
    
// app/Http/Controllers/FormationController.php

public function showformation($id)
{
    $formation = Formation::findOrFail($id); // Retrieve the formation or throw a 404 error
    return view('frontOffice.formations.formation', compact('formation'));
}


}
