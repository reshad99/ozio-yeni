<?php

namespace App\Repositories\Concrete\V1;

use App\Models\StoreProductAssignmentPermission;
use App\Repositories\Abstract\V1\StoreProductAssignmentPermissionRepositoryInterface;

class StoreProductAssignmentPermissionRepository extends BaseRepository implements StoreProductAssignmentPermissionRepositoryInterface
{
    /**
     * @param StoreProductAssignmentPermission $model
     */
    public function __construct(
        StoreProductAssignmentPermission $model
    ) {
        parent::__construct($model);
    }
}
