<?php

use App\Http\Controllers\Priest\DashboardController;
use App\Http\Controllers\Priest\ProfileController;
use App\Http\Controllers\Priest\RecordController;
use App\Http\Controllers\Priest\ScheduleController;
use Illuminate\Support\Facades\Route;

// Priest Routes
Route::middleware(['auth', 'verified'])->prefix('priest')->name('priest.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Schedule Management (Review & Approve/Decline)
    Route::get('schedule', [ScheduleController::class, 'index'])->name('schedule.index');
    Route::get('schedule/calendar', [ScheduleController::class, 'calendar'])->name('schedule.calendar');
    Route::get('schedule/{schedule}', [ScheduleController::class, 'show'])->name('schedule.show');
    Route::patch('schedule/{schedule}/approve', [ScheduleController::class, 'approve'])->name('schedule.approve');
    Route::patch('schedule/{schedule}/decline', [ScheduleController::class, 'decline'])->name('schedule.decline');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // View Records (Read-only)
    // Route::get('records/baptismal', [RecordController::class, 'baptismal'])->name('records.baptismal');
    // Route::get('records/baptismal/{baptismal}', [RecordController::class, 'showBaptismal'])->name('records.baptismal.show');

    // Route::get('records/burial', [RecordController::class, 'burial'])->name('records.burial');
    // Route::get('records/burial/{burial}', [RecordController::class, 'showBurial'])->name('records.burial.show');

    // Route::get('records/confirmation', [RecordController::class, 'confirmation'])->name('records.confirmation');
    // Route::get('records/confirmation/{confirmation}', [RecordController::class, 'showConfirmation'])->name('records.confirmation.show');

    // Route::get('records/wedding', [RecordController::class, 'wedding'])->name('records.wedding');
    // Route::get('records/wedding/{wedding}', [RecordController::class, 'showWedding'])->name('records.wedding.show');
});
