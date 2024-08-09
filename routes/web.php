<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrCodeController;
use Illuminate\Support\Facades\Auth;
use App\Events\NewReservation;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Models\Order;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/qrcode', [QrCodeController::class, 'index']);
Route::post('/fcm-token', [\App\Http\Controllers\NotificationController::class, 'updateToken'])->name('fcmToken');
Route::post('/send-notification',[\App\Http\Controllers\NotificationController::class,'notification'])->name('notification');
Route::get('/test', [\App\Http\Controllers\NotificationController::class,'notification']);
Route::view('user-mail', 'admin.emails.restaurant_verification');

Route::middleware('alreadyLogin')->group(function () {
    Route::get('/user', [UserController::class, 'login'])->name('login');
});

Route::get('/sign-up', [UserController::class, 'signup'])->name('signup');

Route::middleware('auth')->group(function () {

    Route::get('/manager', [UserController::class, 'manager'])->name('manager');
    Route::get('/manager/{any}', [UserController::class, 'manager'])->name('manager.any');

    Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
    Route::get('/admin/{any}', [AdminController::class, 'admin'])->name('admin.any');

    Route::get('/pos', [UserController::class, 'pos'])->name('pos');
    Route::get('/pos/{any}', [UserController::class, 'pos'])->name('pos.any');

});


Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');
