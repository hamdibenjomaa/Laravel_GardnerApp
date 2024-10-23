<?php

use App\Http\Controllers\JardinierController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('')->controller(JardinierController::class)->group(function(){
    Route::get('jardinier-home', 'home')->name('jardinier.home');
    Route::get('jardinier', 'index')->name('jardinier.index');
    Route::get('jardinier-admin', 'indexAdmin')->name('jardinier.indexAdmin');
    Route::get('jardinier-create', 'create')->name('jardinier.create');
    Route::post('jardinier-store', 'store')->name('jardinier.store');
    Route::get('jardinier-edit-{jardinierId}', 'edit')->name('jardinier.edit');
    Route::post('jardinier-update/{jardinierId}','update')->name('jardinier.update');
    Route::delete('jardinier-delete/{jardinierId}', 'destroy')->name('jardinier.destroy');
    Route::get('jardinier-show-{jardinierId}', 'show')->name('jardinier.show');
    Route::get('jardinier-showadmin-{jardinierId}', 'showAdmin')->name('jardinier.showAdmin');
});
Route::prefix('')->controller(ReservationController::class)->group(function(){
    Route::get('reservation', 'index')->name('reservation.index');
    Route::get('reservation-create', 'create')->name('reservation.create');
    Route::post('reservation/store', 'store')->name('reservation.store');
    Route::get('reservation-edit-{reservationId}', 'edit')->name('reservation.edit');
    Route::post('reservation-update/{reservationId}','update')->name('reservation.update');
    Route::delete('reservation/delete/{reservationId}', 'destroy')->name('reservation.destroy');
    Route::get('reservation-show-{reservationId}', 'show')->name('reservation.show');
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
