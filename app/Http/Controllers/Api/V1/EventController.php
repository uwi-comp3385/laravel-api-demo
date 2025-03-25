<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();

        return response()->json($events);
    }

    public function store(EventRequest $request)
    {
       $validated = $request->validated();

        $event = Event::create($request->all());

        return response()->json([
            'message' => 'Event created successfully',
            'event' => $event
        ], 201);
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);

        return response()->json([
            'event' => $event
        ]);
    }

    public function update(EventRequest $request, $id)
    {
        $validated = $request->validated();

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
