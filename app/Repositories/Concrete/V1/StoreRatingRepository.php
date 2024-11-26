<?php

namespace App\Repositories\Concrete\V1;

use App\Models\StoreRating;
use App\Repositories\Abstract\V1\StoreRatingRepositoryInterface;

class StoreRatingRepository extends BaseRepository implements StoreRatingRepositoryInterface
{
    /**
     * @param StoreRating $model
     */
    public function __construct(
        StoreRating $model
    ) {
        parent::__construct($model);
    }
}
