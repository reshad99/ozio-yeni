<?php

namespace App\Repositories\Concrete\V1;

use App\Models\StoreProductTag;
use App\Repositories\Abstract\V1\StoreProductTagRepositoryInterface;

class StoreProductTagRepository extends BaseRepository implements StoreProductTagRepositoryInterface
{
    /**
     * @param StoreProductTag $model
     */
    public function __construct(
        StoreProductTag $model
    ) {
        parent::__construct($model);
    }
}
