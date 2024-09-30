<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jardinier;
use Illuminate\Validation\Rule;

class JardinierController extends Controller
{
    public function index()
    {
        $jardiniers = Jardinier::all();
        return view('jardinier.index',compact('jardiniers'));
    }

    public function create()
    {
        return view('jardinier.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'telephone' => 'required|string',
            'localisation' => 'nullable|string',
            'horaire' => 'nullable|string',
            'cout' => 'nullable|string',
            'specialite' => ['required', Rule::in(['Paysagiste','Jardinier d’entretien','fleuriste',' Jardinier horticole','Arboriculteur'])],
        ]);

        $jardinier = Jardinier::create($request->all());

        return response()->json($jardinier, 201);
    }

    public function storeee(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'telephone' => 'required',
            'localisation' => 'nullable',
            'horaire' => 'nullable',
            'cout' => 'nullable',
            'specialite' => ['required', Rule::in(['Paysagiste','Jardinier d’entretien','fleuriste',' Jardinier horticole','Arboriculteur'])],
    
        ]);
        $jardinier = new Jardinier();
        $jardinier->nom = $request->input('nom');
        $jardinier->prenom = $request->input('prenom');
        $jardinier->telephone = $request->input('telephone');
        $jardinier->localisation = $request->input('localisation');
        $jardinier->horaire = $request->input('horaire');
        $jardinier->cout = $request->input('cout');
        $jardinier->specialite = $request->input('specialite');
        $jardinier->save();

//        dd('student created successfully');
        return redirect ('/jardinier');
    }

    public function destroy($id)
    {

        $jardinier = Jardinier::find($id);


        if (!$jardinier) {
            return response()->json(['message' => 'Course not found'], 404);
        }


        $jardinier->delete();

//        dd('Parent deleted successfully');
        return redirect()->route('jardinier.index')->with('success', 'Course deleted successfully');
    }

}
