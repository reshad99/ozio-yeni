<?php

namespace App\Repositories\Concrete\V1;

use App\Models\OrderItem;
use App\Repositories\Abstract\V1\OrderItemRepositoryInterface;

class OrderItemRepository extends BaseRepository implements OrderItemRepositoryInterface
{
    /**
     * @param OrderItem $model
     */
    public function __construct(
        OrderItem $model
    ) {
        parent::__construct($model);
    }
}
