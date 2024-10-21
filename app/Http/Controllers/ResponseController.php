<?php

namespace App\Http\Controllers;

use App\Models\Response;
use App\Models\Reclamation;
use Illuminate\Http\Request;

class ResponseController  extends Controller
{
    /**
     * Display a listing of the responses for a specific reclamation.
     */
    public function index($reclamation_id)
    {
        $reclamation = Reclamation::find($reclamation_id);
        $responses = Response::where('reclamation_id', $reclamation_id)->get();
    
        return view('frontOffice.responses', compact('reclamation', 'responses'));
    }

    /**
     * Show the form for creating a new response.
     */
    public function create($reclamation_id)
    {
        return view('frontOffice.addResponse', compact('reclamation_id')); // Pass reclamation_id to the view
    }

    /**
     * Store a newly created response in storage.
     */
    public function store(Request $request, $reclamation_id)
    {
        // Validate the request
        $request->validate([
            'message' => 'required|string',
        ]);

        // Create a new response
        $response = new Response();
        $response->reclamation_id = $reclamation_id; // Associate response with reclamation
        $response->message = $request->input('message');
        $response->save();

        return redirect()->route('reclamations.responses.index', $reclamation_id)->with('success', 'Response added successfully!');
    }

    /**
     * Show the form for editing the specified response.
     */
    public function edit($reclamation_id, $id)
    {
        $response = Response::findOrFail($id);
        return view('frontOffice.updateResponse', compact('response', 'reclamation_id')); // Pass response and reclamation_id to the view
    }

    /**
     * Update the specified response in storage.
     */
    public function update(Request $request, $reclamation_id, $id)
    {
        // Validate the request
        $request->validate([
            'message' => 'required|string',
        ]);

        // Find the response by ID
        $response = Response::findOrFail($id);

        // Update the response attributes
        $response->message = $request->input('message');
        $response->save();

        return redirect()->route('reclamations.responses.index', $reclamation_id)->with('success', 'Response updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($reclamation_id, $response_id)
    {
        // Find the response by ID
        $response = Response::findOrFail($response_id);
        
        // Delete the response
        $response->delete();
    
           return redirect()->route('reclamations.responses.index', $reclamation_id)->with('success', 'Response deleted successfully');
}
}
