<!-- resources/views/events/index.blade.php -->

@extends('layouts.app')

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
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">{{ $event->title }}</td>
                        <td class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">{{ $event->date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
