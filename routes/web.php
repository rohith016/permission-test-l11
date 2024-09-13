<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function () {
    echo phpinfo();
});

Route::get("/sample", [UserController::class, 'getRequest'])->name('sample');
