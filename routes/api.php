<?php

use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\NotificationController;
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
        Route::post('profile/change_password', [ClientController::class, 'changePassword']);
        Route::get('profile', [ClientController::class, 'profile']);
        Route::post('profile/update', [ClientController::class, 'UpdateProfile']);
        Route::post('profile/update/image', [ClientController::class, 'updateProfileImage']);
        Route::post('profile/update_password', [ClientController::class, 'updatePassword']);
        Route::post('logout', [ClientController::class, 'logout']);
        Route::post('profile/delete', [ClientController::class, 'delete']);

        //Notifications
        Route::get('notifications', [NotificationController::class, 'index']);
        Route::get('notifications/unread', [NotificationController::class, 'unread']);
        Route::post('notifications/mark_as_read', [NotificationController::class, 'markAsReadNotification']);
        Route::post('notifications/{notification}/delete', [NotificationController::class, 'destroy']);
    });
});
