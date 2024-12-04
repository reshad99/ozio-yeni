<?php

namespace App\Repositories\Concrete\V1;

use App\Models\AdminAccessibleModel;
use App\Repositories\Abstract\V1\AdminAccessibleRepositoryInterface;

class AdminAccessibleRepository extends BaseRepository implements AdminAccessibleRepositoryInterface
{
    /**
     * @param AdminAccessibleModel $model
     */
    public function __construct(
        AdminAccessibleModel $model
    ) {
        parent::__construct($model);
    }
}
