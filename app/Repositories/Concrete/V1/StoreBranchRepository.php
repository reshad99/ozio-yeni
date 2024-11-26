<?php

namespace App\Repositories\Concrete\V1;

use App\Models\StoreBranch;
use App\Repositories\Abstract\V1\StoreBranchRepositoryInterface;

class StoreBranchRepository extends BaseRepository implements StoreBranchRepositoryInterface
{
    /**
     * @param StoreBranch $model
     */
    public function __construct(
        StoreBranch $model
    ) {
        parent::__construct($model);
    }
}
