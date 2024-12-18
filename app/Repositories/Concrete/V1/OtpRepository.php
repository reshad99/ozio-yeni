<?php

namespace App\Repositories\Concrete\V1;

use App\Models\Otp;
use App\Repositories\Abstract\V1\OtpRepositoryInterface;

class OtpRepository extends BaseRepository implements OtpRepositoryInterface
{
    /**
     * @param Otp $model
     */
    public function __construct(
        Otp $model
    ) {
        parent::__construct($model);
    }

    public function generateOtp(int $userId): int
    {
        $otp = mt_rand(1000, 9999);
        $this->model->code = $otp;
        $this->model->user_id = $userId;
        $this->model->save();
        return $otp;
    }
}
