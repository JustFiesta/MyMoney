<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\GoalController;
use App\Http\Middleware\Middleware;
use App\Http\Controllers\Admin\AdminUserController;

Route::get('/', [UserController::class, 'index']);

Route::get('/home', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

Route::get('/view-budget', [FinanceController::class, 'index'])->middleware(['auth', 'verified'])->name('view-budget');

// Finances CRUD routes
Route::middleware('auth')->group(function () {
    Route::get('/finances/create', [FinanceController::class, 'create'])->name('finances.create');
    Route::post('/finances', [FinanceController::class, 'store'])->name('finances.store');
    Route::delete('/finances/{id}', [FinanceController::class, 'destroy'])->name('finances.destroy');
    Route::get('/finances/{id}/edit', [FinanceController::class, 'edit'])->name('finances.edit');
    Route::put('/finances/{id}', [FinanceController::class, 'update'])->name('finances.update');
});

// Goals CRUD routes (read is placed in finances)
Route::middleware('auth')->group(function () {
    Route::get('/goals/create', [GoalController::class, 'create'])->name('goals.add');
    Route::post('/goals', [GoalController::class, 'store'])->name('goals.store');
    Route::delete('/goals/{id}', [GoalController::class, 'destroy'])->name('goals.destroy');
    Route::get('/goals/{id}/edit', [GoalController::class, 'edit'])->name('goals.edit');
    Route::put('/goals/{id}', [GoalController::class, 'update'])->name('goals.update');
});

// Admin crud routes
Route::middleware('auth')->group(function () {
    Route::middleware([Middleware::class])->group(function () {

        // Routes for CRUD - user table 
        Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users');
        Route::get('/admin/users', [AdminUserController::class, 'create'])->name('admin.user.create');
        Route::post('/admin/users', [AdminUserController::class, 'store'])->name('admin.user.store');
        Route::get('/admin/users/{id}/edit', [AdminUserController::class, 'edit'])->name('admin.user.edit');
        Route::put('/admin/users/{id}', [AdminUserController::class, 'update'])->name('admin.user.update');
        Route::delete('/admin/users/delete/{user}', [AdminUserController::class, 'destroy'])->name('admin.user.destroy');

        // Routes for CRUD - finances table
    //     // Route::resource('/admin/users/finances', AdminFinanceController::class);
    //     Route::get('/admin/users/finances', [AdminFinanceController::class, 'index'])->name('admin.finances');
    //     Route::get('/admin/users/finances/create', [AdminFinanceController::class, 'create'])->name('admin.finance.create');
    //     Route::post('/admin/users/finances', [AdminFinanceController::class, 'store'])->name('admin.finance.store');
    //     Route::get('/admin/users/finances/{id}/edit', [AdminFinanceController::class, 'edit'])->name('admin.finance.edit');
    //     Route::put('/admin/users/finances/{id}', [AdminFinanceController::class, 'update'])->name('admin.finance.update');
    //     Route::delete('/admin/users/finances/{id}', [AdminFinanceController::class, 'destroy'])->name('admin.finance.destroy');

        //  Routes for CRUD - goals table
    //     // Routes for goal management
    //     Route::get('/admin/users/goal', [AdminGoalController::class, 'index'])->name('admin.goals');
    //     Route::get('/admin/users/goal/create', [AdminGoalController::class, 'create'])->name('admin.goal.create');
    //     Route::post('/admin/users/goal', [AdminGoalController::class, 'store'])->name('admin.goal.store');
    //     Route::get('/admin/users/goal/{id}/edit', [AdminGoalController::class, 'edit'])->name('admin.goal.edit');
    //     Route::put('/admin/users/goal/{id}', [AdminGoalController::class, 'update'])->name('admin.goal.update');
    //     Route::delete('/admin/users/goal/{id}', [AdminGoalController::class, 'destroy'])->name('admin.goal.destroy');

    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::fallback(function (){
    return view('error-404');
});

require __DIR__.'/auth.php';
