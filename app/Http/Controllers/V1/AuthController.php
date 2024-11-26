<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Services\V1\Auth\AuthService;

class AuthController extends Controller
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
}
