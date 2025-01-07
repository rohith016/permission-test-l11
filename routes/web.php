<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
    ProfileController,
    PaymentController,
    ProductController,
    NotificationController
};
use App\Enum\RoleEnum;

use App\Notifications\{
    Notification,
    SMSData,
    EmailChannel,
    SMSChannel,
    EmailData
};



Route::get('/check', function () {

    $result = Notification::channel(new EmailChannel())
            ->send(new EmailData('John Doe', 'john.doe@mail.com', '+9188888888'));

    dd($result);


});



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



    Route::resource('/users', UserController::class)->middleware('can:manage_users');

    Route::resource('/products', ProductController::class);
    // Route::get('/user', [UserController::class, 'index'])->name('user.index')->middleware(['role:'.RoleEnum::ADMIN->value]);
    // Route::get('/user', [UserController::class, 'index'])->name('user.index')->middleware('can:manage_users');
    // Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show')->middleware(['role:'. RoleEnum::ADMIN->value]);
    // Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show')->middleware('can:manage_users');
});

Route::get('test-pay', [PaymentController::class, 'store']);
Route::get('user-notification', [NotificationController::class, 'index']);
Route::get('notification-test', [NotificationController::class, 'test']);






require __DIR__.'/auth.php';
