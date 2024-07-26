<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EventController extends Controller
{
    // Display a listing of the events
    public function index()
    {
        $events = Event::all(); // Fetch all events
        return view('events.index', compact('events'));
    }

    // Show the form for creating a new event
    public function create()
    {
        return view('events.create');
    }

    // Store a newly created event in storage
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'date' => 'required|date',
        'location' => 'required|string|max:255',
    ]);

    // Get the currently authenticated user
    $userId = auth()->id();
    

    // Create a new event with the user_id
    
    Event::create([
        'title' => $request->title,
        'description' => $request->description,
        'date' => $request->date,
        'location' => $request->location,
        'user_id' => Auth::id(),  // Set the user_id to the authenticated user's ID
    ]);

    return redirect()->route('events.index')->with('success', 'Event created successfully!');
}

    // Display the specified event
  

    // Show the form for editing the specified event
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('updateEvent', compact('event'));
    }
    public function getUniqueLocations()
    {
        $uniqueLocations = Event::distinct()->pluck('location');
        return $uniqueLocations;
    }

    // Update the specified event in storage
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
        ]);

        $event->update([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'location' => $request->location,
        ]);

        return redirect()->route('events.index')->with('success', 'Event updated successfully!');
    }

    // Remove the specified event from storage
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted successfully!');
    }

    // Additional method for browsing events (optional)
    public function browse()
    {
        $events = Event::all(); // Fetch all events
        return view('events.browse', compact('events'));
    }


    // In EventController.php
public function show($id)
{
    $event = Event::findOrFail($id); // Find the event or fail if not found
    return view('events.show', compact('event')); // Pass the event to the view
}



public function join(Request $request, $id)
{
    $event = Event::findOrFail($id);

    // Handle the logic for joining the event
    // For example, you could save a record in a pivot table or send a notification

    return redirect()->route('events.browse')->with('success', 'You have successfully joined the event!');
}
}
