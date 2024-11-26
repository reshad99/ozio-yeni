<?php

namespace App\Repositories\Concrete\V1;

use App\Models\UsedCoupon;
use App\Repositories\Abstract\V1\UsedCouponRepositoryInterface;

class UsedCouponRepository extends BaseRepository implements UsedCouponRepositoryInterface
{
    /**
     * @param UsedCoupon $model
     */
    public function __construct(
        UsedCoupon $model
    ) {
        parent::__construct($model);
    }
}
