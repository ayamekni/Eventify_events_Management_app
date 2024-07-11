<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;


Route::get('/', function () {
    return view('welcome');
});

// Routes for events
Route::get('/createEvent', [EventController::class, 'showForm'])->name('events.form');
Route::get('/events/manage', [EventController::class, 'manage'])->name('events.manage');
Route::post('/events/store', [EventController::class, 'store'])->name('events.store');
Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
Route::get('/events/browse', [EventController::class, 'browse'])->name('events.browse');