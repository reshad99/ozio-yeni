<?php

namespace App\Repositories\Concrete\V1;

use App\Models\StoreProductAssignment;
use App\Repositories\Abstract\V1\StoreProductAssignmentRepositoryInterface;

class StoreProductAssignmentRepository extends BaseRepository implements StoreProductAssignmentRepositoryInterface
{
    /**
     * @param StoreProductAssignment $model
     */
    public function __construct(
        StoreProductAssignment $model
    ) {
        parent::__construct($model);
    }
}
