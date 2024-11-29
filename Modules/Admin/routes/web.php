<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Http\Controllers\Auth\LoginController;
use Modules\Admin\Http\Controllers\Auth\LogoutController;
use Modules\Admin\Http\Controllers\UserController;

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

Route::group([], function () {
    Route::resource('admin', AdminController::class)->names('admin');
});

Route::middleware('guest:admin')->group(function () {
    Route::get('login', [LoginController::class, 'showLogin'])->name('login');
    Route::post('authenticate', [LoginController::class, 'authenticate'])->name('admin.authenticate');
});

Route::post('logout', [LogoutController::class, 'logout'])->name('logout');

Route::middleware('auth:admin')->group(function () {
    Route::view('dashboard', 'admin::pages.dashboard.index')->name('admin.dashboard');
});

Route::resource('users', UserController::class);

Route::view('asd','admin::pages.emergency-call.list.index');
