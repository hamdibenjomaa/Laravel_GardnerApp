<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Item; 

class ProviderController extends Controller
{
    public function home ()
    {
     
        return view('backOffice.providers.home');
    }


    public function index()
    {
        $providers = Provider::all();
        return view('frontOffice.providers.index', compact('providers'));
    }

    public function backOfficeIndex()
    {
        $providers = Provider::all();
        return view('backOffice.providers.index', compact('providers'));
    }

    public function show($id)
    {
        $provider = Provider::with('items')->findOrFail($id);
        return view('frontOffice.providers.show', compact('provider'));
    }

    public function create()
    {
        return view('backOffice.providers.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

     
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('provider_photos', 'public');
            $validatedData['photo'] = $path;
        }

   
        Provider::create($validatedData);

        return redirect()->route('backOffice.providers.index')->with('success', 'Provider added successfully.');
    }
    public function edit($id)
    {
        $provider = Provider::findOrFail($id);
        return view('backOffice.providers.edit', compact('provider'));
    }

    public function update(Request $request, $id)
    {
        $provider = Provider::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

       
        if ($request->hasFile('photo')) {
          
            if ($provider->photo && Storage::disk('public')->exists($provider->photo)) {
                Storage::disk('public')->delete($provider->photo);
            }

            $path = $request->file('photo')->store('provider_photos', 'public');
            $validatedData['photo'] = $path;
        }

        $provider->update($validatedData);

        return redirect()->route('backOffice.providers.index')->with('success', 'Provider updated successfully.');
    }

    public function destroy($id)
    {
        $provider = Provider::findOrFail($id);

        if ($provider->photo && Storage::disk('public')->exists($provider->photo)) {
            Storage::disk('public')->delete($provider->photo);
        }

        $provider->delete();

        return redirect()->route('backOffice.providers.index')->with('success', 'Provider deleted successfully.');
    }


    public function filterItems(Request $request, $providerId)
    {
        $availability = $request->get('availability'); 
        $query = Item::where('provider_id', $providerId);
    
        if ($availability && $availability !== 'all') {
            $query->where('availability', $availability);
        }
    
        $items = $query->get();
    
      
        return view('frontOffice.providers.filtered-items', compact('items'))->render();
    }

}
