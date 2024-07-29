@extends('layouts.events')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="max-w-lg mx-auto bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
        <div class="bg-gray-800 dark:bg-gray-900 p-4">
            <h1 class="text-2xl font-semibold text-white">Update Event</h1>
        </div>
        <div class="p-6">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('events.update', $event->id) }}" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="title" class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-1">Event Title:</label>
                    <input type="text" id="title" name="title" value="{{ $event->title }}" class="form-input mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm dark:bg-gray-900 dark:text-gray-100" required>
                </div>

                <div>
                    <label for="date" class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-1">Date:</label>
                    <input type="date" id="date" name="date" value="{{ $event->date }}" class="form-input mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm dark:bg-gray-900 dark:text-gray-100" required>
                </div>

                <div>
                    <label for="location" class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-1">Location:</label>
                    <input type="text" id="location" name="location" value="{{ $event->location }}" class="form-input mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm dark:bg-gray-900 dark:text-gray-100" required>
                </div>

                <div>
                    <label for="description" class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-1">Description:</label>
                    <textarea id="description" name="description" rows="4" class="form-input mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm dark:bg-gray-900 dark:text-gray-100" required>{{ $event->description }}</textarea>
                </div>

                <div class="flex items-center justify-between mt-6">
                    <button type="submit" class="bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition duration-300 ease-in-out">
                        Update Event
                    </button>
                    <a href="{{ route('events.index') }}" class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition duration-300 ease-in-out">
                        View Events
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
