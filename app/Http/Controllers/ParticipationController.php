<?php

namespace App\Http\Controllers;


use App\Models\Event;
use App\Models\Participation;
use Illuminate\Http\Request;

class ParticipationController extends Controller
{
    public function showParticipants($id)
    {
        $event = Event::findOrFail($id);
        $participants = Participation::where('event_id', $id)->with('user')->get();

        return view('backOffice.events.show', compact('event', 'participants'));
    }
}
