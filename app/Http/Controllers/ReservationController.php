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
            'reference' => 'nullable',
            'jardinier_id' => 'nullable|exists:jardiniers,id',
        ]);

        $lastReservation = Reservation::orderBy('id', 'desc')->first();
        $newReference = $lastReservation ? sprintf('%04d', intval($lastReservation->reference) + 1) : '0001';

        $reservation = new Reservation();
        $reservation->description_service = $request->input('description_service');
        $reservation->date_réservation = $request->input('date_réservation');
        $reservation->client = $request->input('client');
        $reservation->reference = $newReference;
        $reservation->jardinier_id = $request->input('jardinier_id');
        $reservation->save();

        // dd('student created successfully');
        return redirect ('/jardinier');
    }

    public function edit($id)
    {
        $reservation = Reservation::find($id);
        if (!$reservation) {
            return redirect()->route('reservation.index')->with('error', 'Jardinier not found');
        }

        return view('reservation.edit', [
            'reservation'=>$reservation,
        ]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
           'description_service' => 'nullable',
            'date_réservation' => 'nullable',
            'client' => 'nullable',
            'reference' => 'nullable',
            'jardinier_id' => 'nullable|exists:jardiniers,id',
        ]);

        $reservation = Reservation::findOrfail($id);

        $reservation = new Reservation();
        $reservation->description_service = $request->input('description_service');
        $reservation->date_réservation = $request->input('date_réservation');
        $reservation->client = $request->input('client');
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
