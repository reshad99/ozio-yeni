<?php

namespace App\Services\V1\Api;

use App\Enums\SmsText;
use App\Services\V1\CommonService;
use App\Services\V1\Sms\Gateways\Lsim;
use App\Services\V1\Sms\SmsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TestService extends CommonService
{
    public function __construct()
    {
    }

    /**
     * @return Response | JsonResponse
     * @throws \Exception
     */
    public function test()
    {
        try {
            $smsService = new SmsService(gateway: new Lsim());
            $smsService->send(receiver: '994516783741', sms: SmsText::OTP, variables: ['otp' => 3215]);

        } catch (\Exception $e) {
            return $this->errorResponse($e);
        }
    }
}
