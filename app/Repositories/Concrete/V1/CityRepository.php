<?php

namespace App\Repositories\Concrete\V1;

use App\Models\City;
use App\Repositories\Abstract\V1\CityRepositoryInterface;

class CityRepository extends BaseRepository implements CityRepositoryInterface
{

    /**
     * @param City $model
     */
    public function __construct(
        City $model
    ) {
        parent::__construct($model);
    }
}
