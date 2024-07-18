<?php

use App\Http\Controllers\SuperAdmin\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Super Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::view('/super-admin-login', 'admin.auth.login')->name('super-admin.auth');

Route::post('/super-admin/login', [AuthController::class, 'login'])->name('super-admin.login');

Route::group(['middleware' => 'superAdmin'], function () {
    Route::view('/', 'admin.page.dashboard')->name('super-admin.dashboard');
    Route::view('/users', 'admin.page.user')->name('super-admin.user');
    Route::view('/restaurant', 'admin.page.restaurant')->name('super-admin.restaurant');
    Route::view('/branch', 'admin.page.branch')->name('super-admin.branch');
    Route::view('/restaurant-status', 'admin.page.restaurant_request')->name('super-admin.restaurant-request');
});
