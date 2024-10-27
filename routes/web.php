<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CartController;
use App\Http\Middleware\ResetCoupon;
use App\Http\Middleware\RoleMiddleware;

use App\Http\Controllers\JardinierController;
use App\Http\Controllers\ReservationController;


use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;

use App\Http\Controllers\FormationController;
use App\Http\Controllers\InscriptionController;

use App\Http\Controllers\ReclamationController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\ProfileController;


use App\Http\Controllers\EventController;
use App\Http\Controllers\ParticipationController;


Route::get('/', function () {
    return view('welcome');
});
// amine
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


// tarek 
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


// molka 

Route::prefix('')->controller(JardinierController::class)->group(function(){
    Route::get('jardinier-home', 'home')->name('jardinier.home');
    Route::get('jardinier', 'index')->name('jardinier.index');
    Route::get('jardiniers/autocomplete', 'autocomplete')->name('jardinier.autocomplete');
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


// hamdi 


Route::get('/contact', function () {
    return view('frontOffice.contact');
})->name('frontOffice.contact');


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


// skander 

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
Route::get('/backoffice/reclamations', [ReclamationController::class, 'home'])->name('reclamations.index1');



// ghada 

// Route for listing all events
Route::get('/events', [EventController::class, 'index'])->name('events.index');
// Route for listing all events
Route::get('/Back/events', [EventController::class, 'Backindex'])->name('BackOffice.events.index');

// Route for showing the form to create a new event
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');

// Route for storing a new event
Route::post('/events', [EventController::class, 'store'])->name('events.store');

// Route for showing a single event
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');

// Route for showing the form to edit an event
Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');

// Route for updating an event
Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update');

// Route for deleting an event
Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');

// Route for participating in an event
Route::post('/events/{id}/participate', [EventController::class, 'participate'])->name('events.participate');
Route::get('/Back/events/{id}/participants', [ParticipationController::class, 'showParticipants'])->name('BackOffice.events.participants'); 
// Route for dynamic search by date
Route::get('/events/search', [EventController::class, 'searchByDate'])->name('events.search');
