<?php

namespace App\Repositories\Concrete\V1;

use App\Models\Store;
use App\Repositories\Abstract\V1\StoreRepositoryInterface;

class StoreRepository extends BaseRepository implements StoreRepositoryInterface
{
    /**
     * @param Store $model
     */
    public function __construct(
        Store $model
    ) {
        parent::__construct($model);
    }
}
