<?php

use App\Http\Controllers\JardinierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jardinier', [JardinierController::class,'index'])->name('jardinier.index');
Route::get('/jardinier/create', [JardinierController::class,'create'])->name('jardinier.create');
Route::post('/jardinier/store', [JardinierController::class,'store'])->name('jardinier.store');
Route::get('/jardinier/edit/{id}', [JardinierController::class,'edit'])->name('jardinier.edit');
Route::post('/jardinier/update/{id}', [JardinierController::class,'update'])->name('jardinier.update');
Route::delete('/jardinier/delete/{id}', [JardinierController::class,'destroy'])->name('jardinier.destroy');
Route::get('/jardinier/show/{id}', [JardinierController::class,'show'])->name('jardinier.show');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
