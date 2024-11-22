<?php

use Illuminate\Support\Facades\Route;

Route::middleware(middleware: 'guest')->group(callback: function (): void {
});
