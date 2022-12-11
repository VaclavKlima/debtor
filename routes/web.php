<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolesController;
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

    Route::name('users_management.')->prefix('users-management')->group(function () {

        Route::resource('users', UsersController::class);
        Route::resource('roles', RolesController::class);
    });
});
