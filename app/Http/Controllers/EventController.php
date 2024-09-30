<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Event; 

class EventController extends Controller
{
     // Liste des événements
     public function index()
     {
         $events = Event::all();
         return view('frontOffice.events.index', compact('events'));
     }
     
     public function Backindex()
     {
         $events = Event::all();
         return view('BackOffice.events.index', compact('events'));
     }
     // Afficher le formulaire pour créer un événement
     public function create()
     {
         return view('backOffice.events.create');
     }
 
     // Enregistrer un nouvel événement
     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'title' => 'required|max:255',
             'description' => 'required',
             'date' => 'required|date',
             'location' => 'required',
             'max_participants' => 'required|integer',
         ]);
 
         Event::create([
             'title' => $validatedData['title'],
             'description' => $validatedData['description'],
             'date' => $validatedData['date'],
             'location' => $validatedData['location'],
             'max_participants' => $validatedData['max_participants'],
             'user_id' => auth()->id(), // L'utilisateur connecté crée l'événement
             'status' => 'à venir',
         ]);
 
         return redirect()->route('events.index')->with('success', 'Événement créé avec succès.');
     }
 
     // Afficher un événement
     public function show($id)
     {
         $event = Event::findOrFail($id);
         return view('frontOffice.events.show', compact('event'));
     }
 
     // Modifier un événement
     public function edit($id)
     {
         $event = Event::findOrFail($id);
         return view('backOffice.events.edit', compact('event'));
     }
 
     // Mettre à jour un événement
     public function update(Request $request, $id)
     {
         $event = Event::findOrFail($id);
 
         $validatedData = $request->validate([
             'title' => 'required|max:255',
             'description' => 'required',
             'date' => 'required|date',
             'location' => 'required',
             'max_participants' => 'required|integer',
         ]);
 
         $event->update($validatedData);
 
         return redirect()->route('BackOffice.events.index')->with('success', 'Événement mis à jour.');
     }
 
     // Supprimer un événement
     public function destroy($id)
     {
         $event = Event::findOrFail($id);
         $event->delete();
 
         return redirect()->route('BackOffice.events.index')->with('success', 'Événement supprimé.');
     }
}
