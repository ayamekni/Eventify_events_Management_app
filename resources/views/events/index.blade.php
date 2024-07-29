<!-- resources/views/events/index.blade.php -->

@extends('layouts.events')

@section('content')
<div class="container mx-auto px-4 py-6">
  @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
  @endif

    <h2 class="text-2xl font-semibold mb-4">Events</h2>
    
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white dark:bg-gray-800">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b-2 border-gray-200 dark:border-gray-700">Title</th>
                    <th class="px-4 py-2 border-b-2 border-gray-200 dark:border-gray-700">Date</th>
                    <th class="px-4 py-2 border-b-2 border-gray-200 dark:border-gray-700">Description</th>
                    <th class="px-4 py-2 border-b-2 border-gray-200 dark:border-gray-700">Location</th>
                    <th class="px-4 py-2 border-b-2 border-gray-200 dark:border-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">{{ $event->title }}</td>
                        <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">{{ $event->date }}</td>
                        <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">{{ $event->description }}</td>
                        <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">{{ $event->location }}</td>
                        <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">
                            <a href="{{ route('events.edit', $event->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Update</a>
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection