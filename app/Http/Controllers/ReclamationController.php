<?php

namespace App\Http\Controllers;

use App\Models\Reclamation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReclamationController extends Controller
{
    

    public function index()
    {
        $userId = Auth::id();

        // Retrieve reclamations for the authenticated user
        $reclamations = Reclamation::where('user_id', Auth::id())->get();
        return view('frontOffice.reclamations', compact('reclamations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontOffice.addReclamation');
    }

  
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        $userId = Auth::id();

        // Create a new reclamation and associate it with the authenticated user
        $reclamation = new Reclamation();
        $reclamation->title = $request->input('title');
        $reclamation->description = $request->input('description');
        $reclamation->user_id =$userId; // Set user_id to the authenticated user
        $reclamation->save();

        return redirect()->route('reclamations.index')->with('success', 'Reclamation added successfully!');
    }

  
    public function edit($id)
    {
        // Find reclamation by ID and check if it belongs to the authenticated user
        $reclamation = Reclamation::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('frontOffice.updateReclamation', compact('reclamation')); // Show edit form
    }

 
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Find the reclamation by ID and check if it belongs to the authenticated user
        $reclamation = Reclamation::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        // Update the reclamation attributes
        $reclamation->title = $request->input('title');
        $reclamation->description = $request->input('description');
        $reclamation->save();

        return redirect()->route('reclamations.index')->with('success', 'Reclamation updated successfully');
    }

   
    public function destroy($id)
    {
        // Find the reclamation by ID and check if it belongs to the authenticated user
        $reclamation = Reclamation::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $reclamation->delete();
        return redirect()->route('reclamations.index')->with('success', 'Reclamation deleted successfully');
    }

    public function addResponse($id)
    {
        $reclamation = Reclamation::findOrFail($id);
        return view('backOffice.reclamations.addResponse', compact('reclamation')); // Show response form
    }
    public function storeResponse(Request $request, $id)
    {
        $request->validate([
            'response' => 'required|string',
        ]);

        $reclamation = Reclamation::findOrFail($id);
        $response = new Response();
        $response->reclamation_id = $reclamation->id;
        $response->content = $request->input('response');
        $response->save();

        return redirect()->route('backOffice.reclamations.index')->with('success', 'Response added successfully!');
    }
    public function editResponse($id)
    {
        $reclamation = Reclamation::findOrFail($id);
        return view('backOffice.Reclamation.edit', compact('reclamation'));
    }

    
    public function updateResponse(Request $request, $id)
    {
        $request->validate([
            'response' => 'required|string',
        ]);

        $response = Response::findOrFail($id);
        $response->content = $request->input('response');
        $response->save();

        return redirect()->route('backOffice.reclamations.index')->with('success', 'Response updated successfully!');
    }

    public function deleteResponse($id)
    {
        $response = Response::findOrFail($id);
        $response->delete();

        return redirect()->route('backOffice.reclamations.index')->with('success', 'Response deleted successfully!');
    }
    public function home()
    {
        $reclamations = Reclamation::all();
        return view('backOffice.Reclamation.index', compact('reclamations'));
    }

}
