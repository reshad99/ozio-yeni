<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Http\Controllers\Auth\LoginController;

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

Route::get('login', [LoginController::class, 'showLogin'])->name('admin.login');
Route::post('authenticate', [LoginController::class, 'authenticate'])->name('admin.authenticate');

Route::view('dashboard','admin::pages.dashboard.index')->name('admin.dashboard');
