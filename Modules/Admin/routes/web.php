<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Http\Controllers\AdminUserController;
use Modules\Admin\Http\Controllers\Auth\AdminLoginController;
use Modules\Admin\Http\Controllers\Auth\AdminLogoutController;

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
    Route::get('login', [AdminLoginController::class, 'showLogin'])->name('login');
    Route::post('authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
});

Route::post('logout', [AdminLogoutController::class, 'logout'])->name('logout');

Route::middleware('auth:admin')->group(function () {
    Route::view('dashboard', 'admin::pages.dashboard.index')->name('admin.dashboard');
});

// Route::resource('users', AdminUserController::class);

//route group for admin '
Route::group(['prefix' => 'admin', 'name' => 'admin.', 'middleware' => 'auth:admin'], function () {
    //route group for admin users
    //admin.users
    Route::group(['prefix' => 'users', 'name' => 'users.'], function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('index');
        Route::get('create', [AdminUserController::class, 'create'])->name('create');
        Route::post('store', [AdminUserController::class, 'store'])->name('store');
        Route::get('edit/{id}', [AdminUserController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [AdminUserController::class, 'update'])->name('update');
        Route::get('delete/{id}', [AdminUserController::class, 'destroy'])->name('delete');
    });


    //admin.ajax
    Route::group(['prefix' => 'ajax', 'name' => 'ajax.'], function () {
        Route::group(['prefix' => 'users', 'name' => 'users.'], function () {
            Route::get('datatable', [AdminUserController::class, 'datatable'])->name('datatable');
        });
    });
});
