<?php

namespace App\Http\Controllers;
use App\Models\Provider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    // Display the list of providers
    public function index()
    {
        $providers = Provider::all();
        return view('frontOffice.providers.index', compact('providers'));

    }

    // Display items of a specific provider
    public function show($id)
    {
        $provider = Provider::with('items')->findOrFail($id);
        return view('frontOffice.providers.show', compact('provider'));
    }
}