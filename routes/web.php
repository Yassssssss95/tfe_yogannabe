<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RetreatController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;

// Route page d'accueil
Route::get('/', [HomeController::class, 'index'])->name('home');

// Routes existantes pour maps et hello
Route::get('/maps', function(){
    return view('maps');
})->name('maps');

Route::get('/hello', function(){
    return view('hello');
})->name('hello');

// Routes admin
Route::prefix('admin')->name('admin.')->group(function () {
    // Dashboard admin
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Routes pour les retraites dans l'admin
    Route::controller(RetreatController::class)->prefix('retreats')->name('retreats.')->group(function () {
        Route::get('/', 'adminIndex')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::get('/show/{id}', 'show')->name('show');
        Route::delete('/delete/{id}', 'destroy')->name('delete');
    });

    // Route pour les réservations admin
    Route::get('/bookings', function () {
        return view('admin.bookings.index');
    })->name('bookings');

       // Routes pour les réservations
       Route::controller(BookingController::class)->prefix('bookings')->name('bookings.')->group(function () {
        Route::get('/', 'adminIndex')->name('index');
        Route::put('/{booking}/confirm', 'confirm')->name('confirm');
        Route::put('/{booking}/cancel', 'cancel')->name('cancel');
    });

});

Route::get('/retreats', [RetreatController::class, 'publicIndex'])->name('retreats.index');
Route::get('/retreats/{retreat}', [RetreatController::class, 'publicShow'])->name('retreats.show');

// Routes publiques pour les customers
Route::controller(CustomerController::class)->name('customer.')->group(function () {
    Route::get('customer/index','index')->name('index');
    Route::get('customer/create','create')->name('create');
    Route::post('customer/store', 'store')->name('store');
    Route::get('customer/edit/{id}', 'edit')->name('edit');
    Route::put('customer/update/{id}', 'update')->name('update');
    Route::get('customer/show/{id}', 'show')->name('show');
    Route::delete('customer/delete/{id}', 'destroy')->name('delete');
});

// Routes publiques pour les réservations
Route::middleware(['auth'])->group(function () {
    Route::get('booking/form', [BookingController::class, 'form'])->name('booking.form');
    Route::post('booking/store', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/mes-reservations', [BookingController::class, 'myBookings'])->name('my-bookings');

});