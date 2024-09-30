<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use App\Models\Formation; // Make sure to import the Formation model
use Illuminate\Http\Request;
use App\Mail\InscriptionAccepted;
use Illuminate\Support\Facades\Mail;

class InscriptionController extends Controller
{
    // Method to display the inscription form with formations
    public function create()
    {
        $formations = Formation::all(); // Get all formations
        return view('frontOffice.formations.inscription', compact('formations')); // Pass formations to the view
    }

    // Method to handle the form submission
    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'formation_id' => 'required|exists:formations,id', // Validate that the formation_id exists
        ]);

        // Store the inscription logic here
        Inscription::create([
            'numero' => $request->numero,
            'email' => $request->email,
            'formation_id' => $request->formation_id, // Include the formation_id
        ]);

        return redirect()->route('forms')->with('success', 'Inscription successful!');
    }
      // Method to retrieve all inscriptions
      public function index()
      {
          $inscriptions = Inscription::with('formation')->get(); // Retrieve all inscriptions with their related formations
          return view('backOffice.inscriptions.index', compact('inscriptions')); // Adjust this to your view path
      }
   
public function destroy($id)
{
    // Find the inscription by ID or fail with a 404 error
    $inscription = Inscription::findOrFail($id);
    
    // Delete the inscription
    $inscription->delete();
    
    // Redirect back to the inscriptions index with a success message
    return redirect()->route('inscriptions.index')->with('success', 'Inscription deleted successfully.');
}


public function accept($id)
{
    // Fetch the inscription from the database
    $inscription = Inscription::findOrFail($id);
    
    // Ensure the formation relationship is loaded
    $inscription->load('formation');

    // Check if the formation exists
    if (!$inscription->formation) {
        return redirect()->route('inscriptions.index')->with('error', 'No associated formation found.');
    }

    // Send the acceptance email
    Mail::to($inscription->email)->send(new InscriptionAccepted($inscription));

    return redirect()->route('inscriptions.index')->with('success', 'Inscription accepted successfully and email sent.');
}



}

