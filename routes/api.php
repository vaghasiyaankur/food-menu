<?php

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Manager\AuthController;
use App\Http\Controllers\Manager\CategoryController;
use App\Http\Controllers\Manager\ComboController;
use App\Http\Controllers\Manager\CouponController;
use App\Http\Controllers\Manager\UpiController;
use App\Http\Controllers\Manager\FloorController;
use App\Http\Controllers\Manager\IngredientController;
use App\Http\Controllers\Manager\OrderController;
use App\Http\Controllers\Manager\PosController;
use App\Http\Controllers\Manager\ReportController;
use App\Http\Controllers\Manager\ProductController;
use App\Http\Controllers\Manager\SubCategoryController;
use App\Http\Controllers\Manager\SettingController;
use App\Http\Controllers\Manager\TableController;
use App\Http\Controllers\Manager\VariationController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\TaxSettingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\AdminController;

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

Route::post('/get-category-list',[CategoryController::class, 'getCategoryList']);

Route::post('add-category',[CategoryController::class, 'addCategory']);

Route::get('/get-category/{id}', [CategoryController::class, 'getCategory']);

Route::post('update-category',[CategoryController::class, 'updateCategory']);

Route::post('/delete-category',[CategoryController::class, 'deleteCategory']);

Route::get('/categories',[CategoryController::class, 'get_categories']);

// ------------------------ Sub Category Routes ------------------------ //

Route::post('/add-sub-category',[SubCategoryController::class, 'addSubCategory']);

Route::get('/get-sub-categories-list',[SubCategoryController::class, 'getSubCategoriesList']);

Route::post('/get-sub-categories',[SubCategoryController::class, 'getSubCategories']);

Route::get('get-sub-category/{id}',[SubCategoryController::class, 'getSubCategory']);

Route::post('update-sub-category',[SubCategoryController::class, 'updateSubCategory']);

Route::post('/delete-sub-category',[SubCategoryController::class, 'deleteSubCategory']);

Route::get('/sub-categories',[SubCategoryController::class, 'get_Subcategories']);

// ------------------------ Ingredient Routes ------------------------ //

Route::post('/get-ingredients',[IngredientController::class, 'getIngredients']);

Route::post('add-ingredient',[IngredientController::class, 'addIngredient']);

Route::get('/get-ingredient/{id}', [IngredientController::class, 'getIngredient']);

Route::post('update-ingredient',[IngredientController::class, 'updateIngredient']);

Route::post('/delete-ingredient',[IngredientController::class, 'deleteIngredient']);

// ------------------------ Combo Routes ------------------------ //

Route::post('/get-combos',[ComboController::class, 'getCombos']);

Route::post('add-combo',[ComboController::class, 'addCombo']);

Route::get('/get-combo/{id}', [ComboController::class, 'getCombo']);

Route::post('update-combo',[ComboController::class, 'updateCombo']);

Route::post('/delete-combo',[ComboController::class, 'deleteCombo']);

// ------------------------ Variation Routes ------------------------ //

Route::post('/get-variations',[VariationController::class, 'getVariations']);

Route::post('add-variation',[VariationController::class, 'addVariation']);

Route::get('/get-variation/{id}', [VariationController::class, 'getVariation']);

Route::post('update-variation',[VariationController::class, 'updateVariation']);

Route::post('/delete-variation',[VariationController::class, 'deleteVariation']);

// ------------------------ POS Routes ------------------------ //

Route::post('get-current-table-details',[PosController::class, 'getCurrentTableDetails']);

Route::post('/add-kot',[PosController::class, 'addKOT']);

Route::post('/save-data',[PosController::class, 'saveData']);

Route::get('/print-order/{id}', [PosController::class, 'printOrder']);

Route::post('/hold-kot',[PosController::class, 'holdKOT']);

Route::get('/remove-hold-kot/{tableId}',[PosController::class, 'removeHoldKOT']);

Route::post('/save-settle-bill',[PosController::class, 'saveSettleBill']);

Route::post('/remove-discount', [PosController::class, 'removeDiscount']);

// ------------------------ Product Routes ------------------------ //

Route::post('get-products',[ProductController::class, 'getProducts']);

Route::get('get-subcategory-wise-products/{id}',[ProductController::class, 'getSubcategoryWiseProduct']);

Route::get('/get-category-products/{id}',[ProductController::class, 'getCategoryProduct']);

Route::post('/add-product',[ProductController::class, 'addProduct']);

Route::get('/get-product/{id}', [ProductController::class, 'getProduct']);

Route::get('/get-category-wise-products/{id}',[ProductController::class, 'getCategoryWiseProduct']);

Route::get('/toggle-wishlist',[ProductController::class, 'toggleWishlist']);

// Route::post('get-products',[ProductController::class, 'getProducts']);

Route::get('product/{id}',[ProductController::class, 'editProduct']);

Route::post('update-product',[ProductController::class, 'updateProduct']);

Route::post('/delete-product',[ProductController::class, 'deleteProduct']);

Route::post('/get-variations-and-ingredients',[ProductController::class, 'getVariationsAndIngredients']);

// ------------------------ Digital Product Routes ------------------------ //

Route::get('get-digital-product-list/{categoryId}',[ProductController::class, 'getDigitalProductList']);

// ------------------------ Setting Page Routes ------------------------ //

Route::get('setting-data',[SettingController::class, 'settingData']);

Route::get('get-currency', [SettingController::class, 'getCurrency']);

Route::post('save-currency', [SettingController::class, 'saveCurrency']);

Route::get('get-tax-detail', [TaxSettingController::class, 'getTaxList']);

Route::post('save-tax-detail', [TaxSettingController::class, 'saveTaxDetail']);

Route::post('save-taxes-status', [TaxSettingController::class, 'saveTaxStatus']);

Route::delete('delete-tax-detail/{tax}', [TaxSettingController::class, 'deleteTaxDetail']);

Route::post('update-setting',[SettingController::class, 'updateSetting']);

Route::get('table-list',[SettingController::class, 'tableList']);

Route::get('color-list',[SettingController::class, 'colorList']);

Route::get('get-users',[UserController::class, 'getUsers']);

Route::post('save-user-data', [UserController::class, 'saveUserData']);

Route::delete('delete-user-data/{user}', [UserController::class, 'deleteUserData']);

Route::get('check-color/{capacity}',[SettingController::class, 'checkColor']);

Route::get('table-data/{id}',[SettingController::class, 'tableData']);

Route::post('add-update-table',[SettingController::class, 'addUpdateTable']);

Route::post('/delete-table',[SettingController::class, 'deleteTable']);

Route::post('/change-table-status',[SettingController::class, 'changeTableStatus']);

Route::get('/member-limitation',[SettingController::class, 'memberLimitation']);

Route::get('/logout', [UserController::class, 'logout']);


// ------------------------ Manager Table Page Routes ------------------------ //


Route::post('/add-update-table', [TableController::class, 'addUpdateTable']);

Route::post('/get-table-list-floor-wise', [TableController::class, 'getTableListFloorWise']);

Route::get('table-list-floor-wise/{id}',[TableController::class, 'tableListFloorWise']);

Route::get('table-list-with-order',[TableController::class, 'tableList']);

Route::post('change-order-table',[TableController::class, 'changeOrderTable']);

Route::post('change-floor-order',[TableController::class, 'changeFloorOrder']);

Route::post('finish-next',[TableController::class, 'finishNext']);

Route::post('cancel-next',[TableController::class, 'cancelNext']);

Route::post('get-remaining-time',[TableController::class, 'getRemainingTime']);

Route::post('change-floor-list',[TableController::class, 'changeFloorList']);

Route::post('add-minutes-order',[TableController::class, 'addMinutesInOrder']);

Route::get('/get-table/{id}', [TableController::class, 'getTable']);

Route::post('/check-current-order-kot-available', [TableController::class, 'checkCurrentOrderProductsAvailable']);

// ------------------------ Floor Routes ------------------------ //

Route::get('get-floors',[FloorController::class , 'getFloors']);

Route::get('get-floors-data',[FloorController::class , 'getFloorsData']);

Route::post('add-floor',[FloorController::class , 'addFloor']);

Route::get('floor-data/{id}',[FloorController::class, 'editFloorDetail']);

Route::post('delete-floor',[FloorController::class, 'deleteFloor']);

// ------------------------ Report Page Routes ------------------------ //

Route::get('/report-data',[ReportController::class, 'reportData']);

Route::get('/report-chart-data',[ReportController::class, 'reportChartData']);

// ------------------------ Reservation Routes ------------------------ //

Route::post('/add-reservation',[ReservationController::class, 'addReservation']);

Route::post('/set-device-token',[ReservationController::class, 'setDeviceToken']);

Route::get('/check-reservation',[ReservationController::class, 'checkReservation']);

Route::get('/check-reservation-enable',[ReservationController::class, 'checkReservationEnabled']);

Route::post('/change-reservation',[ReservationController::class, 'changeReservation']);

Route::post('/check-time',[ReservationController::class, 'checkTime']);

Route::post('/floor-available',[ReservationController::class, 'floorAvailable']);

Route::post('/waiting-time',[ReservationController::class, 'waitingTime']);

Route::post('/waiting-order-data',[ReservationController::class, 'waitingOrderData']);

Route::post('/check-order',[ReservationController::class, 'checkOrder']);

Route::post('/cancel-reservation',[ReservationController::class, 'cancelReservation']);

Route::get('/reservation-list',[ReservationController::class, 'reservationList']);

Route::post('/remove-reservation',[ReservationController::class, 'removeReservation']);

Route::get('/reservation-detail/{id}',[ReservationController::class, 'reservationDetail']);

Route::get('/waiters', [ReservationController::class, 'waiterList']);

// ------------------------ Wishlist Routes ------------------------ //

Route::post('/get-wishlist',[FavoriteController::class, 'getWishlist']);

// ------------------------ Lauguage Routes ------------------------ //


Route::get('/get-all-languages',[LanguageController::class, 'getAllLangs']);

Route::post('get-language-translation',[LanguageController::class, 'getLangTranslation']);

Route::get('/get-lang-translation/{id}',[LanguageController::class, 'getLangTrans']);

Route::post('update-lang-translation',[LanguageController::class, 'updateLangTrans']);

Route::post('update-languages-status',[LanguageController::class, 'updateLangStatus']);

// New 

Route::get('/get-languages',[LanguageController::class, 'getlangs']);

// ------------------------ Qrcode Routes ------------------------ //

Route::get('/qrcode', [QrCodeController::class, 'index']);

Route::post('/delete-qrcode', [QrCodeController::class, 'deleteQrCode']);

Route::post('/generate-qrcode', [QrCodeController::class, 'setqrCodeGenerate']);

Route::post('/regenerate-qrcode', [QrCodeController::class, 'qrCodereGenerate']);

Route::get('/download-qrcode/{id}', [QrCodeController::class, 'qrCodereDownload']);

Route::post('/check-qrcode-exists', [QrCodeController::class, 'checkQrcodeExists']);

// ------------------------ KOT Route ------------------------ //

Route::post('/kot-list', [OrderController::class, 'kotList']);

Route::post('order-serve',[OrderController::class, 'orderServe']);

Route::post('get-complete-orders',[OrderController::class, 'getCompleteOrders']);

Route::get('orders/{id}',[OrderController::class, 'getOrder']);

// ------------------------ Auth Routes ------------------------ //

Route::get('/checkLogin', [AuthController::class, 'checklogin']);

Route::post('/login-user', [AuthController::class, 'loginUser']);

Route::post('lock-enable-disable', [AuthController::class , 'lockEnableDisable']);

Route::get('get-user-pass-code', [AuthController::class , 'userPassCode']);

Route::get('check-restaurant-status', [AuthController::class, 'checkRestaurantStatus']);

// ------------------------ Coupon Routes ------------------------ //

Route::get('/get-coupon-list', [CouponController::class, 'getCouponCodes']);

Route::post('/add-coupon',[CouponController::class, 'addCoupon']);

Route::get('/get-coupon/{id}', [CouponController::class, 'getCoupon']);

Route::post('/update-coupon',[CouponController::class, 'updateCoupon']);

Route::post('/delete-coupon',[CouponController::class, 'deleteCoupon']);

Route::post('/apply-coupon',[CouponController::class, 'applyCoupon']);

// ------------------------ UPI Payment Setting Routes ------------------------ //

Route::get('/get-upi-list', [UpiController::class, 'getUpiCodes']);

Route::post('/add-upi',[UpiController::class, 'addUpi']);

Route::get('/get-upi/{id}', [UpiController::class, 'getUpi']);

Route::post('/update-upi',[UpiController::class, 'updateUpi']);

Route::post('/delete-upi',[UpiController::class, 'deleteUpi']);

// ------------------------ Dashboard List Routes ------------------------ //

Route::get('/dashboard-list', [DashboardController::class, 'dashboardList']);

Route::get('/user-simulation/{id}', [UserController::class, 'changeSimulation']);

Route::get('/orders', [AdminOrderController::class, 'getOrders']);

Route::get('/order/{order}', [AdminOrderController::class, 'getOrder']);

Route::get('/delete-order/{order}', [AdminOrderController::class, 'deleteOrder']);

Route::get('/get-transactions', [AdminOrderController::class, 'getTransactions']);

Route::get('/delete-transaction/{transaction}', [AdminOrderController::class, 'deleteTransaction']);


// ------------------------ Admin Register Routes ------------------------ //

Route::post('/sign-up', [AdminController::class, 'registerDetail']);

Route::get('/branch-list', [AdminController::class, 'getBranchList']);

Route::post('/add-update-branch', [AdminController::class, 'addUpdateBranch']);

Route::delete('/delete-branch/{id}', [AdminController::class, 'removeBranch']);
