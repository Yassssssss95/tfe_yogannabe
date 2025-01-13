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

// Routes pour les retraites
Route::controller(RetreatController::class)->name('retreat.')->group(function () {
    Route::get('retreat/index','index')->name('index');
    Route::get('retreat/create','create')->name('create');
    Route::post('retreat/store', 'store')->name('store');
    Route::get('retreat/edit/{id}', 'edit')->name('edit');
    Route::put('retreat/update/{id}', 'update')->name('update');
    Route::get('retreat/show/{id}', 'show')->name('show');
    Route::delete('retreat/delete/{id}', 'destroy')->name('delete');
});

// Routes pour les customers
Route::controller(CustomerController::class)->name('customer.')->group(function () {
    Route::get('customer/index','index')->name('index');
    Route::get('customer/create','create')->name('create');
    Route::post('customer/store', 'store')->name('store');
    Route::get('customer/edit/{id}', 'edit')->name('edit');
    Route::put('customer/update/{id}', 'update')->name('update');
    Route::get('customer/show/{id}', 'show')->name('show');
    Route::delete('customer/delete/{id}', 'destroy')->name('delete');
});

// Nouvelles routes pour les réservations
Route::controller(BookingController::class)->name('booking.')->group(function () {
    Route::get('booking/form', 'form')->name('form');
    Route::post('booking/store', 'store')->name('store');
});