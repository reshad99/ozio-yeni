<?php

namespace App\Services\V1\Api;

use App\Enums\SmsText;
use App\Services\V1\Api\Sms\Gateways\Lsim;
use App\Services\V1\CommonService;
use App\Services\V1\Api\Sms\SmsService;

class TestService extends CommonService
{
    public function __construct()
    {
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function test(): bool
    {
        try {
            $smsService = new SmsService(gateway: new Lsim());
            // $smsService->send(receiver: '994558448831', sms: SmsText::BOT, variables: ['otp' => 3215]);
            return true;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
