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

        return new EventCollection($events);

        // Without a Resource Collection:
        // return response()->json($events);
    }

    public function store(EventRequest $request)
    {
        $event = Event::create($request->validated());

        return (new EventResource($event))->response()->setStatusCode(201);

        // Without a Resource:
        // return response()->json(['message' => 'Event created successfully', 'event' => $event], 201);
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);

        return new EventResource($event);

        // Without a Resource:
        // return response()->json(['event' => $event]);
    }

    public function update(EventRequest $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->update($request->validated());

        return new EventResource($event);

        // Without a Resource:
        // return response()->json(['message' => 'Event updated successfully', 'event' => $event]);
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return response()->json([
            'message' => 'Event deleted successfully',
        ]);
    }
}
