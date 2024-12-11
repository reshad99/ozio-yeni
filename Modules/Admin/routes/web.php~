<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\Admin\AdminController;
use Modules\Admin\Http\Controllers\Auth\AdminLoginController;
use Modules\Admin\Http\Controllers\Auth\AdminLogoutController;
use Modules\Admin\Http\Controllers\User\AdminUserController;

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

// Route::group([], function () {
//     Route::resource('admin', AdminController::class)->names('admin');
// });

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
Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {

    //route group for admin users
    //admin.users
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('index');
    });
    Route::prefix('admins')->name('admins.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
    });

    //admin.ajax
    Route::prefix('ajax')->name('ajax.')->group(function () {
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('datatable', [AdminUserController::class, 'datatable'])->name('datatable');
        });
        Route::prefix('admins')->name('admins.')->group(function () {
            Route::get('datatable', [AdminController::class, 'datatable'])->name('datatable');

            //store update delete
            Route::get('/{id}', [AdminController::class, 'read'])->name('read');
            Route::post('store', [AdminController::class, 'store'])->name('store');
            Route::post('update/{id}', [AdminController::class, 'update'])->name('update');
            Route::delete('destroy/{id}', [AdminController::class, 'destroy'])->name('destroy');
        });
    });
});

Route::get('/', function () {
    return view('welcome');
});
