<?php

use App\Http\Controllers\Secretary\BaptismalController;

// Secretary Routes
Route::middleware(['auth', 'verified'])->prefix('secretary')->name('secretary.')->group(function () {
    Route::get('/dashboard', function () {
        return view('secretary.dashboard');
    })->name('dashboard');

    // Baptismal Records Management
    Route::resource('baptismal', BaptismalController::class);
});
