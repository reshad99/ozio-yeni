<?php

namespace App\Repositories\Concrete\V1;

use App\Models\UserDevice;
use App\Repositories\Abstract\V1\UserDeviceRepositoryInterface;

class UserDeviceRepository extends BaseRepository implements UserDeviceRepositoryInterface
{
    /**
     * @param UserDevice $model
     */
    public function __construct(
        UserDevice $model
    ) {
        parent::__construct($model);
    }
}
