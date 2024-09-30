<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\InscriptionController;
Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('formations', FormationController::class);


Route::get('forms', [FormationController::class, 'frontofficeIndex'])->name('forms');
Route::get('/frontoffice/formations/{id}', [FormationController::class, 'showformation'])->name('frontoffice.formations.show');

Route::get('/inscription', [InscriptionController::class, 'create'])->name('inscriptions.create');
Route::post('/inscriptions', [InscriptionController::class, 'store'])->name('inscriptions.store');
Route::get('/inscrits', [InscriptionController::class, 'index'])->name('inscriptions.index');

Route::delete('/inscriptions/{id}', [InscriptionController::class, 'destroy'])->name('inscriptions.destroy');


Route::post('/inscriptions/{id}/accept', [InscriptionController::class, 'accept'])->name('inscriptions.accept');

Route::get('/test-email', function () {
    $inscription = new \App\Models\Inscription(); // Just create a dummy inscription or fetch one
    $inscription->email = 'your-email@example.com'; // Set the recipient email
    
    Mail::to($inscription->email)->send(new \App\Mail\InscriptionAccepted($inscription));

    return 'Email sent!';
});


