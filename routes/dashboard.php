<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CarProductController;
use App\Http\Controllers\CarSalesmanController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductInstallmentController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SalesmanController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WarehouseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register dashboard routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    Route::resource('users', UserController::class);
    Route::resource('salesmen', SalesmanController::class);
    Route::resource('areas', AreaController::class);
    Route::resource('customers', CustomerController::class);

    //Warehouse
    Route::resource('warehouses', WarehouseController::class)->only(['index', 'create', 'store']);
    Route::get('warehouse_tracking', [warehouseController::class, 'tracking'])->name('warehouses.tracking');

    //Sales
    Route::resource('car_salesmen', CarSalesmanController::class);
    Route::resource('sales', SaleController::class)->only('index', 'show');

    //Application settings
    Route::resource('products', ProductController::class);
    Route::get('products/{product}/installments', [ProductController::class, 'installments'])->name('products.installments');
    Route::resource('product_installments', ProductInstallmentController::class)->only(['store', 'update', 'destroy']);
    Route::resource('cars', CarController::class);
    Route::get('cars/{car}/products', [CarController::class, 'products'])->name('cars.products');
    Route::resource('car_products', CarProductController::class)->only(['store']);
    Route::resource('notifications', NotificationController::class)->only(['index', 'create', 'store']);
    Route::resource('settings', SettingController::class)->only(['index', 'show', 'edit', 'update']);
});
