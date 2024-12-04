<?php

namespace App\Repositories\Concrete\V1;

use App\Models\Order;
use App\Repositories\Abstract\V1\OrderRepositoryInterface;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{
    /**
     * @param Order $model
     */
    public function __construct(
        Order $model
    ) {
        parent::__construct($model);
    }
}
