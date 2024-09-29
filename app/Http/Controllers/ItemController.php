<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ProviderController;

use App\Models\Item;
use App\Models\Provider;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function create()
    {
        $providers = Provider::all(); // Fetch all providers from the database
        return view('backOffice.items.create', compact('providers')); // Pass the providers to the view
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cost' => 'required|numeric',
            'provider_id' => 'required|exists:providers,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the photo
        ]);

        $item = new Item();
        $item->name = $request->name;
        $item->cost = $request->cost;
        $item->provider_id = $request->provider_id;

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public'); // Store the photo
            $item->photo = $path; // Save the path to the database
        }

        $item->save();

        return redirect()->route('backOffice.items.index')->with('success', 'Item created successfully.');
    }
    public function index()
    {
        $items = Item::with('provider')->get(); // Fetch all items with their associated providers
        return view('backOffice.items.index', compact('items')); // Pass the items to the view
    }
    
    public function edit($id)
    {
        $item = Item::findOrFail($id); // Find the item by ID or fail
        $providers = Provider::all(); // Fetch all providers
        return view('backOffice.items.edit', compact('item', 'providers')); // Pass the item and providers to the view
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cost' => 'required|numeric',
            'provider_id' => 'required|exists:providers,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $item = Item::findOrFail($id); // Find the item by ID or fail
        $item->name = $request->name;
        $item->cost = $request->cost;
        $item->provider_id = $request->provider_id;
    
        if ($request->hasFile('photo')) {
            // Optionally delete the old photo
            if ($item->photo) {
                \Storage::delete('public/' . $item->photo); // Delete old photo if exists
            }
            
            $path = $request->file('photo')->store('photos', 'public'); // Store the new photo
            $item->photo = $path; // Save the new path to the database
        }
    
        $item->save(); // Update the item in the database
    
        return redirect()->route('backOffice.items.index')->with('success', 'Item updated successfully.'); // Redirect with success message
    }
    
    public function destroy($id)
    {
        $item = Item::findOrFail($id); // Find the item by ID or fail
    
        if ($item->photo) {
            \Storage::delete('public/' . $item->photo); // Delete the photo from storage if it exists
        }
    
        $item->delete(); // Delete the item from the database
    
        return redirect()->route('backOffice.items.index')->with('success', 'Item deleted successfully.'); // Redirect with success message
    }
    
}
