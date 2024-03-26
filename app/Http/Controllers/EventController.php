<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();

        return response()->json($events);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'location' => 'required',
            'tickets_available' => 'required|numeric',
            'price' => 'required|decimal:2',
            'registration_starts_at' => 'required|date',
            'registration_ends_at' => 'required|date',
            'starts_at' => 'required|date',
            'ends_at' => 'required|date',
        ]);

        $event = Event::create($request->all());

        return response()->json($event, 201);
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);

        return response()->json([
            'event' => $event
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // 'name' => 'required',
            // 'description' => 'required',
            // 'status' => 'required',
            // 'location' => 'required',
            // 'tickets_available' => 'required|numeric',
            // 'price' => 'required|decimal:2',
            // 'registration_starts_at' => 'required|date',
            // 'registration_ends_at' => 'required|date',
            // 'starts_at' => 'required|date',
            // 'ends_at' => 'required|date',
        ]);

        $event = Event::findOrFail($id);
        $event->update($request->all());

        return response()->json([
            'message' => 'Event updated successfully',
            'event' => $event
        ]);
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return response()->json([
            'message' => 'Event deleted successfully'
        ], 204);
    }
}
