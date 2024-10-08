<?php

use App\Http\Controllers\Api\AreaController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\SaleController;
use App\Http\Controllers\Api\SettingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::middleware('localization')->group(function () {
    Route::get('settings', [SettingController::class, 'index']);
    Route::get('languages', [SettingController::class, 'languages']);
    Route::post('login', [ClientController::class, 'login']);
    Route::middleware('auth:api')->group(function () {
        Route::post('update_device_token', [ClientController::class, 'updateDeviceToken']);
        Route::get('profile', [ClientController::class, 'profile']);
        Route::post('logout', [ClientController::class, 'logout']);
        Route::post('profile/delete', [ClientController::class, 'delete']);

        //Products
        Route::get('products', [ProductController::class, 'index']);
        Route::get('products/{product}', [ProductController::class, 'show']);

        //Areas
        Route::get('areas', [AreaController::class, 'index']);

        //Customers
        Route::get('customers', [CustomerController::class, 'index']);
        Route::get('customers/{customer}', [CustomerController::class, 'show']);

        //Sales
        Route::get('sales', [SaleController::class, 'index']);
        Route::post('sales/store', [SaleController::class, 'store']);
        Route::get('sales/{sale}', [SaleController::class, 'show']);
        Route::post('sales/{sale}/pay_installment', [SaleController::class, 'payInstallment']);
        Route::post('sales/{sale}/delete', [SaleController::class, 'delete']);

        //Report
        Route::get('reports', [ReportController::class, 'index']);

        //Notifications
        Route::get('notifications', [NotificationController::class, 'index']);
        Route::get('notifications/unread', [NotificationController::class, 'unread']);
        Route::post('notifications/mark_as_read', [NotificationController::class, 'markAsReadNotification']);
        Route::post('notifications/{notification}/delete', [NotificationController::class, 'destroy']);
    });
});
