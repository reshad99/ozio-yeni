<?php

namespace App\Enums;

enum SmsText
{
    case OTP;

    public function getText(): string
    {
        return match ($this) {
            self::OTP => 'OTP kodunuz @{otp}',
        };
    }
}
