<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\ResponseController;

Route::get('/', function () {
    return view('frontOffice.home');
});

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('reclamations', ReclamationController::class);
// BackOffice section for reclamations
Route::prefix('backOffice')->middleware('auth')->group(function () {
    Route::get('/reclamations', [ReclamationController::class, 'home'])->name('backOffice.reclamations.home');
    Route::get('/Addrec', [ReclamationController::class, 'create'])->name('reclamations.add');
    Route::get('/reclamations/{id}/edit', [ReclamationController::class, 'editResponse'])->name('backOffice.Reclamation.edit');
    Route::put('/reclamations/{id}/update', [ReclamationController::class, 'updateResponse'])->name('backOffice.Reclamation.update');

     Route::delete('/reclamations/{id}', [ReclamationController::class, 'destroy'])->name('reclamations.destroy');
});    

Route::get('/Addrec', [ReclamationController::class, 'create'])->name('reclamations.add');
    Route::get('/updateReclamations/{id}', [ReclamationController::class, 'edit'])->name('reclamations.edit');
    Route::delete('/reclamations/{id}', [ReclamationController::class, 'destroy'])->name('reclamations.destroy');

// Nested resource route for responses under reclamations
Route::resource('reclamations.responses', ResponseController::class)->shallow();

// Named Routes for specific actions related to responses
Route::get('/reclamations/{reclamation}/responses', [ResponseController::class, 'index'])->name('reclamations.responses.index');
Route::get('/reclamations/{reclamation}/responses/create', [ResponseController::class, 'create'])->name('reclamations.responses.create');
Route::post('/reclamations/{reclamation}/responses', [ResponseController::class, 'store'])->name('reclamations.responses.store');
Route::get('/reclamations/{reclamation}/responses/{response}/edit', [ResponseController::class, 'edit'])->name('reclamations.responses.edit');
Route::put('/reclamations/{reclamation}/responses/{response}', [ResponseController::class, 'update'])->name('reclamations.responses.update');
Route::delete('/reclamations/{reclamation}/responses/{response}', [ResponseController::class, 'destroy'])->name('reclamations.responses.destroy');


Route::delete('/backoffice/reclamations/{reclamation}/responses/{response}', [ResponseController::class, 'destroy1'])->name('backOffice.responses.destroy1');  

Route::prefix('backOffice/reclamations')->name('backOffice.reclamations.')->group(function () {
    Route::get('{reclamation_id}/responses', [ResponseController::class, 'showBackOfficeResponses'])
        ->name('responses.show');
});
Route::post('/backoffice/reclamations/{reclamation_id}/responses', [ResponseController::class, 'storeResponse'])->name('backOffice.responses.store');
Route::get('/backoffice/reclamations/{reclamation_id}/responses/create', [ResponseController::class, 'createResponse'])->name('backOffice.responses.create');


require __DIR__.'/auth.php';

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});