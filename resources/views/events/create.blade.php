@extends('layouts.events')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="max-w-lg mx-auto bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
        <div class="bg-blue-500 text-white p-4">
            <h2 class="text-xl font-semibold">Create New Event</h2>
        </div>
        
        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <strong class="font-bold">Whoops!</strong>
                <span class="block sm:inline">There were some problems with your input.</span>
                <ul class="list-disc list-inside mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('events.store') }}" class="p-6">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-medium mb-1">Title</label>
                <input id="title" type="text" name="title" value="{{ old('title') }}" class="block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring focus:ring-opacity-50 focus:ring-blue-300 focus:border-blue-300" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 text-sm font-medium mb-1">Description</label>
                <textarea id="description" name="description" rows="4" class="block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring focus:ring-opacity-50 focus:ring-blue-300 focus:border-blue-300" required>{{ old('description') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="date" class="block text-gray-700 text-sm font-medium mb-1">Date</label>
                <input id="date" type="date" name="date" value="{{ old('date') }}" class="block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring focus:ring-opacity-50 focus:ring-blue-300 focus:border-blue-300" required>
            </div>

            <div class="mb-4">
                <label for="location" class="block text-gray-700 text-sm font-medium mb-1">Location</label>
                <input id="location" type="text" name="location" value="{{ old('location') }}" class="block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring focus:ring-opacity-50 focus:ring-blue-300 focus:border-blue-300" required>
            </div>

            <div class="flex items-center justify-end space-x-4 mt-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Create Event
                </button>
                <a href="{{ route('events.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
                    View Events
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
