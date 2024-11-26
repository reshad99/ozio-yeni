<?php

namespace App\Repositories\Concrete\V1;

use App\Models\Admin;
use App\Repositories\Abstract\V1\AdminRepositoryInterface;

class AdminRepository extends BaseRepository implements AdminRepositoryInterface
{
    /**
     * @param Admin $model
     */
    public function __construct(
        private Admin $model
    ) {
        parent::__construct($model);
    }
}
