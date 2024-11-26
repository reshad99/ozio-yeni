<?php

namespace App\Repositories\Concrete\V1;

use App\Models\AssignedCoupon;
use App\Repositories\Abstract\V1\AssignedCouponRepositoryInterface;

class AssignedCouponRepository extends BaseRepository implements AssignedCouponRepositoryInterface
{
    /**
     * @param AssignedCoupon $model
     */
    public function __construct(
         AssignedCoupon $model
    ) {
        parent::__construct($model);
    }
}
