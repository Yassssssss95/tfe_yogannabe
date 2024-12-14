<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RetreatController;
use App\Http\Controllers\CustomerController;


Route::get('/maps', function(){
    return view('maps');
})->name('maps');

Route::get('/hello', function(){
    return view('hello');
})->name('hello');

Route::controller(RetreatController::class)->name('retreat.')->group(function () {
    Route::get('retreat/index','index')->name('index'); //retreat.index
    Route::get('retreat/create','create')->name('create');//retreat.create
    Route::post('retreat/store', 'store')->name('store');//retreat.store
    Route::get('retreat/edit/{id}', 'edit')->name('edit');//retreat.edit
    Route::put('retreat/update/{id}', 'update')->name('update');//retreat.update
    Route::get('retreat/show/{id}', 'show')->name('show');//retreat.show
    Route::delete('retreat/delete/{id}', 'destroy')->name('delete');//retreat.delete

});

Route::controller(CustomerController::class)->name('customer.')->group(function () {
    Route::get('customer/index','index')->name('index'); //customer.index
    Route::get('customer/create','create')->name('create');//customer.create
    Route::post('customer/store', 'store')->name('store');//customer.store
    Route::get('customer/edit/{id}', 'edit')->name('edit');//customer.edit
    Route::put('customer/update/{id}', 'update')->name('update');//customer.update
    Route::get('customer/show/{id}', 'show')->name('show');//customer.show
    Route::delete('customer/delete/{id}', 'destroy')->name('delete');//customer.delete

});

