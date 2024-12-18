<?php

namespace App\Services\V1\Auth;

use App\Enums\SmsText;
use App\Exceptions\ExceptionResponse;
use App\Http\Requests\V1\Auth\LoginRequest;
use App\Http\Requests\V1\Auth\RegisterRequest;
use App\Http\Requests\V1\Auth\UpdateProfileRequest;
use App\Http\Resources\V1\DataResource;
use App\Http\Resources\V1\ErrorResource;
use App\Http\Resources\V1\SuccessResource;
use App\Http\Resources\V1\User\UserResource;
use App\Models\Otp;
use App\Models\User;
use App\Repositories\Concrete\V1\OtpRepository;
use App\Repositories\Concrete\V1\UserRepository;
use App\Services\V1\Api\Sms\SmsService;
use App\Services\V1\CommonService;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthService extends CommonService
{
    /**
     * AuthService constructor.
     */
    public function __construct(private SmsService $smsService, private OtpRepository $otpRepository, private UserRepository $userRepository)
    {
        parent::__construct(mainRepository: new OtpRepository(model: new Otp), request: [], logChannel: 'auth');
        $this->smsService = $smsService;
        $this->otpRepository = $otpRepository;
        $this->userRepository = $userRepository;
    }

    public function sendOtpCode(Request $request): SuccessResource|ExceptionResponse
    {
        $request->validate(rules: [
            'phone' => 'required|exists:users,phone',
        ]);
        $phone = $request->phone;
        $user = $this->userRepository->where(column: 'phone', operator: '=', value: $phone)->first();

        if (!$user)
            return new ExceptionResponse('User not found');

        $otp = $this->otpRepository->generateOtp(userId: $user->id);
        $this->smsService->send(receiver: $phone, sms: SmsText::OTP, variables: ['otp' => $otp]);
        return new SuccessResource(message: 'Otp code sended');
    }

    public function checkOtpCode(Request $request): JsonResponse
    {
        $request->validate(rules: [
            'otp' => 'required',
        ]);

        $otp = $this->otpRepository->where(column: 'code', operator: '=', value: $request->otp)->first();

        if (!$otp)
            throw new ExceptionResponse(message: 'Otp not found');

        $user = User::find($otp->user_id);
        $token = JWTAuth::fromUser($user);
        $otp->delete();

        return $this->respondWithToken(token: $token, user: $user);
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
     * @return SuccessResource
     * @throws Exception
     */
    public function register(RegisterRequest $request): SuccessResource
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->country_code = $request->country_code;
        $user->phone = $request->phone;
        $this->userRepository->create($user);
        return new SuccessResource(message: 'User created successfully');
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
    protected function respondWithToken($token, User|Collection $user)
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
