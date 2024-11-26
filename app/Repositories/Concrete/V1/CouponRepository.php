<?php

namespace App\Repositories\Concrete\V1;

use App\Models\Coupon;
use App\Repositories\Abstract\V1\CouponRepositoryInterface;

class CouponRepository extends BaseRepository implements CouponRepositoryInterface
{

    /**
     * @param Coupon $model
     */
    public function __construct(
        Coupon $model
    ) {
        parent::__construct($model);
    }
}
