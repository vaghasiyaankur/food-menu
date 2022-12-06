<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Manager\CategoryController;
use App\Http\Controllers\Manager\SubCategoryController;
use App\Http\Controllers\Manager\SettingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);

// ------------------------ Category Routes ------------------------ //

Route::post('/get-categories',[CategoryController::class, 'getCategories']);

Route::post('add-category',[CategoryController::class, 'addCategory']);

Route::get('/get-category/{id}', [CategoryController::class, 'getCategory']);

Route::post('update-category',[CategoryController::class, 'updateCategory']);

Route::post('/delete-category',[CategoryController::class, 'deleteCategory']);

Route::get('/categories',[CategoryController::class, 'get_categories']);

// ------------------------ Sub Category Routes ------------------------ //


Route::post('/add-sub-category',[SubCategoryController::class, 'addSubCategory']);

Route::post('/get-sub-categories',[SubCategoryController::class, 'getSubCategories']);

Route::get('get-sub-category/{id}',[SubCategoryController::class, 'getSubCategory']);

Route::post('update-sub-category',[SubCategoryController::class, 'updateSubCategory']);

Route::post('/delete-sub-category',[SubCategoryController::class, 'deleteSubCategory']);



// ------------------------Setting Page Routes ------------------------ //

Route::get('setting-data',[SettingController::class, 'settingData']);

Route::post('update-setting',[SettingController::class, 'updateSetting']);

Route::get('table-list',[SettingController::class, 'tableList']);

Route::get('table-data/{id}',[SettingController::class, 'tableData']);

Route::post('add-update-table',[SettingController::class, 'addUpdateTable']);

Route::post('/delete-table',[SettingController::class, 'deleteTable']);

Route::post('/change-table-status',[SettingController::class, 'changeTableStatus']);

