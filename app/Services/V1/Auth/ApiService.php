<?php

namespace App\Services\V1\Auth;

use App\Http\Requests\V1\Auth\LoginRequest;
use App\Http\Requests\V1\Auth\RegisterRequest;
use App\Http\Requests\V1\Auth\UpdateProfileRequest;
use App\Http\Requests\V1\Auth\UpdateRequest;
use App\Http\Resources\V1\User\UserResource;
use App\Models\User;
use App\Services\V1\CommonService;
use Exception;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiService extends CommonService
{
    public function __construct()
    {
        parent::__construct(null, [], 'auth');
    }

    public function login(LoginRequest $request)
    {
        try {
            $credentials = [
                $this->loginType($request->login) => $request->login,
                'password' => $request->password
            ];

            if (!$token = auth()->guard('api')->attempt($credentials)) {
                throw new Exception('Telefon nömrəsi və ya şifrə səhvdir');
            } else {
                return $this->respondWithToken($token, auth()->user());
            }
        } catch (\Exception $e) {
            $this->errorLogging('login: ' . $e->getMessage());
            throw $e;
        }
    }

    public function register(RegisterRequest $request)
    {
        try {
            $user = User::create($request->all());
            $token = JWTAuth::fromUser($user);
            return $this->respondWithToken($token, $user);
        } catch (\Exception $e) {
            $this->errorLogging('register: ' . $e->getMessage());
            throw $e;
        }
    }

    public function logout()
    {
        try {
            if (auth()->check())
                auth()->logout();

            $this->infoLogging('logout check: ' . auth()->check());

            return $this->successResponse('Hesabdan çıxıldı');
        } catch (\Exception $e) {
            $this->errorLogging('logout: ' . $e->getMessage());
            throw $e;
        }
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        try {
            auth()->guard('api')->user()->update($request->all());
            return $this->dataResponse('Məlumatlar yeniləndi', new UserResource(auth()->user()));
        } catch (\Exception $e) {
            $this->errorLogging('updateProfile: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token, User $user)
    {
        return response()->json([
            'success' => true,
            'user' => new UserResource($user),
            'access_token' => $token,
            'token_type' => 'bearer',
        ]);
    }

    /**
     * Check whether the login type is email or username.
     *
     * @param  string  $login
     * @return string
     */
    private function loginType($login)
    {
        return filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    }
}
