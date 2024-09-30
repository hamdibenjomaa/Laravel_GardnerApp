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

        // dd('student created successfully');
        return redirect ('/jardinier');
    }

    public function edit($id)
    {
        $jardinier = Jardinier::find($id);
        if (!$jardinier) {
            return redirect()->route('jardinier.index')->with('error', 'Jardinier not found');
        }

        return view('jardinier.edit', [
            'jardinier'=>$jardinier,
        ]);
    }

    public function update(Request $request, $id)
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


        $jardinier = Jardinier::findOrfail($id);


        $jardinier->nom = $request->input('nom');
        $jardinier->prenom = $request->input('prenom');
        $jardinier->telephone = $request->input('telephone');
        $jardinier->localisation = $request->input('localisation');
        $jardinier->horaire = $request->input('horaire');
        $jardinier->cout = $request->input('cout');
        $jardinier->specialite = $request->input('specialite');
        $jardinier->save();

        return redirect()->route('jardinier.index')->with('success', 'Jardinier updated successfully');
    }
    
    public function show($id)
    {
//        $course = Course::with('staff')->findOrFail($id);
        $jardinier = Jardinier::findOrFail($id);
//        dd($course);
        return view('jardinier.show', ['jardinier' => $jardinier]);
    }

    public function destroy($id)
    {
        
        $jardinier = Jardinier::find($id);
        
        
        if (!$jardinier) {
            return response()->json(['message' => 'Jardinier not found'], 404);
        }


        $jardinier->delete();

//        dd('Parent deleted successfully');
        return redirect()->route('jardinier.index')->with('success', 'Jardinier deleted successfully');
    }

}
