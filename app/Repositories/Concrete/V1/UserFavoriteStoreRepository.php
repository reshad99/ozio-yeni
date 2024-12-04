<?php

namespace App\Repositories\Concrete\V1;

use App\Models\UserFavoriteStore;
use App\Repositories\Abstract\V1\UserFavoriteStoreRepositoryInterface;

class UserFavoriteStoreRepository extends BaseRepository implements UserFavoriteStoreRepositoryInterface
{
    /**
     * @param UserFavoriteStore $model
     */
    public function __construct(
        UserFavoriteStore $model
    ) {
        parent::__construct($model);
    }
}
