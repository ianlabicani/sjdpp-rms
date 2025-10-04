<?php

use App\Http\Controllers\Secretary\BaptismalController;
use App\Http\Controllers\Secretary\BurialController;
use App\Http\Controllers\Secretary\ConfirmationController;

// Secretary Routes
Route::middleware(['auth', 'verified'])->prefix('secretary')->name('secretary.')->group(function () {
    Route::get('/dashboard', function () {
        return view('secretary.dashboard');
    })->name('dashboard');

    // Baptismal Records Management
    Route::resource('baptismal', BaptismalController::class);

    // Burial Records Management
    Route::resource('burial', BurialController::class);

    // Confirmation Records Management
    Route::resource('confirmation', ConfirmationController::class);
});
