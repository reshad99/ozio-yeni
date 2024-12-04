<?php

namespace App\Repositories\Concrete\V1;

use App\Models\StoreDevice;
use App\Repositories\Abstract\V1\StoreDeviceRepositoryInterface;

class StoreDeviceRepository extends BaseRepository implements StoreDeviceRepositoryInterface
{
    /**
     * @param StoreDevice $model
     */
    public function __construct(
        StoreDevice $model
    ) {
        parent::__construct($model);
    }
}
