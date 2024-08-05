<x-app-layout>
    <x-slot name="header">
        <!-- Header Section -->
        <nav class="bg-gray-800 dark:bg-gray-900 text-white py-4 w-full fixed top-0 left-0 shadow-md">
            <div class="container mx-auto flex items-center justify-between px-4">
                <div class="text-lg font-semibold">Event Management</div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('profile.edit') }}" class="hover:bg-gray-700 px-4 py-2 rounded transition duration-300 ease-in-out">
                        <span>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="hover:bg-gray-700 px-4 py-2 rounded transition duration-300 ease-in-out">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </nav>
   

        <div class="container mx-auto px-4 py-6">
        <!-- Welcome Message -->
        <div class="bg-white dark:bg-gray-800 mx-auto w-full sm:w-3/4 lg:w-1/2 mt-6 rounded-lg shadow-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                {{ __("You're logged in!") }}
            </div>
        </div>

        <!-- Role-Based Actions -->
        <div class="bg-white dark:bg-gray-800 border dark:border-gray-700 mx-auto w-full sm:w-3/4 lg:w-1/2 mt-6 rounded-lg shadow-lg p-6">
            <div class="container mx-auto">
                <!-- Display different buttons based on user role -->
                @if (Auth::user()->isUser())
                    <div class="flex justify-center mb-6">
                        <a href="{{ route('events.browse') }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out shadow-md">
                            Browse Events
                        </a>
                    </div>
                @elseif (Auth::user()->isOrganiser())
                    <div class="space-y-4">
                        <div class="flex items-center justify-center space-x-4 mb-4">
                            <span class="text-lg text-black dark:text-gray-300">You have a new idea for an event?</span>
                            <a href="{{ route('events.create') }}" class="bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition duration-300 ease-in-out shadow-md">
                                Create Event
                            </a>
                        </div>
                        <div class="flex items-center justify-center space-x-4">
                            <span class="text-lg text-black dark:text-gray-300">Wanna see the events?</span>
                            <a href="{{ route('events.index') }}" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out shadow-md">
                                Browse Events
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Upcoming Events -->
        <div class="container mx-auto mt-12 px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-semibold mb-8 text-center text-gray-900 dark:text-gray-100">Upcoming Events</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($events as $event)
                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6 shadow-lg transform hover:scale-105 transition duration-300">
                        <h3 class="text-2xl font-bold mb-2">{{ $event->title }}</h3>
                        <p class="text-gray-700 dark:text-gray-300 mb-4">{{ \Illuminate\Support\Str::limit($event->description, 100) }}</p>
                        <p class="text-gray-500 dark:text-gray-400 mb-4">{{ $event->date }}</p>
                        <a href="{{ route('events.show', ['id' => $event->id]) }}" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">
                            View More
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="mt-12 flex justify-center">
                {{ $events->links() }}
            </div>
        </div>
    </>
    </x-slot>
</x-app-layout>
