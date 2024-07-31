<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;

use App\Http\Controllers\EventController;
Route::get('/', [EventController::class, 'home'])->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::middleware('auth')->group(function () {
// Display a listing of the events
Route::get('/events', [EventController::class, 'index'])->name('events.index');

// Show the form for creating a new event
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');

// Store a newly created event in storage
Route::post('/events', [EventController::class, 'store'])->name('events.store');


// Show the form for editing the specified event
Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');

// Update the specified event in storage
Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');

// Remove the specified event from storage
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

// Additional route for browsing events (optional)
Route::get('/events/browse', [EventController::class, 'browse'])->name('events.browse');
Route::post('/events/{event}/join', [EventController::class, 'join'])->name('events.join');
// Route::post('/events', [EventController::class, 'join'])->name('events.join');
// Route for cancelling event subscription
Route::post('/events/{id}/cancel', [EventController::class, 'cancel'])->name('events.cancel');



Route::get('/events/manage', [EventController::class, 'manage'])->name('events.manage');






}
);