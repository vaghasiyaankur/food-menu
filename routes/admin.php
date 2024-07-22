<?php

use App\Http\Controllers\SuperAdmin\AuthController;
use App\Http\Controllers\SuperAdmin\ForgotPasswordController;
use App\Http\Controllers\SuperAdmin\RestaurantController;
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
Route::view('/forgot-password', 'admin.auth.forgot_password')->name('super-admin.forgot-password');

Route::name('super-admin.')->controller(AuthController::class)->group(function() {
    Route::post('login', 'login')->name('login');
    Route::get('logout', 'logout')->name('logout');
});

Route::controller(ForgotPasswordController::class)->group(function() {
    Route::post('/verify/email', 'sendResetLinkEmail')->name('super-admin.check-email');
    Route::get('password/reset/{token}', 'showResetForm')->name('password.reset');
    Route::post('password/reset', 'reset')->name('password.update');
});

Route::group(['middleware' => 'superAdmin'], function () {
    
    Route::view('/', 'admin.page.dashboard')->name('super-admin.dashboard');
    Route::view('/user/{restaurant_id}', 'admin.page.user')->name('super-admin.user');
    Route::view('/restaurant', 'admin.page.restaurant')->name('super-admin.restaurant');
    Route::view('/branch/{restaurant_id}', 'admin.page.branch')->name('super-admin.branch');
    Route::view('/restaurant-status', 'admin.page.restaurant_request')->name('super-admin.restaurant-request');
    Route::view('/profile', 'admin.page.profile')->name('super-admin.profile');
    
    Route::controller(UserController::class)->group(function() {
        Route::get('users-list', 'getUsers')->name('users.list');
        Route::get('/users/{user}/edit', 'editUser')->name('user.edit');

        Route::post('user-create-update', 'userCreateUpdate')->name('user.create-update');
        Route::post('user-delete', 'deleteUser')->name('user.delete');
    });

    Route::controller(RestaurantController::class)->group(function() {
        Route::get('restaurant-list', 'getRestaurants')->name('restaurants.list');
        Route::get('branch-list', 'getBranch')->name('branch.list');
        Route::post('branch-create', 'createBranch')->name('branch.create');
        Route::post('branch-delete', 'deleteBranch')->name('branch.delete');
    });
});
