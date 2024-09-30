<?php

use App\Http\Controllers\JardinierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jardinier', [JardinierController::class,'index'])->name('jardinier.index');
Route::get('/jardinier/create', [JardinierController::class,'create']);
Route::post('/jardinier/store', [JardinierController::class,'store'])->name('jardinier.store');
Route::delete('/jardinier/delete/{id}', [JardinierController::class,'destroy'])->name('jardinier.destroy');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
