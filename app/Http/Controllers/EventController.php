<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event; 
use App\Models\Participation; 
use App\Mail\ParticipationConfirmation; // Add this import at the top
use Illuminate\Support\Facades\Mail; // Add this import at the top

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
        ], [
            'title.required' => 'Le titre est obligatoire.',
            'description.required' => 'La description est obligatoire.',
            'date.required' => 'La date est obligatoire.',
            'location.required' => 'La localisation est obligatoire.',
            'max_participants.required' => 'Le nombre maximum de participants est obligatoire.',
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

        return redirect()->route('BackOffice.events.index')->with('success', 'Événement créé avec succès.');
    }

    // Afficher un événement
    public function show($id)
    {
        $event = $this->findEventOrFail($id);
        $isParticipating = Participation::where('event_id', $event->id)
                                          ->where('user_id', auth()->id())
                                          ->exists();
        return view('frontOffice.events.show', compact('event', 'isParticipating'));
    }
    

    // Modifier un événement
    public function edit($id)
    {
        $event = $this->findEventOrFail($id);
        return view('backOffice.events.edit', compact('event'));
    }

    // Mettre à jour un événement
    public function update(Request $request, $id)
    {
        $event = $this->findEventOrFail($id);

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
        $event = $this->findEventOrFail($id);
        $event->delete();

        return redirect()->route('BackOffice.events.index')->with('success', 'Événement supprimé.');
    }

   
    
    public function participate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'statut' => 'required|string|max:255', // Statut de la participation
        ]);
    
        $event = $this->findEventOrFail($id);
    
        // Check if the maximum participants have been reached
        if ($event->current_participants >= $event->max_participants) {
            return redirect()->route('events.index')->with('error', 'Le nombre maximum de participants a été atteint.');
        }
    
        Participation::create([
            'event_id' => $event->id,
            'user_id' => auth()->id(),
            'statut' => $validatedData['statut'],
            'registered_at' => now(),
        ]);
    
        // Increment the current participants count
        $event->increment('current_participants');
    
        // Send the confirmation email
        $userName = auth()->user()->name; // Get the user's name
        Mail::to(auth()->user()->email)->send(new ParticipationConfirmation($event, $userName));
    
        return redirect()->route('events.index')->with('success', 'Vous participez à l\'événement avec succès.');
    }
    

    // Helper method to find event or fail
    private function findEventOrFail($id)
    {
        return Event::findOrFail($id);
    }

    public function searchByDate(Request $request)
    {
        $query = $request->input('date');
    
        // Find events that match the given date
        $events = Event::whereDate('date', $query)->get();
    
        return response()->json($events);
    }
    
    

}
