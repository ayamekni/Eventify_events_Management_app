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

        <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-md">
            <thead class="bg-gray-200 dark:bg-gray-700">
                <tr>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Title</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Date</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Location</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Description</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Created by</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr class="border-t border-gray-200 dark:border-gray-700">
                        <td class="py-3 px-4">{{ $event->title }}</td>
                        <td class="py-3 px-4">{{ $event->date }}</td>
                        <td class="py-3 px-4">{{ $event->location }}</td>
                        <td class="py-3 px-4">{{ $event->description }}</td>
                        <td class="py-3 px-4"> {{ $event->creator->first_name }} {{ $event->creator->last_name }}
                        </td></td>
                        <td class="py-3 px-4">
                        @if($subscriptions->contains($event->id))
                            <form action="{{ route('events.cancel', $event->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                                    Cancel Subscription
                                </button>
                            </form>
                        @else
                            <form action="{{ route('events.join', $event->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                                    Join
                                </button>
                            </form>
                        @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-6">
            <ul class="pagination">
                {{ $events->links("pagination::bootstrap-4") }}
            </ul>
        </div>
    @endif
</div>
@endsection
