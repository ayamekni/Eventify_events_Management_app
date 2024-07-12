<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
class EventController extends Controller
{
    public function showForm()
    {
        return view('createEvent');
    }

    // public function showEvents()
    // {
    //     $events = Event::all();
    //     return view('events', compact('events'));
    // }
    
}


