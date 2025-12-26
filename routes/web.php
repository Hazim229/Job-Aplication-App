<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

// Default welcome page
Route::get('/', function () {
    return view('welcome');
});

// Job listing (UI 2)
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');

// Job details (UI 3)
Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');

// Create job (UI 4)
Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');

// Store new job
Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');

// Edit job (UI 5)
Route::get('/jobs/{id}/edit', [JobController::class, 'edit'])->name('jobs.edit');

// Update job
Route::put('/jobs/{id}', [JobController::class, 'update'])->name('jobs.update');

// Delete job
Route::delete('/jobs/{id}', [JobController::class, 'destroy'])->name('jobs.destroy');
