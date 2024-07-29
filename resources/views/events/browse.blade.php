@extends('layouts.events')

@section('content')
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
  @endif
<div class="container">
    <h1>Browse Events</h1>
    @if ($events->isEmpty())
        <p>No events found.</p>
        <a href="{{ route('events.browse') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
                  return
        </a>
    @else
    <form action="{{ route('events.browse') }}" method="GET">
   
     <div class="form-group">
     <label for="search">Type Title:</label>
     <input name="search" type="text" id="search">

     <label for="location">Select Location:</label>
     <select class="form-control" id="location" name="location">
            <option value="all">All Locations</option>
            @foreach ($uniqueLocations as $location)
                <option value="{{ $location }}">{{ $location }}</option>
            @endforeach
    </select>
        
    </div>
    <button type="submit" class="btn btn-primary">Filter</button>
</form>


        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Created by</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->date }}</td>
                    <td>{{ $event->location }}</td>
                    <td>{{ $event->description }}</td>
                    <td>{{ $event->user_id}}</td>
                    <td>

                    <form action="{{ route('events.join', $event->id) }}" method="POST">
                     <!-- @method('PUT') -->
                      @csrf
                      <button type="submit">join</button>
                    </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
    <div>
    <ul class="pagination">
                {{ $events->links("pagination::bootstrap-4") }}
    </ul>
    </div>

</div>




@endsection