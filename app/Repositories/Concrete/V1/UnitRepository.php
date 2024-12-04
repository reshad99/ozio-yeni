<?php

namespace App\Repositories\Concrete\V1;

use App\Models\Unit;
use App\Repositories\Abstract\V1\UnitRepositoryInterface;

class UnitRepository extends BaseRepository implements UnitRepositoryInterface
{
    /**
     * @param Unit $model
     */
    public function __construct(
        Unit $model
    ) {
        parent::__construct($model);
    }
}
