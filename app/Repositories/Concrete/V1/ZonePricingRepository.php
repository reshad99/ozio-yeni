<?php

namespace App\Repositories\Concrete\V1;

use App\Models\ZonePricing;
use App\Repositories\Abstract\V1\ZonePricingRepositoryInterface;

class ZonePricingRepository extends BaseRepository implements ZonePricingRepositoryInterface
{
    /**
     * @param ZonePricing $model
     */
    public function __construct(
        ZonePricing $model
    ) {
        parent::__construct($model);
    }
}
