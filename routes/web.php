<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Admin', function () {
    return view('backOffice.template');
});

Route::get('/blogs', [BlogController::class, 'index'])->name('frontOffice.blogs');

// Route to show the add blog form
Route::get('/AddBlog', [BlogController::class, 'create'])->name('blogs.add');

// Route to store the new blog
Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');

Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');
// Route to show the edit form
Route::get('/updateBlog{id}', [BlogController::class, 'edit'])->name('blogs.edit');

// Route to handle the update request
Route::put('/edit/{id}', [BlogController::class, 'update'])->name('blogs.update');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
