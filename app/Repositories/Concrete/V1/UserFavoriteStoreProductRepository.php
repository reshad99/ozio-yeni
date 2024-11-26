<?php

namespace App\Repositories\Concrete\V1;

use App\Models\UserFavoriteStoreProduct;
use App\Repositories\Abstract\V1\UserFavoriteStoreProductRepositoryInterface;

class UserFavoriteStoreProductRepository extends BaseRepository implements UserFavoriteStoreProductRepositoryInterface
{
    /**
     * @param UserFavoriteStoreProduct $model
     */
    public function __construct(
        UserFavoriteStoreProduct $model
    ) {
        parent::__construct($model);
    }
}
