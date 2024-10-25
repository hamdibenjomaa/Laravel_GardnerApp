<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jardinier;
use Illuminate\Validation\Rule;

class JardinierController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

    $jardiniersQuery = Jardinier::query()
        ->when($search, function ($query, $search) {
            $terms = explode(' ', $search); // Split search query into terms
            foreach ($terms as $term) {
                $query->where(function ($query) use ($term) {
                    $query->where('nom', 'like', '%' . $term . '%')
                        ->orWhere('prenom', 'like', '%' . $term . '%')
                        ->orWhere('localisation', 'like', '%' . $term . '%')
                        ->orWhere('specialite', 'like', '%' . $term . '%');
                });
            }
        });

    $jardiniers = $jardiniersQuery->get(); // Retrieve results

    if ($request->ajax()) {
        return response()->json(['html' => view('jardinier.dynamic-index', compact('jardiniers'))->render()]);
    }

        return view('jardinier.index', compact('jardiniers'));
    }

    public function autocomplete(Request $request)
    {
        $search = $request->get('query');
        $results = Jardinier::where('nom', 'like', '%' . $search . '%')
            ->orWhere('prenom', 'like', '%' . $search . '%')
            ->orWhere('localisation', 'like', '%' . $search . '%')
            ->orWhere('specialite', 'like', '%' . $search . '%')
            ->limit(5)
            ->get();

        return response()->json($results);
    }


    public function indexAdmin(Request $request)
    {
        $search = $request->input('search');

        $jardiniersQuery = Jardinier::query()
            ->when($search, function ($query) use ($search) {
                $terms = explode(' ', $search); // Split search query into terms
                foreach ($terms as $term) {
                    $query->where(function ($query) use ($term) {
                        $query->where('nom', 'like', '%' . $term . '%')
                            ->orWhere('prenom', 'like', '%' . $term . '%')
                            ->orWhere('localisation', 'like', '%' . $term . '%')
                            ->orWhere('specialite', 'like', '%' . $term . '%');
                    });
                }
            });

        $jardiniers = $jardiniersQuery->paginate();

        if ($request->ajax()) {
            return view('jardinier.dynamic-index', compact('jardiniers'))->render();
        }
        return view('jardinier.indexAdmin',compact('jardiniers'));
    }

    public function create()
    {
        return view('jardinier.create');
    }
    public function home()
    {
        return view('jardinier.home');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
            'prenom' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
            'telephone' => 'required|digits:8',
            'localisation' => 'nullable|string|max:255',
            'horaire' => 'nullable|string|max:255',
            'cout' => 'nullable|numeric|min:0',
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
        return redirect ('/jardinier-admin');
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
            'nom' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
            'prenom' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
            'telephone' => 'required|digits:8',
            'localisation' => 'nullable|string|max:255',
            'horaire' => 'nullable|string|regex:/^[a-zA-Z\s]+$/|max:255',
            'cout' => 'nullable|numeric|min:0',
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

        return redirect()->route('jardinier.indexAdmin')->with('success', 'Jardinier updated successfully');
    }
    
    public function show($id)
    {
//        $course = Course::with('staff')->findOrFail($id);
        $jardinier = Jardinier::findOrFail($id);
        return view('jardinier.show', ['jardinier' => $jardinier]);
    }
    public function showAdmin($id)
    {
//        $course = Course::with('staff')->findOrFail($id);
        $jardinier = Jardinier::findOrFail($id);
        return view('jardinier.showAdmin', ['jardinier' => $jardinier]);
    }

    public function destroy($id)
    {
        
        $jardinier = Jardinier::find($id);
        
        
        if (!$jardinier) {
            return response()->json(['message' => 'Jardinier not found'], 404);
        }


        $jardinier->delete();

//        dd('Parent deleted successfully');
        return redirect()->route('jardinier.indexAdmin')->with('success', 'Jardinier deleted successfully');
    }

}
