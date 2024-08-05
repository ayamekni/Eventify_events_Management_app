@extends('layouts.events')

@section('content')
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif

<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-semibold mb-6">Browse Events</h1>
    @if ($events->isEmpty())
        <p class="text-gray-700 dark:text-gray-300">No events found.</p>
        <a href="{{ route('events.browse') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
            Return
        </a>
    @else
        <form action="{{ route('events.browse') }}" method="GET" class="mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="flex flex-col">
                    <label for="search" class="mb-2 text-gray-700 dark:text-gray-300">Type Title:</label>
                    <input name="search" type="text" id="search" class="border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-blue-300 focus:border-blue-300" placeholder="Enter event title">
                </div>

                <div class="flex flex-col">
                    <label for="location" class="mb-2 text-gray-700 dark:text-gray-300">Select Location:</label>
                    <select class="border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-blue-300 focus:border-blue-300" id="location" name="location">
                        <option value="all">All Locations</option>
                        @foreach ($uniqueLocations as $location)
                            <option value="{{ $location }}">{{ $location }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Filter
                </button>
            </div>
        </form>

        <div class="space-y-4">
            @foreach ($events as $event)
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-md p-4">
                    <h2 class="text-xl font-bold mb-2">{{ $event->title }}</h2>
                    <p class="text-gray-700 dark:text-gray-300 mb-2">{{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}</p>
                    <p class="text-gray-700 dark:text-gray-300 mb-2"><strong>Created by:</strong> {{ $event->creator->first_name }} {{ $event->creator->last_name }}</p>
                    
                    <div class="flex justify-between items-center">
                        <form action="{{ route('events.join', $event->id) }}" method="POST" class="inline">
                            @csrf
                            @if($event->users()->where('user_id', Auth::id())->exists())
                                @php
                                    $subscription = $event->users()->where('user_id', Auth::id())->first()->pivot;
                                @endphp

                                @if ($subscription->status == 'pending')
                                    <button type="button" class="bg-yellow-500 text-white px-4 py-2 rounded" disabled>
                                        Pending Approval
                                    </button>
                                @elseif ($subscription->status == 'accepted')
                                    <button type="button" class="bg-green-500 text-white px-4 py-2 rounded" disabled>
                                        Accepted
                                    </button>
                                @elseif ($subscription->status == 'refused')
                                    <button type="button" class="bg-red-500 text-white px-4 py-2 rounded" disabled>
                                        Refused
                                    </button>
                                @endif
                            @else
                                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                                    Join
                                </button>
                            @endif
                        </form>
                        
                        <a href="{{ route('events.show', $event->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                            View More Details
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $events->links("pagination::bootstrap-4") }}
        </div>
    @endif
</div>
@endsection

