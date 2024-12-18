<?php

namespace App\Repositories\Abstract\V1;

interface OtpRepositoryInterface extends IBaseRepository
{
    public function generateOtp(int $userId): int;
}
