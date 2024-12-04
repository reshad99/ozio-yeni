<?php

namespace App\Enums;

enum SmsText
{
    case OTP;
    case BOT;

    public function getText(): string
    {
        return match ($this) {
            self::OTP => 'OTP kodunuz @{otp}',
            self::BOT => 'Neco botlugu birak',
        };
    }
}
