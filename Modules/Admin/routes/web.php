<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\Admin\AdminController;
use Modules\Admin\Http\Controllers\Auth\AdminLoginController;
use Modules\Admin\Http\Controllers\Auth\AdminLogoutController;
use Modules\Admin\Http\Controllers\City\CityController;
use Modules\Admin\Http\Controllers\Country\CountryController;
use Modules\Admin\Http\Controllers\Currency\CurrencyController;
use Modules\Admin\Http\Controllers\Module\ModuleController;
use Modules\Admin\Http\Controllers\Store\StoreController;
use Modules\Admin\Http\Controllers\StoreCategory\StoreCategoryController;
use Modules\Admin\Http\Controllers\User\AdminUserController;
use Modules\Admin\Http\Controllers\StoreBranch\StoreBranchController;
use Modules\Admin\Http\Controllers\Zone\ZoneController;

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

Route::get('/', function () {
    return view('welcome');
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

Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [AdminUserController::class, 'index'])->name('index');
    });
    Route::prefix('admins')->name('admins.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
    });

    Route::prefix('stores')->name('stores.')->group(function () {
        Route::get('/', [StoreController::class, 'index'])->name('index');
    });

    Route::prefix('ajax')->name('ajax.')->group(function () {
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('datatable', [AdminUserController::class, 'datatable'])->name('datatable');
        });
        Route::prefix('admins')->name('admins.')->group(function () {
            Route::get('datatable', [AdminController::class, 'datatable'])->name('datatable');

            Route::get('/{id}', [AdminController::class, 'read'])->name('read');
            Route::post('store', [AdminController::class, 'store'])->name('store');
            Route::post('update/{id}', [AdminController::class, 'update'])->name('update');
            Route::delete('destroy/{id}', [AdminController::class, 'destroy'])->name('destroy');
            Route::delete('destroy-multiple/{ids}', [AdminController::class, 'destroyMultiple'])->name('destroy-multiple');
        });

        Route::prefix('stores')->name('stores.')->group(function () {
            Route::get('datatable', [StoreController::class, 'datatable'])->name('datatable');

            Route::get('/{id}', [StoreController::class, 'read'])->name('read');
            Route::post('store', [StoreController::class, 'store'])->name('store');
            Route::post('update/{id}', [StoreController::class, 'update'])->name('update');
            Route::delete('destroy/{id}', [StoreController::class, 'destroy'])->name('destroy');
            Route::delete('destroy-multiple/{ids}', [StoreController::class, 'destroyMultiple'])->name('destroy-multiple');
        });

        Route::prefix('modules')->name('modules.')->group(function () {
            Route::get('select2', [ModuleController::class, 'moduleSelect2'])->name('select2');
        });

        Route::prefix('currencies')->name('currencies.')->group(function () {
            Route::get('select2', [CurrencyController::class, 'currencySelect2'])->name('select2');
        });

        Route::prefix('countries')->name('countries.')->group(function () {
            Route::get('select2', [CountryController::class, 'countrySelect2'])->name('select2');
        });

        Route::prefix('cities')->name('cities.')->group(function () {
            Route::get('select2', [CityController::class, 'citySelect2'])->name('select2');
        });

        Route::prefix('storeCategories')->name('storeCategories.')->group(function () {
            Route::get('select2', [StoreCategoryController::class, 'storeCategorySelect2'])->name('select2');
        });

        Route::prefix('zones')->name('zones.')->group(function () {
            Route::get('select2', [ZoneController::class, 'zoneSelect2'])->name('select2');
        });

        Route::prefix('storeBranches')->name('storeBranches.')->group(function () {
            Route::get('select2', [StoreBranchController::class, 'storeBranchSelect2'])->name('select2');
        });
    });
});
