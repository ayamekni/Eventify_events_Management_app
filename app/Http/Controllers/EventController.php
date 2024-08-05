<?php

namespace App\Http\Controllers;

use App\Models\Event;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class EventController extends Controller
{
 
 
    public function home()
    {
        $events = Event::paginate(5); // Adjust pagination as needed
        return view('welcome', compact('events'));
    }

    public function dashboard()
    {
        $events = Event::paginate(10); // Adjust the pagination number as needed
        return view('dashboard', compact('events'));
    }
 
 
    // Display a listing of the events
    public function index()
{
    $userId = Auth::id(); // Get the ID of the authenticated user
    $events = Event::where('user_id', $userId)->get(); // Fetch events created by the user
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
    if ($event->user_id !== Auth::id()) {
        return redirect()->route('events.index')->with('error', 'You are not authorized to edit this event.');
    }
    return view('events.edit', compact('event'));
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
  


    // In EventController.php // Join an event

  public function show($id)
   {
    $event = Event::with(['comments.user'])->findOrFail($id);
    return view('events.show', compact('event'));
   }


    public function browse(Request $request){
    // Log the request data for debugging
 
    
    // Retrieve all events
    $query = Event::query();
    
    // Apply any filters
    if ($request->has('search')) {
        $query->where('title', 'like', '%' . $request->input('search') . '%');
    }
    
    if ($request->has('location')) {
        $location = $request->input('location');
        if ($location !== 'all') {
            $query->where('location', $location);
        }
    }
    $subscriptions = Auth::user()->events->pluck('id');


    // Paginate the results
    $events = $query->paginate(3);

    // Retrieve unique locations
    $uniqueLocations = $this->getUniqueLocations();

    
    return view('events.browse', compact('events', 'subscriptions', 'uniqueLocations'));
  
}
public function manage()
{
    $events = Event::all();
    return view('events.manage', compact('events'));
}


  public function join($id)
    {
        $event= Event::findOrFail($id);
        $user=User::findOrFail(Auth::id());
        $event->users()->attach($user, ['status' => 'pending']);
        
        return redirect()->route('events.browse')->with('success', 'your subscibtion is pending for approval');
    }


    public function accept($eventId, $userId)
    {
        $event = Event::findOrFail($eventId);
        $user = User::findOrFail($userId);

        $event->users()->updateExistingPivot($user->id, ['status' => 'accepted']);

        return redirect()->back()->with('success', 'User subscription accepted.');
    }

    public function refuse($eventId, $userId)
    {
        $event = Event::findOrFail($eventId);
        $user = User::findOrFail($userId);

        $event->users()->updateExistingPivot($user->id, ['status' => 'refused']);

        return redirect()->back()->with('success', 'User subscription refused.');
    }

    public function cancel($id)
    {
        $event = Event::findOrFail($id);
        $user = User::findOrFail(Auth::id());
        $event->users()->detach($user);
        return redirect()->route('events.browse')->with('success', 'Subscription canceled successfully!');
    }
    

    // public function join($id)
    // {
    //     $event = Event::findOrFail($id);
    //     return view('events.join', compact('event'));
    // }
}
