<!-- resources/views/layouts/events.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    @yield('styles')
    <style>
    .header-avatar {
            width: 32px; /* Adjust the size as needed */
            height: 32px; /* Adjust the size as needed */
        }
    </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900">
   
    <nav class="bg-gray-800 dark:bg-gray-900 text-white py-4">
        <div class="container mx-auto flex items-center justify-between px-4">
            <div class="text-lg font-semibold">Event Management</div>
            <div class="space-x-4">
            @auth
            
        @if(Auth::user()->isOrganiser())
            <a href="{{ route('events.create') }}" class="hover:bg-gray-700 px-4 py-2 rounded transition duration-300 ease-in-out">Create Event</a>
            <a href="{{ route('events.index') }}" class="hover:bg-gray-700 px-4 py-2 rounded transition duration-300 ease-in-out">View Events</a>
        @endif
        <a href="{{ route('dashboard') }}" class="hover:bg-gray-700 px-4 py-2 rounded transition duration-300 ease-in-out">Dashboard</a>
        <a href="{{ route('profile.edit') }}" class="hover:bg-gray-700 px-4 py-2 rounded transition duration-300 ease-in-out">
                
                        <span>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                    </a>
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit" class="hover:bg-gray-700 px-4 py-2 rounded transition duration-300 ease-in-out">Logout</button>
        </form>
    @else
        <a href="{{ route('login') }}" class="hover:bg-gray-700 px-4 py-2 rounded transition duration-300 ease-in-out">Log in</a>
        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="hover:bg-gray-700 px-4 py-2 rounded transition duration-300 ease-in-out">Register</a>
        @endif
    @endauth
            </div>
        </div>
    </nav>
    <main class="container mx-auto px-4 py-6">
        @yield('content')
    </main>
    @yield('scripts')
</body>
</html>
