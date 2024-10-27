<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ParticipationController;

// Route for listing all events
Route::get('/events', [EventController::class, 'index'])->name('events.index');
// Route for listing all events
Route::get('/Back/events', [EventController::class, 'Backindex'])->name('BackOffice.events.index');

// Route for showing the form to create a new event
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');

// Route for storing a new event
Route::post('/events', [EventController::class, 'store'])->name('events.store');

// Route for showing a single event
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');

// Route for showing the form to edit an event
Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');

// Route for updating an event
Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update');

// Route for deleting an event
Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');

// Route for participating in an event
Route::post('/events/{id}/participate', [EventController::class, 'participate'])->name('events.participate');
Route::get('/Back/events/{id}/participants', [ParticipationController::class, 'showParticipants'])->name('BackOffice.events.participants'); 
// Route for dynamic search by date
Route::get('/events/search', [EventController::class, 'searchByDate'])->name('events.search');

Route::get('/', function () {
    return view('welcome');
});

// Auth routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
