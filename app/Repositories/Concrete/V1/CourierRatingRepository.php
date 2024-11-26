<?php

namespace App\Repositories\Concrete\V1;

use App\Models\CourierRating;
use App\Repositories\Abstract\V1\CourierRatingRepositoryInterface;

class CourierRatingRepository extends BaseRepository implements CourierRatingRepositoryInterface
{
    /**
     * @param CourierRating $model
     */
    public function __construct(
        CourierRating $model
    ) {
        parent::__construct($model);
    }
}
