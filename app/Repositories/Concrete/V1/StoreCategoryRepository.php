<?php

namespace App\Repositories\Concrete\V1;

use App\Models\StoreCategory;
use App\Repositories\Abstract\V1\StoreCategoryRepositoryInterface;

class StoreCategoryRepository extends BaseRepository implements StoreCategoryRepositoryInterface
{
    /**
     * @param StoreCategory $model
     */
    public function __construct(
        StoreCategory $model
    ) {
        parent::__construct($model);
    }
}
