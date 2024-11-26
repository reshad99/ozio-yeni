<?php

namespace App\Repositories\Concrete\V1;

use App\Models\Cart;
use App\Repositories\Abstract\V1\CartRepositoryInterface;

class CartRepository extends BaseRepository implements CartRepositoryInterface
{
    /**
     * @param Cart $model
     */
    public function __construct(
        private Cart $model
    ) {
        parent::__construct($model);
    }
}
