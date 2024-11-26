<?php

namespace App\Repositories\Concrete\V1;

use App\Models\StoreCartItem;
use App\Repositories\Abstract\V1\StoreCartItemRepositoryInterface;

class StoreCartItemRepository extends BaseRepository implements StoreCartItemRepositoryInterface
{
    /**
     * @param StoreCartItem $model
     */
    public function __construct(
        StoreCartItem $model
    ) {
        parent::__construct($model);
    }
}
