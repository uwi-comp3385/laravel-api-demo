<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\Http\Resources\EventCollection;
use App\Http\Resources\EventResource;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();

        return response()->json($events);

        // or you can create and use a Resource Collection
        // return new EventCollection($events);
    }

    public function store(EventRequest $request)
    {
        $validated = $request->validated();

        $event = Event::create($validated);

        return response()->json([
            'message' => 'Event created successfully',
            'event' => $event,
        ], 201);
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);

        return response()->json([
            'event' => $event,
        ]);

        // or you can create and use a Resource
        // return new EventResource($event);
    }

    public function update(EventRequest $request, $id)
    {
        $validated = $request->validated();

        $event = Event::findOrFail($id);
        $event->update($validated);

        return response()->json([
            'message' => 'Event updated successfully',
            'event' => $event,
        ]);
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return response()->json([
            'message' => 'Event deleted successfully',
        ], 204);
    }
}
