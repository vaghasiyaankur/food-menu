<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrCodeController;
use Illuminate\Support\Facades\Auth;
use App\Events\NewReservation;
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
// Route::get('/abc', function() {
//     return view('test');
// });
Route::get('login', function() {
 Auth::attempt(['email' => 'manager1@gmail.com', 'password' => '123456789']);
});
Route::any('/abc', function() {
    $order = Order::first();
    $a = broadcast(new NewReservation( $order ,1 ))->toOthers();

});
Route::get('/qrcode', [QrCodeController::class, 'index']);
Route::post('/fcm-token', [\App\Http\Controllers\NotificationController::class, 'updateToken'])->name('fcmToken');
Route::post('/send-notification',[\App\Http\Controllers\NotificationController::class,'notification'])->name('notification');
Route::get('/test', [\App\Http\Controllers\NotificationController::class,'notification']);
Route::get('/manager', function () {
    return view('restaurant_manager');
})->where('any', '.*');

Route::get('/manager/{any}', function () {
    return view('restaurant_manager');
})->where('any', '.*');


Route::get('/pos', function () {
    return view('pos');
})->where('any', '.*');

Route::get('/pos/{any}', function () {
    return view('pos');
})->where('any', '.*');


Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');
