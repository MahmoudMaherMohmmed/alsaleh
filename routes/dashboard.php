<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SalesmanController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
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

    //Application settings
    Route::resource('cars', CarController::class);
    Route::resource('notifications', NotificationController::class)->only(['index', 'create', 'store']);
    Route::resource('settings', SettingController::class)->only(['index', 'show', 'edit', 'update']);
});
