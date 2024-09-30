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
        $providers = Provider::all(); 
        return view('backOffice.items.create', compact('providers')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cost' => 'required|numeric',
            'provider_id' => 'required|exists:providers,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        $item = new Item();
        $item->name = $request->name;
        $item->cost = $request->cost;
        $item->provider_id = $request->provider_id;

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public'); 
            $item->photo = $path; 
        }

        $item->save();

        return redirect()->route('backOffice.items.index')->with('success', 'Item created successfully.');
    }
    public function index()
    {
        $items = Item::with('provider')->get(); 
        return view('backOffice.items.index', compact('items')); 
    }
    
    public function edit($id)
    {
        $item = Item::findOrFail($id); 
        $providers = Provider::all(); 
        return view('backOffice.items.edit', compact('item', 'providers')); 
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cost' => 'required|numeric',
            'provider_id' => 'required|exists:providers,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $item = Item::findOrFail($id); 
        $item->name = $request->name;
        $item->cost = $request->cost;
        $item->provider_id = $request->provider_id;
    
        if ($request->hasFile('photo')) {
           
            if ($item->photo) {
                \Storage::delete('public/' . $item->photo); 
            }
            
            $path = $request->file('photo')->store('photos', 'public'); 
            $item->photo = $path; 
        }
    
        $item->save(); 
    
        return redirect()->route('backOffice.items.index')->with('success', 'Item updated successfully.'); 
    }
    
    public function destroy($id)
    {
        $item = Item::findOrFail($id); 
    
        if ($item->photo) {
            \Storage::delete('public/' . $item->photo); 
        }
    
        $item->delete(); 
    
        return redirect()->route('backOffice.items.index')->with('success', 'Item deleted successfully.'); 
    }
    
}
