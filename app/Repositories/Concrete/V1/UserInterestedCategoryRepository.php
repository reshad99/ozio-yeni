<?php

namespace App\Repositories\Concrete\V1;

use App\Models\UserInterestedCategory;
use App\Repositories\Abstract\V1\UserInterestedCategoryRepositoryInterface;

class UserInterestedCategoryRepository extends BaseRepository implements UserInterestedCategoryRepositoryInterface
{
    /**
     * @param UserInterestedCategory $model
     */
    public function __construct(
        UserInterestedCategory $model
    ) {
        parent::__construct($model);
    }
}
