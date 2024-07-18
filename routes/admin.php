<?php

use App\Http\Controllers\SuperAdmin\AuthController;
use App\Http\Controllers\SuperAdmin\UserController;
use Illuminate\Support\Facades\Route;

/**
*--------------------------------------------------------------------------
* Super Admin Routes
*--------------------------------------------------------------------------
*
*  This file contains all the routes for the admin panel of the application.
*  These routes are intended for administrative tasks such as managing users,
*  branches, restaurant, and other high-level operations that are restricted to
*  admin users. Ensure that proper authentication and authorization checks are
*  applied to all routes defined here.
*
*/

Route::view('/super-admin-login', 'admin.auth.login')->name('super-admin.auth');

Route::post('/super-admin/login', [AuthController::class, 'login'])->name('super-admin.login');
Route::get('/super-admin/logout', [AuthController::class, 'logout'])->name('super-admin.logout');


Route::group(['middleware' => 'superAdmin'], function () {
    Route::view('/', 'admin.page.dashboard')->name('super-admin.dashboard');
    Route::get('users/list', [UserController::class, 'getUsers'])->name('users.list');
    Route::view('/users', 'admin.page.user')->name('super-admin.user');
    Route::view('/restaurant', 'admin.page.restaurant')->name('super-admin.restaurant');
    Route::view('/branch', 'admin.page.branch')->name('super-admin.branch');
    Route::view('/restaurant-status', 'admin.page.restaurant_request')->name('super-admin.restaurant-request');
    Route::view('/profile', 'admin.page.profile')->name('super-admin.profile');
});
