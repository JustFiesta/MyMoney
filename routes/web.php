<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\GoalController;

Route::get('/', [UserController::class, 'index']);

Route::get('/home', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

Route::get('/view-budget', [FinanceController::class, 'index'])->middleware(['auth', 'verified'])->name('view-budget');

// Finances CRUD routes
Route::get('/finances/create', [FinanceController::class, 'create'])->middleware(['auth', 'verified'])->name('finances.create');
Route::post('/finances', [FinanceController::class, 'store'])->middleware(['auth', 'verified'])->name('finances.store');
Route::delete('/finances/{id}', [FinanceController::class, 'destroy'])->middleware(['auth', 'verified'])->name('finances.destroy');
Route::get('/finances/{id}/edit', [FinanceController::class, 'edit'])->middleware(['auth', 'verified'])->name('finances.edit');
Route::put('/finances/{id}', [FinanceController::class, 'update'])->middleware(['auth', 'verified'])->name('finances.update');

// Goals CRUD routes (read is placed in finances)
Route::get('/goals/create', [GoalController::class, 'create'])->middleware(['auth', 'verified'])->name('goals.add');
Route::post('/goals', [GoalController::class, 'store'])->middleware(['auth', 'verified'])->name('goals.store');
Route::delete('/goals/{id}', [GoalController::class, 'destroy'])->middleware(['auth', 'verified'])->name('goals.destroy');
Route::get('/goals/{id}/edit', [GoalController::class, 'edit'])->middleware(['auth', 'verified'])->name('goals.edit');
Route::put('/goals/{id}', [GoalController::class, 'update'])->middleware(['auth', 'verified'])->name('goals.update');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
