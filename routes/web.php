<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\ResponseController;



Route::get('/', function () {
    return view('frontOffice.home');
});

Route::get('/Admin', function () {
    return view('backOffice.template');
});
Route::resource('reclamations', ReclamationController::class);
Route::get('/reclamations', [ReclamationController::class, 'index'])->name('frontOffice.reclamations');
    Route::get('/Addrec', [ReclamationController::class, 'create'])->name('reclamations.add');
    Route::get('/updateReclamations{id}', [ReclamationController::class, 'edit'])->name('reclamations.edit');
    Route::delete('/reclamations/{id}', [ReclamationController::class, 'destroy'])->name('reclamations.destroy');

// Nested resource route for responses under reclamations
Route::resource('reclamations.responses', ResponseController::class)->shallow();

// Named Routes for specific actions related to responses
Route::get('/reclamations/{reclamation}/responses', [ResponseController::class, 'index'])->name('reclamations.responses.index');
Route::get('/reclamations/{reclamation}/responses/create', [ResponseController::class, 'create'])->name('reclamations.responses.create');
Route::post('/reclamations/{reclamation}/responses', [ResponseController::class, 'store'])->name('reclamations.responses.store');
Route::get('/reclamations/{reclamation}/responses/{response}/edit', [ResponseController::class, 'edit'])->name('reclamations.responses.edit');
Route::put('/reclamations/{reclamation}/responses/{response}', [ResponseController::class, 'update'])->name('reclamations.responses.update');
Route::delete('/responses/{response}', [ResponseController::class, 'destroy'])->name('reclamations.responses.destroy');





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});