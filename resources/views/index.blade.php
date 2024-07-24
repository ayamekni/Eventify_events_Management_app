<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-4">Events</h1>
        <ul>
            @foreach ($events as $event)
                <li>{{ $event->title }} - {{ $event->date }}</li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
