<?php

namespace App\Repositories\Concrete\V1;

use App\Models\Tip;
use App\Repositories\Abstract\V1\TipRepositoryInterface;

class TipRepository extends BaseRepository implements TipRepositoryInterface
{
    /**
     * @param Tip $model
     */
    public function __construct(
        Tip $model
    ) {
        parent::__construct($model);
    }
}
