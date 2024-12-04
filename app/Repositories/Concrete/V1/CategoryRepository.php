<?php

namespace App\Repositories\Concrete\V1;

use App\Models\Category;
use App\Repositories\Abstract\V1\CategoryRepositoryInterface;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    /**
     * @param Category $model
     */
    public function __construct(
        Category $model
    ) {
        parent::__construct($model);
    }
}
