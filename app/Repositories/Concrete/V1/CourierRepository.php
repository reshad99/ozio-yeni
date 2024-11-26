<?php

namespace App\Repositories\Concrete\V1;

use App\Models\Courier;
use App\Repositories\Abstract\V1\CourierRepositoryInterface;

class CourierRepository extends BaseRepository implements CourierRepositoryInterface
{

    /**
     * @param Courier $model
     */
    public function __construct(
        Courier $model
    ) {
        parent::__construct($model);
    }


}
