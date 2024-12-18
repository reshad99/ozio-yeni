<?php

namespace Modules\Api\Http\Controllers\V1;

use App\Exceptions\ExceptionResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Auth\RegisterRequest;
use App\Http\Resources\V1\SuccessResource;
use App\Services\V1\Auth\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(RegisterRequest $registerRequest): SuccessResource
    {
        return $this->authService->register($registerRequest);
    }

    public function sendOtpCode(Request $request): ExceptionResponse|SuccessResource
    {
        return $this->authService->sendOtpCode($request);
    }

    public function checkOtpCode(Request $request): JsonResponse
    {
        return $this->authService->checkOtpCode(request: $request);
    }
}
