<?php

namespace App\Http\Controllers;

use App\Models\Response;
use App\Models\Reclamation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;


class ResponseController extends Controller
{

    /**
     * Display a listing of the responses for a specific reclamation.
     */
    public function index($reclamation_id)
    {
        // Check if the reclamation belongs to the authenticated user
        $reclamation = Reclamation::where('id', $reclamation_id)->where('user_id', Auth::id())->firstOrFail();
        $responses = Response::where('reclamation_id', $reclamation_id)->get();

        return view('frontOffice.responses', compact('reclamation', 'responses'));
    }

    /**
     * Show the form for creating a new response.
     */
    public function create($reclamation_id)
    {
        // Check if the reclamation belongs to the authenticated user
        $reclamation = Reclamation::where('id', $reclamation_id)->where('user_id', Auth::id())->firstOrFail();
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

        // Check if the reclamation belongs to the authenticated user
        $reclamation = Reclamation::where('id', $reclamation_id)->where('user_id', Auth::id())->firstOrFail();

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
        // Find the response by ID and check if it belongs to the associated reclamation
        $response = Response::where('id', $id)->whereHas('reclamation', function($query) {
            $query->where('user_id', Auth::id());
        })->firstOrFail();

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

        // Find the response by ID and check if it belongs to the associated reclamation
        $response = Response::where('id', $id)->whereHas('reclamation', function($query) {
            $query->where('user_id', Auth::id());
        })->firstOrFail();

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
        // Find the response by ID and check if it belongs to the associated reclamation
        $response = Response::where('id', $response_id)->whereHas('reclamation', function($query) {
            $query->where('user_id', Auth::id());
        })->firstOrFail();

        // Delete the response
        $response->delete();

        return redirect()->route('reclamations.responses.index', $reclamation_id)->with('success', 'Response deleted successfully');
    }

    public function showBackOfficeResponses($reclamation_id)
    {
        // Fetch the reclamation by ID and load its responses
        $reclamation = Reclamation::findOrFail($reclamation_id);
        $responses = Response::where('reclamation_id', $reclamation_id)->get();
    
        // Pass reclamation and responses to the view
        return view('backOffice.Response.responses', compact('reclamation', 'responses'));
    }


    public function storeResponse(Request $request, $reclamation_id)
{
    // Validate the input
    $request->validate([
        'message' => 'required|string|max:255',
    ]);

    // Find the reclamation and create a new response for it
    $reclamation = Reclamation::findOrFail($reclamation_id);

    $response = new Response();
    $response->message = $request->message;
    $response->reclamation_id = $reclamation->id;
    $response->save();

    return redirect()->route('backOffice.reclamations.home')->with('success', 'Response added successfully');
}
public function createResponse($reclamation_id)
{
    // Find the reclamation to pass its details to the view
    $reclamation = Reclamation::findOrFail($reclamation_id);

    // Return the view with the reclamation details
    return view('backOffice.Response.createResponse', compact('reclamation'));
}
public function destroy1($reclamation_id,  $response_id)
{
    // Find the response by ID and check if it belongs to the associated reclamation
    $response = Response::where('id',  $response_id)->where('reclamation_id',$reclamation_id)->firstOrFail();

    // Delete the response
    $response->delete();

    return redirect()->route('backOffice.reclamations.responses.show', $reclamation_id)
    ->with('success', 'Response deleted successfully');
}
}