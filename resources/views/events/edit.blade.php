@extends('layouts.events')

@section('content')
<div class="container mx-auto px-4 py-6 bg-white dark:bg-gray-800 shadow-md rounded-lg">
    <h2 class="text-2xl font-semibold mb-6 text-gray-900 dark:text-gray-100">Edit Event</h2>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <strong class="font-bold">Whoops!</strong>
            <span class="block sm:inline">There were some problems with your input.</span>
            <ul class="list-disc list-inside mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('events.update', $event->id) }}" class="space-y-4">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">Title</label>
            <input id="title" type="text" name="title" value="{{ old('title', $event->title) }}" class="form-input mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm dark:bg-gray-900 dark:text-gray-100" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">Description</label>
            <textarea id="description" name="description" rows="4" class="form-input mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm dark:bg-gray-900 dark:text-gray-100" required>{{ old('description', $event->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="date" class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">Date</label>
            <input id="date" type="date" name="date" value="{{ old('date', $event->date) }}" class="form-input mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm dark:bg-gray-900 dark:text-gray-100" required>
        </div>

        <div class="mb-4">
            <label for="location" class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">Location</label>
            <input id="location" type="text" name="location" value="{{ old('location', $event->location) }}" class="form-input mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm dark:bg-gray-900 dark:text-gray-100" required>
        </div>

        <div class="flex items-center justify-end">
            <button type="submit" class="bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50 transition duration-300 ease-in-out">
                Update Event
            </button>
        </div>
    </form>
</div>
@endsection
