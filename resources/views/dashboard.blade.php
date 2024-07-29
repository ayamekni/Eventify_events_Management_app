<!-- resources/views/dashboard.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <!-- Header Section -->
    <nav class="bg-gray-800 dark:bg-gray-900 text-white py-4">
        <div class="container mx-auto flex items-center justify-between px-4">
            <div class="text-lg font-semibold">Event Management</div>
            <div class="space-x-4">
                <a href="{{ route('profile.edit') }}" class="hover:bg-gray-700 px-4 py-2 rounded transition duration-300 ease-in-out">Edit Profile</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="hover:bg-gray-700 px-4 py-2 rounded transition duration-300 ease-in-out">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="py-12 bg-gray-100 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>

        <div class="container mx-auto px-4 py-6">
            <!-- Display different buttons based on user role -->
            @if (Auth::user()->isUser())
                <div class="flex justify-center mt-6">
                    <a href="{{ route('events.browse') }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out">
                        Browse Events
                    </a>
                </div>
            @elseif (Auth::user()->isOrganiser())
                <div class="flex flex-col items-center space-y-4 mt-6">
                    <div class="flex items-center space-x-4">
                        <span class="text-lg text-black">You have a new idea for an event?</span>
                        <a href="{{ route('events.create') }}" class="bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition duration-300 ease-in-out">
                            Create Event
                        </a>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="text-lg text-black">Wanna see the events?</span>
                        <a href="{{ route('events.index') }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out">
                            Browse Events
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
    </x-slot>
</x-app-layout>

