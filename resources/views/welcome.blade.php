<!-- resources/views/welcome.blade.php -->

<x-app-layout>
    <x-slot name="header">
        

    <div class="relative py-12 bg-gradient-to-r from-blue-500 to-purple-600 text-white text-center rounded-lg">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-4xl font-bold mb-4">Discover Our Interesting Events, Subscribe Now!</h1>
                    <p class="text-xl">Join our community and stay updated with the latest events.</p>
                </div>
            </div>
        </div>
        
        @if (Route::has('login'))
            <div class="absolute top-4 right-4 space-x-4">
                @auth
                    <a href="{{ route('dashboard') }}" class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>

    <!-- Events Section -->
    <div class="container mx-auto px-4 py-12">
        <h2 class="text-3xl font-semibold mb-8 text-center">Upcoming Events</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($events as $event)
                <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg p-6 shadow-lg transform hover:scale-105 transition duration-300">
                    <h3 class="text-2xl font-bold mb-2">{{ $event->title }}</h3>
                    <p class="text-gray-700 dark:text-gray-300 mb-4">{{ \Illuminate\Support\Str::limit($event->description, 100) }}</p>
                    <p class="text-gray-500 dark:text-gray-400 mb-4">{{ $event->date }}</p>
                    <a href="{{ route('register') }}" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">View More</a>
                </div>
            @endforeach
        </div>
        <div class="mt-12 flex justify-center">
            {{ $events->links() }}
        </div>
    </div>
    </x-slot>
</x-app-layout>
