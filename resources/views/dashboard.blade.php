<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    <div class="container mx-auto px-4 py-6">
        <!-- Display different buttons based on user role -->
        @if (Auth::user()->isUser())
            <div class="flex justify-center">
                <a href="{{ route('events.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                    View Events
                </a>
            </div>
        @elseif (Auth::user()->isOrganiser())
            <div class="flex flex-col items-center space-y-4">
                <a href="{{ route('events.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">
                    Create Event
                </a>
                <a href="{{ route('events.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Browse Events
                </a>
            </div>
        @endif
    </div>
</x-app-layout>
