<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('frontOffice.home');
});
Route::get('/contact', function () {
    return view('frontOffice.contact');
});
Route::get('/Admin', function () {
    return view('backOffice.template');
});

Route::get('/blogs', [BlogController::class, 'index'])->name('frontOffice.blogs');


Route::middleware(['auth'])->group(function () {
    Route::get('/Admin/blogs', [BlogController::class, 'getBlogs'])->name('backOffice.blogs');

// Route to show the add blog form
    Route::get('/AddBlog', [BlogController::class, 'create'])->name('blogs.add');

// Route to store the new blog
    Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');

    Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');
    Route::delete('/Admin/blogs/{id}', [BlogController::class, 'delete'])->name('blogs.delete');
// Route to show the edit form
    Route::get('/updateBlog{id}', [BlogController::class, 'edit'])->name('blogs.edit');

// Route to handle the update request
    Route::put('/edit/{id}', [BlogController::class, 'update'])->name('blogs.update');


    Route::post('/blogs/{blog}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::put('/blogs/{blog}/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/blogs/{blog}/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::delete('Admin/blogs/{blog}/comments/{comment}', [CommentController::class, 'delete'])->name('comments.delete');

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
