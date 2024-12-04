<?php

namespace App\Repositories\Concrete\V1;

use App\Models\StoreProduct;
use App\Repositories\Abstract\V1\StoreProductRepositoryInterface;

class StoreProductRepository extends BaseRepository implements StoreProductRepositoryInterface
{
    /**
     * @param StoreProduct $model
     */
    public function __construct(
        StoreProduct $model
    ) {
        parent::__construct($model);
    }
}
