@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-semibold mb-4">{{ $event->title }}</h2>

    <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <p class="text-gray-700 dark:text-gray-300"><strong>Description:</strong> {{ $event->description }}</p>
        <p class="text-gray-700 dark:text-gray-300"><strong>Date:</strong> {{ $event->date->format('F j, Y') }}</p>
        <p class="text-gray-700 dark:text-gray-300"><strong>Location:</strong> {{ $event->location }}</p>

        <!-- Edit and Delete buttons if user has permission -->
        @can('update', $event)
            <div class="mt-4">
                <a href="{{ route('events.edit', $event->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-700">
                    Edit Event
                </a>
            </div>
        @endcan

        @can('delete', $event)
            <div class="mt-4">
                <form method="POST" action="{{ route('events.destroy', $event->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">
                        Delete Event
                    </button>
                </form>
            </div>
        @endcan
    </div>
</div>
@endsection
