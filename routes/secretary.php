<?php

use App\Http\Controllers\Secretary\BaptismalController;
use App\Http\Controllers\Secretary\BurialController;
use App\Http\Controllers\Secretary\ConfirmationController;
use App\Http\Controllers\Secretary\DashboardController;
use App\Http\Controllers\Secretary\ScheduleController;
use App\Http\Controllers\Secretary\WeddingController;
use Illuminate\Support\Facades\Route;

// Secretary Routes
Route::middleware(['auth', 'verified'])->prefix('secretary')->name('secretary.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Baptismal Records Management
    Route::resource('baptismal', BaptismalController::class);

    // Burial Records Management
    Route::resource('burial', BurialController::class);

    // Confirmation Records Management
    Route::resource('confirmation', ConfirmationController::class);

    // Wedding Records Management
    Route::resource('wedding', WeddingController::class);

    // Schedule Management
    Route::get('schedule/calendar', [ScheduleController::class, 'calendar'])->name('schedule.calendar');
    Route::resource('schedule', ScheduleController::class);
    Route::patch('schedule/{schedule}/status', [ScheduleController::class, 'updateStatus'])->name('schedule.updateStatus');
});
