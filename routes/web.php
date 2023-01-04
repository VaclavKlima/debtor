<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UsersManagement\RolesController;
use App\Http\Controllers\UsersManagement\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::middleware('auth')->group(function () {


    Route::get('/', [HomeController::class, 'index'])->name('home.index');

    Route::resource('orders', OrdersController::class);

    Route::get('/user-profile', [UserProfileController::class, 'edit'])->name('user-profile.edit');
    Route::put('/user-profile', [UserProfileController::class, 'update'])->name('user-profile.update');

    Route::name('users-management.')->prefix('users-management')->group(function () {

        Route::resource('users', UsersController::class);
        Route::resource('roles', RolesController::class);
    });
});
