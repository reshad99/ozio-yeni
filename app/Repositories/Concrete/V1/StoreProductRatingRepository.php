<?php

namespace App\Repositories\Concrete\V1;

use App\Models\StoreProductRating;
use App\Repositories\Abstract\V1\StoreProductRatingRepositoryInterface;

class StoreProductRatingRepository extends BaseRepository implements StoreProductRatingRepositoryInterface
{
    /**
     * @param StoreProductRating $model
     */
    public function __construct(
        StoreProductRating $model
    ) {
        parent::__construct($model);
    }
}
