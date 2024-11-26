<?php

namespace App\Repositories\Concrete\V1;

use App\Models\Zone;
use App\Repositories\Abstract\V1\ZoneRepositoryInterface;

class ZoneRepository extends BaseRepository implements ZoneRepositoryInterface
{
    /**
     * @param Zone $model
     */
    public function __construct(
        Zone $model
    ) {
        parent::__construct($model);
    }
}
