<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    public function store(Request $request, $eventId)
    {
        $request->validate([
            'text' => 'required|string',
        ]);

        Comment::create([
            'text' => $request->text,
            'date' => now(),
            'event_id' => $eventId,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('events.show', $eventId)->with('success', 'Comment added successfully!');
    }
    
}

