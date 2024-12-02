<?php

use Illuminate\Support\Facades\Route;

Route::middleware(middleware: 'guest:api')->group(callback: function (): void {
});
