<?php

namespace App\Http\Controllers;

use App\Models\reservation;
use App\Models\Jardinier;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = reservation::all();
        return view('reservation.index',compact('reservations'));
    }

    public function create()
    {
        $jardiniers = Jardinier::all();
        return view('reservation.create',[
            'jardiniers'=>$jardiniers,
        ]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'description_service' => 'nullable',
            'date_réservation' => 'nullable',
            'client' => 'nullable',
            'feedback' => 'nullable',
            'reference' => 'nullable',
            'jardinier_id' => 'nullable|exists:jardiniers,id',
        ]);
        $reservation = new Reservation();
        $reservation->description_service = $request->input('description_service');
        $reservation->date_réservation = $request->input('date_réservation');
        $reservation->client = $request->input('client');
        $reservation->feedback = $request->input('feedback');
        $reservation->reference = $request->input('reference');
        $reservation->jardinier_id = $request->input('jardinier_id');
        $reservation->save();

        // dd('student created successfully');
        return redirect ('/reservation');
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
           'description_service' => 'nullable',
            'date_réservation' => 'nullable',
            'client' => 'nullable',
            'feedback' => 'nullable',
            'reference' => 'nullable',
            'jardinier_id' => 'nullable|exists:jardiniers,id',
        ]);

        $reservation = Reservation::findOrfail($id);

        $reservation = new Reservation();
        $reservation->description_service = $request->input('description_service');
        $reservation->date_réservation = $request->input('date_réservation');
        $reservation->client = $request->input('client');
        $reservation->feedback = $request->input('feedback');
        $reservation->reference = $request->input('reference');
        $reservation->jardinier_id = $request->input('jardinier_id');
        $reservation->save();

        return redirect()->route('reservation.index')->with('success', 'Reservation updated successfully');
    }
    
    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('reservation.show', ['reservation' => $reservation]);
    }

    public function destroy($id)
    {
        
        $reservation = Reservation::find($id);
        
        
        if (!$reservation) {
            return response()->json(['message' => 'Reservation not found'], 404);
        }


        $reservation->delete();

        return redirect()->route('reservation.index')->with('success', 'Reservation deleted successfully');
    }
}
