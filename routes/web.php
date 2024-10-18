<?php

use App\Http\Controllers\JardinierController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jardinier', [JardinierController::class,'index'])->name('jardinier.index');
Route::get('/reservation', [ReservationController::class,'index'])->name('reservation.index');
Route::get('/jardinier/create', [JardinierController::class,'create'])->name('jardinier.create');
Route::get('/reservation/create', [ReservationController::class,'create'])->name('reservation.create');
Route::post('/jardinier/store', [JardinierController::class,'store'])->name('jardinier.store');
Route::post('/reservation/store', [ReservationController::class,'store'])->name('reservation.store');
Route::get('/jardinier/edit/{id}', [JardinierController::class,'edit'])->name('jardinier.edit');
Route::get('/reservation/edit/{id}', [ReservationController::class,'edit'])->name('reservation.edit');
Route::post('/jardinier/update/{id}', [JardinierController::class,'update'])->name('jardinier.update');
Route::post('/reservation/update/{id}', [ReservationController::class,'update'])->name('reservation.update');
Route::delete('/jardinier/delete/{id}', [JardinierController::class,'destroy'])->name('jardinier.destroy');
Route::delete('/reservation/delete/{id}', [ReservationController::class,'destroy'])->name('reservation.destroy');
Route::get('/jardinier/show/{id}', [JardinierController::class,'show'])->name('jardinier.show');
Route::get('/reservation/show/{id}', [ReservationController::class,'show'])->name('reservation.show');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
