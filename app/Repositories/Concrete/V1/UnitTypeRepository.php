<?php

namespace App\Repositories\Concrete\V1;

use App\Models\UnitType;
use App\Repositories\Abstract\V1\UnitTypeRepositoryInterface;

class UnitTypeRepository extends BaseRepository implements UnitTypeRepositoryInterface
{
    /**
     * @param UnitType $model
     */
    public function __construct(
        UnitType $model
    ) {
        parent::__construct($model);
    }
}
