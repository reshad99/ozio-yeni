<?php

use App\Http\Controllers\V1\TestController;
use Illuminate\Support\Facades\Route;

Route::get('test', [TestController::class, 'test']);
