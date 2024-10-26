<?php

namespace App\Http\Controllers;

use App\Models\Reclamation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

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
        $categories = Category::all();
        return view('frontOffice.addReclamation', compact('categories'));
    }

  
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);
    
        $userId = Auth::id();
    
        // Create a new reclamation and associate it with the authenticated user and selected category
        $reclamation = new Reclamation();
        $reclamation->title = $request->input('title');
        $reclamation->description = $request->input('description');
        $reclamation->category_id = $request->input('category_id'); // Set category_id from the request
        $reclamation->user_id = $userId; // Set user_id to the authenticated user
        $reclamation->save();
    
        return redirect()->route('reclamations.index')->with('success', 'Reclamation added successfully!');
    }
    

  
    public function edit($id)
    {
        // Find reclamation by ID and check if it belongs to the authenticated user
        $reclamation = Reclamation::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $categories = Category::all();
        return view('frontOffice.updateReclamation', compact('reclamation', 'categories')); // Show edit form
    }

 
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',

        ]);

        // Find the reclamation by ID and check if it belongs to the authenticated user
        $reclamation = Reclamation::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        // Update the reclamation attributes
        $reclamation->title = $request->input('title');
        $reclamation->description = $request->input('description');
        $reclamation->category_id = $request->input('category_id'); // Add this line to update the category

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
        $totalReclamations = Reclamation::count();
    
        // Group reclamations by category and count each
        $reclamationsByCategory = Reclamation::selectRaw('categories.name as category_name, COUNT(*) as count')
            ->join('categories', 'reclamations.category_id', '=', 'categories.id')
            ->groupBy('categories.name')
            ->get();
    
        // Calculate percentage for each category
        $data = $reclamationsByCategory->map(function ($item) use ($totalReclamations) {
            return [
                'category' => $item->category_name,
                'percentage' => $totalReclamations ? round(($item->count / $totalReclamations) * 100, 2) : 0,
            ];
        });
    
        return view('backOffice.Reclamation.index', compact('reclamations', 'data'));
    }
    



public function index1(Request $request)
{
    // Capture the 'email' query parameter from the request
    $email = $request->input('email');

    // Query reclamations and filter by user's email if provided
    $reclamations = Reclamation::with('user')
        ->when($email, function ($query, $email) {
            return $query->whereHas('user', function ($q) use ($email) {
                $q->where('email', 'like', '%' . $email . '%');
            });
        })
        ->get();

    return view('backOffice.reclamation.index', compact('reclamations'));
}

}
