<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController, ProfileController
};
use App\Enum\RoleEnum;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Route::get('/user', [UserController::class, 'index'])->name('user.index')->middleware(['role:'.RoleEnum::ADMIN->value]);
    Route::get('/user', [UserController::class, 'index'])->name('user.index')->middleware('can:manage_users');
    // Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show')->middleware(['role:'. RoleEnum::ADMIN->value]);
    Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show')->middleware('can:manage_users');
});

require __DIR__.'/auth.php';
