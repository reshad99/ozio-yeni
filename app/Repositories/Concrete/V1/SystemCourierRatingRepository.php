<?php

namespace App\Repositories\Concrete\V1;

use App\Models\SystemCourierRating;
use App\Repositories\Abstract\V1\SystemCourierRatingRepositoryInterface;

class SystemCourierRatingRepository extends BaseRepository implements SystemCourierRatingRepositoryInterface
{
    /**
     * @param SystemCourierRating $model
     */
    public function __construct(
        SystemCourierRating $model
    ) {
        parent::__construct($model);
    }
}
