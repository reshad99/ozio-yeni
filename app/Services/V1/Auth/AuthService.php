<?php

namespace App\Services\V1\Auth;

use App\Enums\SmsText;
use App\Http\Requests\V1\Auth\LoginRequest;
use App\Http\Requests\V1\Auth\RegisterRequest;
use App\Http\Requests\V1\Auth\UpdateProfileRequest;
use App\Http\Resources\V1\DataResource;
use App\Http\Resources\V1\SuccessResource;
use App\Http\Resources\V1\User\UserResource;
use App\Models\User;
use App\Services\V1\CommonService;
use App\Services\V1\Sms\SmsService;
use Exception;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthService extends CommonService
{
    protected SmsService $smsService;

    /**
     * AuthService constructor.
     */
    public function __construct(SmsService $smsService)
    {
        parent::__construct(null, [], 'auth');
        $this->smsService = $smsService;
    }

    public function sendOtpCode(Request $request): SuccessResource
    {
        $request->validate(rules: [
            'phone' => 'required|exists:users,phone'
        ]);
        $phone = $request->phone;
        $otp = mt_rand(1000, 9999);
        $this->smsService->send(receiver: $phone, sms: SmsText::OTP, variables: ['otp' => $otp]);

        return new SuccessResource(message: 'Otp code sended');
    }

    /**
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws Exception
     */
    public function login(LoginRequest $request)
    {
        try {
            $credentials = [
                $this->loginType(login: $request->login) => $request->login,
                'password' => $request->password
            ];

            if (!($token = auth()->guard(name: 'api')->attempt(credentials: $credentials))) {
                throw new Exception(message: 'Telefon nömrəsi və ya şifrə səhvdir');
            } else {
                return $this->respondWithToken($token, auth()->guard('api')->user());
            }
        } catch (\Exception $e) {
            $this->errorLogging(message: 'login: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * @param RegisterRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws Exception
     */
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

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws Exception
     */
    public function logout()
    {
        try {
            if (auth()->guard('api')->check()) {
                auth()->guard('api')->logout();
            }

            $this->infoLogging('logout check: ' . auth()->guard('api')->check());

            return $this->successResponse('Hesabdan çıxıldı');
        } catch (\Exception $e) {
            $this->errorLogging('logout: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * @return DataResource
     * @throws Exception
     */
    public function updateProfile(UpdateProfileRequest $request): DataResource
    {
        try {
            /**
             * @var ?User $user
             */
            $user = auth()->guard('api')->user();
            if (!$user) {
                throw new Exception('User not authenticated');
            }
            $user->fill($request->all());
            $user->save();
            return new DataResource(new UserResource(auth()->guard('api')->user()));
        } catch (\Exception $e) {
            $this->errorLogging('updateProfile: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
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