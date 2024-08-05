@extends('layouts.events')

@section('content')
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif

<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-semibold mb-6">Event Details</h1>

    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-md p-4 mb-6">
        <h2 class="text-xl font-bold mb-2">{{ $event->title }}</h2>
        <p class="text-gray-700 dark:text-gray-300 mb-2">{{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}</p>
        <p class="text-gray-700 dark:text-gray-300 mb-2"><strong>Created by:</strong> {{ $event->creator->first_name }} {{ $event->creator->last_name }}</p>
        <p class="text-gray-700 dark:text-gray-300 mb-2">{{ $event->description }}</p>
    </div>

    @if(Auth::user()->id === $event->creator->id)
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-md p-4 mb-6">
            <h3 class="text-lg font-semibold mb-4">Manage Subscriptions</h3>
            <div class="space-y-4">
                @foreach ($event->users as $user)
                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg flex justify-between items-center">
                        <div>
                            <p class="text-gray-900 dark:text-gray-100">{{ $user->first_name }} {{ $user->last_name }} - {{ $user->email }}</p>
                            <p class="text-gray-600 dark:text-gray-400">{{ ucfirst($user->pivot->status) }}</p>
                        </div>
                        @if ($user->pivot->status == 'pending')
                            <div class="flex space-x-2">
                                <form action="{{ route('events.accept', ['eventId' => $event->id, 'userId' => $user->id]) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                                        Accept
                                    </button>
                                </form>
                                <form action="{{ route('events.refuse', ['eventId' => $event->id, 'userId' => $user->id]) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                                        Refuse
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-md p-4 mb-6">
            <h3 class="text-lg font-semibold mb-4">List of Accepted Users</h3>
            <div class="space-y-4">
                @foreach ($event->users->where('pivot.status', 'accepted') as $user)
                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                        <p class="text-gray-900 dark:text-gray-100">{{ $user->first_name }} {{ $user->last_name }} - {{ $user->email }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-md p-4">
        <h3 class="text-lg font-semibold mb-4">Comments</h3>
        @if ($event->comments->isEmpty())
            <p class="text-gray-700 dark:text-gray-300">No comments yet.</p>
        @else
            <div class="space-y-4">
                @foreach ($event->comments as $comment)
                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                        <p class="text-gray-900 dark:text-gray-100"><strong>{{ $comment->user->first_name }} {{ $comment->user->last_name }}</strong> said:</p>
                        <p class="text-gray-700 dark:text-gray-300">{{ $comment->text}}</p>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">{{ \Carbon\Carbon::parse($comment->created_at)->format('d M Y, H:i') }}</p>
                    </div>
                @endforeach
            </div>
        @endif

        @auth
            <form action="{{ route('comments.store', $event->id) }}" method="POST" class="mt-6">
                @csrf
                <div class="mb-4">
                    <textarea name="content" id="content" rows="4" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 focus:ring-blue-300 focus:border-blue-300" placeholder="Add your comment"></textarea>
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        Submit Comment
                    </button>
                </div>
            </form>
        @endauth
    </div>
</div>
@endsection




