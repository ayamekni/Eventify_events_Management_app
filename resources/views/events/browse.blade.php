<!-- resources/views/events/browse.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-semibold mb-4">Browse Events</h2>

    <!-- Search and Filter Form -->
    <form method="GET" action="{{ route('events.browse') }}" class="mb-4">
        <div class="flex items-center">
            <input type="text" name="search" placeholder="Search events..." value="{{ request('search') }}" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded ms-2 hover:bg-blue-700">
                Search
            </button>
        </div>
    </form>

    <!-- List of Events -->
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg">
        @forelse ($events as $event)
            <div class="p-4 border-b border-gray-200 dark:border-gray-700">
                <h3 class="text-xl font-semibold"><a href="{{ route('events.show', $event->id) }}">{{ $event->title }}</a></h3>
                <p class="text-gray-600 dark:text-gray-400">{{ $event->date->format('F j, Y') }}</p>
                <p class="text-gray-600 dark:text-gray-400">{{ $event->description }}</p>
                <form action="{{ route('events.rsvp', $event->id) }}" method="POST" class="mt-2">
                    @csrf
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">
                        RSVP
                    </button>
                </form>
            </div>
        @empty
            <p class="p-4 text-gray-600 dark:text-gray-400">No events found.</p>
        @endforelse
    </div>
</div>
@endsection
