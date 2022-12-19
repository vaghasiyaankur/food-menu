<?php

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Manager\CategoryController;
use App\Http\Controllers\Manager\FloorController;
use App\Http\Controllers\Manager\ReportController;
use App\Http\Controllers\Manager\ProductController;
use App\Http\Controllers\Manager\SubCategoryController;
use App\Http\Controllers\Manager\SettingController;
use App\Http\Controllers\Manager\TableController;
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

Route::post('/register', [ReservationController::class, 'register']);

// ------------------------ Category Routes ------------------------ //

Route::post('/get-categories',[CategoryController::class, 'getCategories']);

Route::post('/get-categories-list',[CategoryController::class, 'getCategoriesList']);

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

Route::get('/sub-categories',[SubCategoryController::class, 'get_Subcategories']);


// ------------------------Setting Page Routes ------------------------ //

Route::get('setting-data',[SettingController::class, 'settingData']);

Route::post('update-setting',[SettingController::class, 'updateSetting']);

Route::get('table-list',[SettingController::class, 'tableList']);

Route::get('color-list',[SettingController::class, 'colorList']);

Route::get('check-color/{capacity}',[SettingController::class, 'checkColor']);

Route::get('table-data/{id}',[SettingController::class, 'tableData']);

Route::post('add-update-table',[SettingController::class, 'addUpdateTable']);

Route::post('/delete-table',[SettingController::class, 'deleteTable']);

Route::post('/change-table-status',[SettingController::class, 'changeTableStatus']);

Route::get('/member-limitation',[SettingController::class, 'memberLimitation']);


// ------------------------ Product Routes ------------------------ //

Route::post('/add-product',[ProductController::class, 'addSubCategory']);

Route::get('/get-category-products/{id}',[ProductController::class, 'getCategoryProduct']);

Route::get('/toggle-wishlist',[ProductController::class, 'toggleWishlist']);

Route::post('get-products',[ProductController::class, 'getProducts']);

Route::get('product/{id}',[ProductController::class, 'editProduct']);

Route::post('update-product',[ProductController::class, 'updateProduct']);

Route::post('/delete-product',[ProductController::class, 'deleteProduct']);

// ------------------------ Manager Table Page Routes ------------------------ //

Route::get('table-list-with-order',[TableController::class, 'tableList']);

Route::get('table-list-floor-wise/{id}',[TableController::class, 'tableListFloorWise']);

Route::post('change-order-table',[TableController::class, 'changeOrderTable']);

Route::post('change-floor-order',[TableController::class, 'changeFloorOrder']);

// ------------------------ Floor Routes ------------------------ //

Route::get('get-floors',[FloorController::class , 'getFloors']);

Route::get('get-floors-data',[FloorController::class , 'getFloorsData']);

Route::post('add-floor',[FloorController::class , 'addFloor']);

Route::get('floor-data/{id}',[FloorController::class, 'editFloorDetail']);

Route::post('delete-floor',[FloorController::class, 'deleteFloor']);

// ------------------------ Report Page Routes ------------------------ //

Route::get('/report-data',[ReportController::class, 'reportData']);

// ------------------------ Reservation Routes ------------------------ //

Route::post('/add-reservation',[ReservationController::class, 'addReservation']);

Route::get('/check-reservation',[ReservationController::class, 'checkReservation']);

Route::post('/change-reservation',[ReservationController::class, 'changeReservation']);

Route::post('/check-time',[ReservationController::class, 'checkTime']);

Route::post('/floor-available',[ReservationController::class, 'floorAvailable']);

Route::post('/waiting-time',[ReservationController::class, 'waitingTime']);

Route::post('/check-order',[ReservationController::class, 'checkOrder']);

Route::post('/cancel-reservation',[ReservationController::class, 'cancelReservation']);

Route::get('/reservation-list',[ReservationController::class, 'reservationList']);

Route::post('/remove-reservation',[ReservationController::class, 'removeReservation']);

Route::get('/reservation-detail/{id}',[ReservationController::class, 'reservationDetail']);

// ------------------------ Wishlist Routes ------------------------ //

Route::post('/get-wishlist',[FavoriteController::class, 'getWishlist']);

// ------------------------ Lauguage Routes ------------------------ //

Route::get('/get-languages',[LanguageController::class, 'getlangs']);

Route::post('get-language-translation',[LanguageController::class, 'getLangTranslation']);
