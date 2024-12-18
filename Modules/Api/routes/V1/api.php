<?php

use Illuminate\Support\Facades\Route;
//use Modules\Api\Http\Controllers\TestController;
//
//Route::get('test', [TestController::class, 'test']);

use Modules\Api\Http\Controllers\TestController;
use Modules\Api\Http\Controllers\V1\AuthController;

Route::get('test', [TestController::class, 'test']);

Route::middleware('guest')->group( function (): void {
    Route::post('send-otp',  [AuthController::class, 'sendOtpCode']);
    Route::post( 'check-otp',  [AuthController::class, 'checkOtpCode']);
    Route::post( 'register',  [AuthController::class, 'register']);
});
