<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CartController;
use App\Http\Middleware\ResetCoupon;
use App\Http\Middleware\RoleMiddleware;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/providers', [ProviderController::class, 'index'])->name('providers.index')->middleware(ResetCoupon::class);
Route::get('/providers/{id}', [ProviderController::class, 'show'])->name('providers.show');
Route::get('/providers/{provider}/items/filter', [ProviderController::class, 'filterItems'])->name('provider.items.filter');



Route::middleware([RoleMiddleware::class . ':admin'])->group(function () {
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
    Route::get('/items/{id}/history', [ItemController::class, 'showHistory'])->name('backOffice.items.history');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
    Route::post('/cart/add/{item}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::delete('/cart/remove/{item}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('/cart/confirm', [CartController::class, 'confirmCheckout'])->name('cart.confirmCheckout'); 
    Route::post('/cart/apply-coupon', [CartController::class, 'applyCoupon'])->name('cart.applyCoupon');
    Route::get('/history', [CartController::class, 'history'])->name('history');
    Route::get('/purchase-history/pdf', [CartController::class, 'generatePDF'])->name('purchase.pdf');

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
