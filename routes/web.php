<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ItemController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/providers', [ProviderController::class, 'index'])->name('providers.index');
Route::get('/providers/{id}', [ProviderController::class, 'show'])->name('providers.show');
Route::get('/backOffice/home', [ProviderController::class, 'home'])->name('backOffice.providers.home');

Route::get('/backOffice/providers/create', [ProviderController::class, 'create'])->name('backOffice.providers.create');
Route::post('/backOffice/providers', [ProviderController::class, 'store'])->name('backOffice.providers.store');
Route::get('/backOffice/providers', [ProviderController::class, 'backOfficeIndex'])->name('backOffice.providers.index');
Route::get('/backOffice/providers/{id}/edit', [ProviderController::class, 'edit'])->name('backOffice.providers.edit');
Route::put('/backOffice/providers/{id}', [ProviderController::class, 'update'])->name('backOffice.providers.update');
Route::delete('/backOffice/providers/{id}', [ProviderController::class, 'destroy'])->name('backOffice.providers.destroy');

Route::get('backOffice/items/{item}/edit', [ItemController::class, 'edit'])->name('backOffice.items.edit');
Route::get('backOffice/items/create', [ItemController::class, 'create'])->name('backOffice.items.create');
Route::get('backOffice/items', [ItemController::class, 'index'])->name('backOffice.items.index');
Route::post('backOffice/items', [ItemController::class, 'store'])->name('backOffice.items.store');
Route::put('backOffice/items/{item}', [ItemController::class, 'update'])->name('backOffice.items.update');
Route::delete('backOffice/items/{item}', [ItemController::class, 'destroy'])->name('backOffice.items.destroy');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
 
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
