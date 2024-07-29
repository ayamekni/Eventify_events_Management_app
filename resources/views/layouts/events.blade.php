<!-- resources/views/layouts/events.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @yield('styles')
</head>
<body class="bg-gray-100 dark:bg-gray-900">
    <nav class="bg-gray-800 dark:bg-gray-900 text-white py-4">
        <div class="container mx-auto flex items-center justify-between px-4">
            <div class="text-lg font-semibold">Event Management</div>
            <div class="space-x-4">
                <a href="{{ route('events.create') }}" class="hover:bg-gray-700 px-4 py-2 rounded transition duration-300 ease-in-out">Create Event</a>
                <a href="{{ route('events.index') }}" class="hover:bg-gray-700 px-4 py-2 rounded transition duration-300 ease-in-out">View Events</a>
            </div>
        </div>
    </nav>
    <main class="container mx-auto px-4 py-6">
        @yield('content')
    </main>
    @yield('scripts')
</body>
</html>
